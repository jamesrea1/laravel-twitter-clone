/** @module tweetPublish */

export const tweetPublish = (publishContainer, timeline) => {

    function sendRequest(){
        if(!tweetComposeBody.value.trim().length){
            return Promise.reject("Tweet empty");
        }
        else if(tweetComposeBody.value.length > 280){
            return Promise.reject("Too many characters");
        }

        const endPoint = '/api/tweets';
        const payload = { 
            "data": {
                "type": "tweet",
                "attributes": {
                    "body": tweetComposeBody.value.trim()
                }
            }
        };
        
        return axios.post(
            endPoint, 
            payload
        ); 
    }


    function extractResponseData(response){
        return response.data.html
    }


    function updateUI(html){ 
        function parseHTML(html) {
            var t = document.createElement('template');
            t.innerHTML = html.trim();  
            return t.content;
        }
        const tweetFragment = parseHTML(html);
        timeline.insertBefore(tweetFragment, timeline.firstChild);

        tweetComposeBody.value = "";
        const evt = new Event("input", {"bubbles":true, "cancelable":false});
        tweetComposeBody.dispatchEvent(evt)
    }


    function handleError(error){
        if (error.response) {
            console.error("Server responded with a status code not in 200 range");
            // server exception json, or action method error json
            console.error(error.response.data);
            // 4xx, 5xx
            console.error("Response status code: ", error.response.status);
        } else if (error.request) {
            // no response (error.request is instance of XMLHttpRequest)
            console.error(error.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            console.error('Error: ', error.message);
        }
    }


    function handleEvent(event){
        // event is delegated to the container, so check event target
        if(!publishContainer.querySelector('.js-tweetPublishSubmit').contains(event.target)){
            return;
        }
        sendRequest()
        .then(extractResponseData)
        .then(updateUI)
        .catch(handleError);
    }
    
    
    const tweetComposeBody = publishContainer.querySelector('.js-tweetComposeBody');
    if(publishContainer){
        publishContainer.addEventListener('click', handleEvent);
    }

}

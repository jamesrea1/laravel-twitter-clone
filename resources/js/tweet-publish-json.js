/** @module tweetPublishJson */

import {tweetMake} from './tweet-make.js'

export const tweetPublishJson = (publishContainer, timeline) => {
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
        const extractData = (data = [], type) => (
            data.find(el => el.type == type) 
        );
        const tweet = extractData(response.data.data, 'tweet');

        return tweet;
    }
    function updateUI(tweetData){ 
        // render tweet
        const tweetFragment = tweetMake(tweetData);
        timeline.insertBefore(tweetFragment, timeline.firstChild);

        // reset tweet compose textarea, and progress status
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

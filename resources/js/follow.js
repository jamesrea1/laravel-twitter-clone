/** @module follow */

export const follow = (button) => {

    function sendRequest(){
        const followingUserId = button.dataset.followingUserId;
        const isFollowing = Boolean(parseInt(button.dataset.isFollowing));

        const requestType = (isFollowing) ? 'destroy' : 'create';

        const endPoints = {
            create: '/api/follows',
            destroy: `/api/follows/${followingUserId}`
        };
        const payloads = {
            create: {
                "data": {
                    "type": "follow",
                    "attributes": {
                        "followingUserId": followingUserId
                    },
                }
            },
            destroy: {
                '_method': 'DELETE',
            }
        };
        
        return axios.post(
            endPoints[requestType], 
            payloads[requestType]
        );   
    }
    function extractResponseData(response){
        // extract objs from response
        const extractData = (data = [], type) => (
            data.find(el => el.type == type) 
        );
        const follow = extractData(response.data.data, 'follow');

        // follow created?
        const isFollowing = !!(follow && response.status === 201);

        // store follow state
        button.dataset.isFollowing = Number(isFollowing);

        return isFollowing;
    }
    function updateUI(isFollowing){ 
        //update button text
        button.querySelector('span').textContent = (isFollowing) ? 'Following' : 'Follow';
        
        // update button class
        button.classList.remove((!isFollowing)? 'follow-btn--is-following' : 'follow-btn--not-following');
        button.classList.add((isFollowing)? 'follow-btn--is-following' : 'follow-btn--not-following');
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

        // reset UI
        const isFollowing = Boolean(parseInt(button.dataset.isFollowing));
        updateUI(isFollowing);
        console.log("UI Reset");
    }
    function handleEvent(e){
        e.preventDefault();
        sendRequest()
        .then(extractResponseData)
        .then(updateUI)
        .catch(handleError);
    }
    
    if(button){
        button.addEventListener('click', handleEvent);
    }

}

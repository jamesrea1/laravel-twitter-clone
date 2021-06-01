/** @module tweetLike */

const tweetLikeInitialise = (container) => {

    function handleLikeEvent(event){

        function sendRequest(){
            const tweet_id = button.closest('[data-tweet-id]').dataset.tweetId;
            const like_id = button.closest('[data-like-id]').dataset.likeId;
    
            const requestType = (parseInt(like_id) > 0) ? 'destroy' : 'create';
    
            const endPoints = {
                create: '/api/likes',
                destroy: `/api/likes/${like_id}`
            };
            const payloads = {
                create: {
                    "data": {
                        "type": "like",
                        "attributes": {
                            "tweet_id": tweet_id
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
            const extractData = (data = [], type) => (
                data.find(el => el.type == type) 
            );
            const tweet = extractData(response.data.data, 'tweet');
            const like = extractData(response.data.data, 'like');
    
            // like created?
            const isLiked = !!(like && response.status === 201);
            const like_id = isLiked? like.id : '';
    
            return {
                isLiked: isLiked,
                like_id: like_id,
                likes_count: tweet.attributes.likes_count
            };
        }


        function updateUI({isLiked, like_id, likes_count}){
            button.dataset.likeId = like_id;
            updateLikeButtonStyle(button, isLiked);
            updateLikeButtonLikes(button, likes_count);
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
            const likes_count = button.querySelector('.js-likesCount').textContent;
            const like_id = button.closest('[data-like-id]').dataset.likeId;
            const isLiked = !!(like_id);
            updateUI({
                isLiked, 
                likes_count
            });
            console.log("UI Reset");
        }


        // check delegated event is from a like button
        const button = event.target.closest('.js-tweetLikeBtn');
        if(!button){
            return;
        }

        sendRequest()
        .then(extractResponseData)
        .then(updateUI)
        .catch(handleError);
    }
    
    if(container){
        container.addEventListener('click', handleLikeEvent);
    }
}


const updateLikeButtonStyle = (likeButton, isLiked) =>{
    // show liked status colour
    likeButton.classList.add((isLiked)? 'text-twrose' : 'text-bluegray-500');
    likeButton.classList.remove((!isLiked)? 'text-twrose' : 'text-bluegray-500');
    
    // show liked status icon
    const likeIcon = likeButton.querySelector('.js-likeIcon');
    const likedIcon = likeButton.querySelector('.js-likedIcon');
    (isLiked? likeIcon : likedIcon).classList.add('hidden');
    (isLiked? likedIcon : likeIcon).classList.remove('hidden');
    
}


const updateLikeButtonLikes = (likeButton, likes_count) =>{
    // update like count
    likeButton.querySelector('.js-likesCount').textContent = likes_count || '';
}


export {tweetLikeInitialise, 
    updateLikeButtonStyle,
    updateLikeButtonLikes,
};
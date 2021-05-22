/** @module tweetLike */

const tweetLikeInitialise = (container) => {
    function handleLikeEvent(event){
        function sendRequest(){
            const tweetId = button.closest('[data-tweet-id]').dataset.tweetId;
            const likeId = button.closest('[data-like-id]').dataset.likeId;
    
            const requestType = (parseInt(likeId) > 0) ? 'destroy' : 'create';
    
            const endPoints = {
                create: '/api/likes',
                destroy: `/api/likes/${likeId}`
            };
            const payloads = {
                create: {
                    "data": {
                        "type": "like",
                        "attributes": {
                            "tweetId": tweetId
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
            const likeId = isLiked? like.id : '';
    
            return {
                isLiked: isLiked,
                likeId: likeId,
                likes: tweet.attributes.likes
            };
        }
        function updateUI({isLiked, likeId, likes}){
            button.dataset.likeId = likeId;
            updateLikeButtonStyle(button, isLiked);
            updateLikeButtonLikes(button, likes);
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
            const likes = button.querySelector('.js-likes').textContent;
            const likeId = button.closest('[data-like-id]').dataset.likeId;
            const isLiked = !!(likeId);
            updateUI({
                isLiked, 
                likes
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

const updateLikeButtonLikes = (likeButton, likes) =>{
    // update like count
    likeButton.querySelector('.js-likes').textContent = likes || '';
}

export {tweetLikeInitialise, 
    updateLikeButtonStyle,
    updateLikeButtonLikes,
};
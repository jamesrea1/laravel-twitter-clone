/** @module tweetLike */

export const tweetLike = 
{    
    initialise: function(button) {
        button.addEventListener('click', this.requestLike);
    },
    requestLike: function(e) {    
        const tweetId = this.closest('[data-tweet-id]').dataset.tweetId;
        const likeId = this.dataset.likeId;

        const tweetIsLiked = (parseInt(likeId) > 0);
        const requestType = tweetIsLiked ? 'destroy' : 'create';

        const endPoints = {
            create: '/api/likes',
            destroy: `/api/likes/${likeId}`
        }

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
        }
        
        axios.post(
            endPoints[requestType], 
            payloads[requestType]
        )    
        .then(
            this.updateUi
        )
        .catch(
            this.handleErrors
        );
    },
    updateUi: (response) => {
        console.log(response); 
            
        // extract objs from response
        const extractData = (data, type) => (
            data.find(el => el.type == type) 
        );
        const tweet = extractData(response.data.data, 'tweet');
        const like = extractData(response.data.data, 'like');
        
        // check extracted data
        /* if(!(tweet && like)){ return Promise.reject(new Error("Could not extract response data.")); } */

        // store the created like 
        this.dataset.likeId = like? like.id : '';

        // like created?
        const action = (like && response.status === 201)? 'created' : 'destroyed';
        const likeCreated = !!(like && response.status === 201);

        // show liked colour
        this.classList.add((likeCreated)? 'text-twrose' : 'text-bluegray-500');
        this.classList.remove((!likeCreated)? 'text-twrose' : 'text-bluegray-500');

        // show liked icon
        const likedIcon = this.querySelector('.js-likedIcon');
        const likeIcon = this.querySelector('.js-likeIcon');
        if(likeCreated){
            likedIcon.classList.remove('hidden');
            likeIcon.classList.add('hidden');
        }else{
            likeIcon.classList.remove('hidden');
            likedIcon.classList.add('hidden');
        }

        // update like count
        const likes = this.querySelector('.js-likes');
        likes.textContent = tweet.attributes.likes || '';

    },
    handleErrors: (error) => {
        if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
        } else if (error.request) {
            console.log(error.request);
        } else {
            console.log('Error', error.message);
        }
    }








}






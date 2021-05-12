// Tweet like/unlike ajax

const buttons = document.querySelectorAll(".js-tweetLikeBtn");

for (const button of buttons) {
    button.addEventListener('click', function(e) {
    
        if(this.dataset.likeId){
            unLike.call(this);
        }
        else{
            like.call(this);
        }

  });
}

function like(){
    
    const tweetId = this.closest('[data-tweet-id]').dataset.tweetId;
    
    axios.post('/api/likes', {
        "data": {
            "type": "like",
            "attributes": {
                "tweetId": tweetId
            },
        }
    })
    .then(response => {

        // response obj:
        // {
        //     "success": true,
        //     "data": [
        //         { 
        //             "type": "tweet",
        //             "id": 63,
        //             "attributes": 
        //             {
        //                 "likes": 1
        //             }
        //         },
        //         {
        //             "type": "like",
        //             "id": 74,
        //             "attributes": []
        //         }
        //     ]
        // }

                
        // extract objs from response
        const extractData = (data, type) => (
            data.find(el => el.type == type) 
        );
        const tweet = extractData(response.data.data, 'tweet');
        const like = extractData(response.data.data, 'like');
        
        // check extracted data
        if(!(tweet && like)){
            return Promise.reject(new Error("Could not extract response data.")); 
        }

        // store the like - we have a 'like' instance, so store the liked state in the data attribute
        this.dataset.likeId = like.id;

        // show liked colour
        this.classList.add('text-twrose');
        this.classList.remove('text-bluegray-500');
        
        // show liked icon
        const likedIcon = this.querySelector('.js-liked');
        const notLikedIcon = this.querySelector('.js-notLiked');
        likedIcon.classList.remove('hidden');
        notLikedIcon.classList.add('hidden');
        
        // update like count
        const likes = this.querySelector('.js-likes');
        likes.textContent = tweet.attributes.likes;

    })
    .catch(error => {
        if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
        } else if (error.request) {
            console.log(error.request);
        } else {
            console.log('Error', error.message);
        }
    });
}

function unLike(){
    const likeId = this.dataset.likeId;
        
    axios.post(`/api/likes/${likeId}`, {
        '_method': 'DELETE',
    }) 
    .then(response => {
        console.log(response);

        // response obj:
        // {
        //     "success": true,
        //     "data": {
        //         "type": "tweet",
        //         "id": 62,
        //         "attributes": {
        //             "likes":1
        //         }
        //     }
        // }

        // extract obj from response
        const tweet = response.data.data;
        
        // check extracted data
        if(!tweet){
            return Promise.reject(new Error("Could not extract response data.")); 
        }

        // store the like - we have deleted a 'like', so store the deleted like state in the data attribute
        this.dataset.likeId = '';

        // show un-liked colour
        this.classList.add('text-bluegray-500');
        this.classList.remove('text-twrose');
        
        // show un-liked icon
        const likedIcon = this.querySelector('.js-liked');
        const notLikedIcon = this.querySelector('.js-notLiked');
        likedIcon.classList.add('hidden');
        notLikedIcon.classList.remove('hidden');
        
        // update like count
        const likes = this.querySelector('.js-likes');
        likes.textContent = tweet.attributes.likes;

    })
    .catch(error => {
        if (error.response) {
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
        } else if (error.request) {
            console.log(error.request);
        } else {
            console.log('Error', error.message);
        }
    });
}
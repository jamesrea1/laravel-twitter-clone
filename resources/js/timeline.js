/** @module timeline */

import axios from 'axios';
import {tweetMake} from './tweet-make.js'

export const timelineInitialise = (timelineContainer) => {
    
    if(!timelineContainer){
        return;
    }


    const paginationState = (() =>{
        let next_page_url = '/api/tweets';
        return {
            get nextPage(){
                return next_page_url;
            },
            set nextPage(url){
                next_page_url = url;
            }
        }
    })();


    function sendRequest(url){
        return axios.get(url);
    }


    function extractResponseData(response){
        paginationState.nextPage = response.data.next_page_url;
        return response.data.data;
    }


    function renderTweets(tweetsDataRaw){
        const tweetsData = tweetsDataRaw.map(t => ({
            id: t.id,
            attributes: {
                published_date: t.published_date,
                body: t.body,

                user_id: t.user.id,
                username: t.user.username,
                name: t.user.name,
                profile: t.user.profile,
                avatar: t.user.avatar,
                
                like_id: t.like_id,
                likes_count: t.likes_count,
            }
        }));

        const tweetsFragment = document.createDocumentFragment();
        for(const tweet of tweetsData){
            tweetsFragment.appendChild(tweetMake(tweet));
        }
        
        const timelinePage = document.createElement('div');
        timelinePage.classList.add('timeline__page');
        timelinePage.appendChild(tweetsFragment);
        
        timelineContainer.classList.remove("timeline--loading");
        timelineContainer.appendChild(timelinePage);
        
        // requestAnimationFrame(() => {
        //     timelineContainer.appendChild(tweetsContainer);
        //     requestAnimationFrame(() => {
        //         tweetsContainer.classList.remove('opacity-0');
        //     });
        // });
        
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


    function showNextPage(){
        if(!paginationState.nextPage){ 
            return; 
        }

        timelineContainer.classList.add("timeline--loading");
        observer.disconnect();

        sendRequest(paginationState.nextPage)
        .then(extractResponseData)
        .then(renderTweets)
        .catch(handleError)
        .finally(()=>{
            timelineContainer.classList.remove("timeline--loading");
            if(paginationState.nextPage){ 
                observer.observe(timelineContainer.lastElementChild.lastElementChild);
            }
        });
    }

    const observer = (() => {
        const handleIntersection = (entries) => {    // ([entry])
            const entry = entries.find(x => x.isIntersecting && x.boundingClientRect.top > 0);
            if(entry){
                showNextPage();
            }
        };
        const options = {
            rootMargin: '0px 0px 100px 0px',
            threshold: 0
        };
        return new IntersectionObserver(handleIntersection, options);
    })();



    if (document.readyState === 'complete') {
        showNextPage();
    }
    else{
        window.addEventListener('load', showNextPage);
    }

}

require('./bootstrap');

import autosize from 'autosize';
autosize(document.querySelector('.js-tweetComposeBody'));


import {tweetProgress } from './tweet-progress.js';
tweetProgress.initialise(document.querySelector('.js-tweetPublish'));


import {tweetLikeInitialise} from './tweet-like.js';
tweetLikeInitialise(document.querySelector('.js-timeline'));


import {follow} from './follow.js';
for (const button of document.querySelectorAll(".js-followBtn")) {
    follow(button);
}



// import { tweetPublish } from './tweet-publish.js';
// tweetPublish(document.querySelector(".js-tweetPublish"),
//     document.querySelector('.js-timeline')
// );

import {tweetPublishJson} from './tweet-publish-json.js';
tweetPublishJson(document.querySelector(".js-tweetPublish"),
    document.querySelector('.js-timeline')
);





// import { timeline } from './timeline.js';
// timeline();





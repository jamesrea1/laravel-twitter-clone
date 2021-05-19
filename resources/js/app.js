require('./bootstrap');

import autosize from 'autosize';
autosize(document.querySelector('.js-tweetComposeBody'));


import { tweetProgress } from './tweet-progress.js';
tweetProgress.initialise(document.querySelector('.js-tweetPublish'));


import { tweetLike } from './tweet-like.js';
for (const button of document.querySelectorAll(".js-tweetLikeBtn")) {
    tweetLike(button);
}


import { follow } from './follow.js';
for (const button of document.querySelectorAll(".js-followBtn")) {
    follow(button);
}

import { tweetPublish } from './tweet-publish';
tweetPublish(document.querySelector(".js-tweetPublish"));





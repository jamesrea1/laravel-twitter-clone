require('./bootstrap');

import autosize from 'autosize';
autosize(document.querySelector('.js-composeTweetBody'));


import { tweetProgress } from './tweet-progress.js';
tweetProgress.initialise(document.querySelector('.js-publishTweetPanel'));


import { tweetLike } from './tweet-like.js';
for (const button of document.querySelectorAll(".js-tweetLikeBtn")) {
    tweetLike(button);
}


import { follow } from './follow.js';
for (const button of document.querySelectorAll(".js-followBtn")) {
    follow(button);
}




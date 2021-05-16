require('./bootstrap');

import autosize from 'autosize';
autosize(document.querySelector('.js-composeTweetBody'));


import { tweetProgress } from './tweet-progress.js';
tweetProgress.initialise(document.querySelector('.js-publishTweetPanel'));


import { tweetLike } from './tweet-like.js';
const buttons = document.querySelectorAll(".js-tweetLikeBtn");
for (const button of buttons) {
    tweetLike(button);
}

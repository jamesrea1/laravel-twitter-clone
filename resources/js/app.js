require('./bootstrap');

import autosize from 'autosize';
autosize(document.querySelector('.js-tweetComposeBody'));

import {tweetProgress} from './tweet-progress.js';
tweetProgress.initialise(document.querySelector('.js-tweetPublish'));

import {tweetLikeInitialise} from './tweet-like.js';
tweetLikeInitialise(document.querySelector('.js-timeline'));

import {followInitialise} from './follow.js';
for (const button of document.querySelectorAll(".js-followBtn")) {
    followInitialise(button);
}

import {tweetPublishInitialise} from './tweet-publish-json.js';
tweetPublishInitialise(
    document.querySelector(".js-tweetPublish"),
    document.querySelector('.js-timeline')
);

import { timelineInitialise } from './timeline.js';
timelineInitialise(document.querySelector('.js-timeline'));





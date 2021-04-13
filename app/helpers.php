<?php

if(!function_exists('current_user'))
{
    function current_user() :App\Models\User
    {
        return auth()->user();
    }
}


// if(!function_exists('tweet_date'))
// {
//     function format_tweet_date($date)
//     {
//         if($date->diffInHours() <= 24)
//         {
//             return $date->diffInHours().'h';
//         }
//         else
//         {
//             return $date->format('M j')
//                 .($date->isCurrentYear()? '' : ", {$date->year}");
//         }
//     }
// }
<?php

if(!function_exists('current_user'))
{
    function current_user() :App\Models\User
    {
        return auth()->user();
    }
}

if(!function_exists('dumplog'))
{
    function dumplog($numQueries = 1) 
    {
        // die(var_dump(\Illuminate\Support\Facades\DB::getQueryLog()));
        $queries = \Illuminate\Support\Facades\DB::getQueryLog();

        $offset = 0;
        if($numQueries <= count($queries)){
            $offset = count($queries) - $numQueries;
        }
        die(var_dump(array_slice($queries, $offset)));

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
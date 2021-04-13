<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Tweet $tweet)  //(Request $request, Tweet $tweet)
    {
        $tweet->like(current_user());  //(current_user(), $request->boolean('liked'));

        return back();
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->unLike(current_user()); 

        return back();
    }

    // todo destroy
}

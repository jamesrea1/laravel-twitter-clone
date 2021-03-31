<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    public function store(Request $request, Tweet $tweet)
    {
        $tweet->like(current_user(), $request->boolean('liked'));

        return back();
    }

    // todo destroy
}

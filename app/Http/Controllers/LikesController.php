<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function store(Request $request) 
    {
        $tweet = Tweet::findOrFail($request->tweet_id);

        $tweet->like(current_user());  

        // $like = Like::create([
        //     'user_id' => current_user()->id,
        //     'tweet_id' => $tweet->id,
        //     'liked' => 1,
        // ]);

        return back();
    }

    public function destroy($id)
    {
        //$tweet->unLike(current_user()); 
        
        // make sure we're deleting a like that belongs to the user
        $like = current_user()->likes()->findOrFail($id);

        $like->delete();

        return back();
    }

}

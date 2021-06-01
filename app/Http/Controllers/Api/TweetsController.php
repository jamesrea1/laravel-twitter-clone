<?php

namespace App\Http\Controllers\Api;

use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TweetsController extends Controller
{
    public function index(Request $request)
    {        
        return current_user()->timeline();
    }

    public function store(Request $request)
    {        
        // this will automatically generate a ValidationException and return a 422 error response when request is invalid
        $attributes = $request->validate([
            'data.attributes.body' => 'required|max:280'
        ]);

        $tweet = Tweet::create([
            'user_id' => current_user()->id,
            'body' => $attributes['data']['attributes']['body']
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                [
                    'type' => 'tweet',
                    'id' => $tweet->id,
                    'attributes' => [ 
                        'published_date' => 'now', //$tweet->published_date,
                        'body' => $tweet->body,
                        'profile' => $tweet->profile,
                        'avatar' => $tweet->user->avatar,
                        'name' => $tweet->user->name,
                        'username' => $tweet->user->username,
                        'like_id' => null, //$tweet->getLikeBy(current_user()),
                        'likes_count' => 0, //$tweet->likes_count,
                    ],
                ],
            ]
        ], 201);
        
        // $html = view('partials._tweet')->with(compact('tweet'))->render(); 
        // return response()->json(['success' => true, 'html' => $html], 201);
    }

    
}



    
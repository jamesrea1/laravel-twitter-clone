<?php

namespace App\Http\Controllers\Api;

use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TweetsController extends Controller
{
    public function store(Request $request)
    {
        //if(request()->wantsJson()) 
        
        // this will automatically generate a ValidationException and return a 422 error response when request is invalid
        $attributes = $request->validate([
            'data.attributes.body' => 'required|max:280'
        ]);

        $tweet = Tweet::create([
            'user_id' => current_user()->id,
            'body' => $attributes['data']['attributes']['body']
        ]);

        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         [
        //             'type' => 'tweet',
        //             'id' => $tweet->id,
        //             'attributes' => [ 'body' => $tweet->body ]
        //         ],
        //     ]
        // ], 201);



        $html = view('partials._tweet')->with(compact('tweet'))->render(); 
        return response()->json(['success' => true, 'html' => $html], 201);
        

    }
}

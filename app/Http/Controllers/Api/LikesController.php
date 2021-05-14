<?php

namespace App\Http\Controllers\Api;

use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function store(Request $request) 
    {
        try 
        {
            $tweet = Tweet::findOrFail($request->input('data.attributes.tweetId'));
            $like = $tweet->like(current_user());  
            $likes = $tweet->likes()->count();
            
            return response()->json([
                'success' => true,
                'data' => [
                    [
                        'type' => 'tweet',
                        'id' => $tweet->id,
                        'attributes' => [ 'likes' => $likes]
                    ],
                    [
                        'type' => 'like',
                        'id' => $like->id,
                        'attributes' => []
                    ]
                ]
            ], 201);
        }
        catch (\Exception $e) 
        {
            return response()->json([
                'success' => 'false',
                'errorMessage'  => $e->getMessage()
            ], 400);
        }
    }

    public function destroy($id)
    {
        try 
        {
            // make sure we're deleting a like that belongs to the user
            $like = current_user()->likes()->findOrFail($id);
            $tweet = Tweet::findOrFail($like->tweet_id);
            $like->delete();
            $likes = $tweet->likes()->count();

            return response()->json([
                'success' => true,
                'data' => [
                    [
                        'type' => 'tweet',
                        'id' => $tweet->id,
                        'attributes' => ['likes' => $likes]
                    ],
                ]
            ], 200);    
        }
        catch (\Exception $e) 
        {
            return response()->json([
                'success' => 'false',
                'errorMessage'  => $e->getMessage()
            ], 400);
        }
    }


}

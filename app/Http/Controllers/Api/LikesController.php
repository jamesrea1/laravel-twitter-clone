<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function store(Request $request) 
    {
        try 
        {
            //$tweet = Tweet::withCount('likes')->findOrFail($request->input('data.attributes.tweet_id'));
            //$like = $tweet->like(current_user());  
            //$likes = $tweet->likes()->count();
            
            
            
            $tweet_id = $request->input('data.attributes.tweet_id');
            $like = Like::create([
                'user_id' => current_user()->id,
                'tweet_id' => $tweet_id,
                'liked' => 1
            ]);
            $likes_count = Like::where('tweet_id', $tweet_id)->count();
            

            return response()->json([
                'success' => true,
                'data' => [
                    [
                        'type' => 'tweet',
                        'id' => $tweet_id,
                        'attributes' => [ 'likes_count' => $likes_count]   //$tweet->likes_count]
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
            //// make sure we're deleting a like that belongs to the user
            // $like = current_user()->likes()->findOrFail($id);
            // $tweet = Tweet::findOrFail($like->tweet_id);
            // $like->delete();
            // $likes = $tweet->likes()->count();
            
            // make sure we're deleting a like that belongs to the user
            $like = current_user()->likes()->findOrFail($id);
            $tweet_id = $like->tweet_id;
            $like->delete();
            $likes_count = Like::where('tweet_id', $tweet_id)->count();

            return response()->json([
                'success' => true,
                'data' => [
                    [
                        'type' => 'tweet',
                        'id' => $tweet_id,
                        'attributes' => ['likes_count' => $likes_count]
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

<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowsController extends Controller
{
    public function store(Request $request) 
    {
        try 
        {            
            $follow = Follow::create([
                'user_id' => current_user()->id,
                'following_user_id' => $request->input('data.attributes.followingUserId')
            ]);
                      
            return response()->json([
                'success' => true,
                'data' => [
                    [
                        'type' => 'follow',
                        'userId' => $follow->user_id,
                        'followingUserId' => intval($follow->following_user_id),
                        'attributes' => [ 'createdAt' => $follow->created_at ]
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
            Follow::where([
                'user_id' => current_user()->id,
                'following_user_id' => $id 
            ])->delete();

            return response()->json([
                'success' => true,
                'data' => [
                    [
                        'type' => 'user',
                        'id' => $id,
                        'attributes' => []
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

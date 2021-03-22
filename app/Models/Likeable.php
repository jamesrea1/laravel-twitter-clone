<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

trait Likeable
{

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function scopeWithLikes(Builder $query)
    {
        // SELECT *
        // FROM tweets 
        // LEFT JOIN 
        // (
        //    SELECT tweet_id, SUM(liked) likes, SUM(!liked) dislikes
        //    FROM likes
        //    GROUP BY tweet_id
        // ) likes ON tweets.id = likes.tweet_id

        $sub = DB::table('likes')
            ->selectRaw(
                "tweet_id, SUM(liked) likes, SUM(!liked) dislikes"
            )
            ->groupBy(
                'tweet_id'
            );
                    
        $query = $query       
            ->leftJoinSub(
                $sub, 
                'likes',
                function ($join){
                    $join->on('tweets.id', 'likes.tweet_id');
                }
            );

        return $query;

        // Even better:
        //$query->leftJoinSub(
        //    'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
        //    'likes',
        //    'likes.tweet_id',
        //    'tweets.id'
        //);

    }
    

    public function like(User $user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id()
            ],
            [
                'liked' => $liked,
            ],
        );
    }

    public function dislike(User $user)
    {
        $this->like($user, false);
    }


    public function isLikedBy(User $user)
    {
        // N+1 problem: return $this->likes()->where('user_id', $user->id)->exists();  
        
        // Get dynamic property loaded on user
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }
    
    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }



}
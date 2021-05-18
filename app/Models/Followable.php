<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Followable
{
    public function following()
    {
        return $this->belongsToMany(User::class, 
                'follows',
                'user_id',
                'following_user_id')
                ->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 
                'follows',
                'following_user_id',
                'user_id')
                ->withTimestamps();
    }

    public function scopeWhoToFollow(Builder $query)
    {
        $following = current_user()->following()->pluck('id'); 

        $query = $query->whereNotIn('id', $following)
                       ->where('id', '!=', current_user()->id)
                       ->inRandomOrder()
                       ->limit('3');
    }

    public function isFollowing(User $user)
    {
        //return $this->following()->where('id', $user->id)->exists();
        return $this->following->contains($user);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    // public function follow($id)
    // {
    //     return $this->follows()->updateOrCreate(
    //         [
    //             'following_user_id' => $id
    //         ]
    //     );
    // }

    // public function unFollow($id)
    // {
    //     return $this->follows()
    //         ->where('following_user_id', $id)
    //         ->delete();
    // }

    // public function followUser(User $user)
    // {
    //     return $this->following()->save($user);
    // }

    // public function unFollowUser(User $user)
    // {
    //     return $this->following()->detach($user);
    // }

    // public function toggleFollow(User $user)
    // {
    //     return $this->following()->toggle($user);
    // }



}

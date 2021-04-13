<?php

namespace App\Models;

trait Followable
{
    public function follows()
    {
        return $this->belongsToMany(User::class, 
                'follows',
                'user_id',
                'following_user_id')
                ->withTimestamps();
    }

    // public function whoToFollow()
    // {
    //     $friends = $this->follows()->pluck('id');

        
    //     User::where()
    // }

    public function isFollowing(User $user)
    {
        return $this->follows()->where('id', $user->id)->exists();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        return $this->follows()->toggle($user);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 
                'follows',
                'following_user_id',
                'user_id')
                ->withTimestamps();
    }

}

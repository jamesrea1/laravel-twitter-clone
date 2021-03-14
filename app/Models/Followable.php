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

    public function following(User $user)
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
        if($this->following($user))
        {
            return $this->unFollow($user);
        }
        
        return $this->follow($user);
    }


}

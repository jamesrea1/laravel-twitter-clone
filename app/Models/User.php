<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = ['profile'];


    public function setPasswordAttribute($value) 
    { 
        $this->attributes['password'] = bcrypt($value); 
    }


    public function getAvatarAttribute($value)
    {
        return asset($value ? "storage/{$value}" : "images/default-avatar-2.jpeg");
    }


    public function getProfileAttribute()
    {
        return $this->path();
    }


    public function timeline()
    {
        $friends = $this->follows()->pluck('following_user_id');

        $getLike = Like::select('id')
            ->whereColumn('tweet_id', 'tweets.id')
            ->where('user_id', current_user()->id)
            ->limit(1)
            ->getQuery();

        $tweetsPaginator = Tweet::
            select(['id', 'user_id', 'body', 'created_at'])
            ->withLikes()
            ->selectSub($getLike, 'like_id')
            ->with('user:id,username,name,avatar')  
            // ->with(['user' => function ($query) {
            //     $query->select('id','username','name','avatar')
            //     ->selectRaw('CONCAT("'.URL('profiles').'/", username) as profile');
            // }])  
            ->where(function (Builder $query) use ($friends) {
                return $query->whereIn('user_id', $friends)
                             ->orWhere('user_id', $this->id);
            })
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->cursorPaginate(10);

        //dumplog(2);
        
        return $tweetsPaginator;
    }


    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    
    public function path($append = '')
    {
        $path = route('profiles.show', $this); 

        return $append ? "{$path}/{$append}" : $path ;
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
}

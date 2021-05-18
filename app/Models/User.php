<?php

namespace App\Models;

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


    public function setPasswordAttribute($value) 
    { 
        $this->attributes['password'] = bcrypt($value); 
    }


    public function getAvatarAttribute($value)
    {
        return asset($value ? "storage/{$value}" : "images/default-avatar-2.jpeg");
    }


    public function timeline()
    {
        $friends = $this->follows()->pluck('following_user_id');

        return Tweet::withLikes()
                    ->whereIn('user_id', $friends)
                    ->orWhere('user_id', $this->id)
                    ->latest()->paginate(10);
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

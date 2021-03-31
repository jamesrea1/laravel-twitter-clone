<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    // TODO
    // make follows more restful by modelling the pivot as it's own resource
    // 
    // post /follows - to create a follow
    // delete /follows/{id} - to destroy the follow
    // 
    // modelling the pivot allows us to reference the pivot record directly

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'following_user_id');
    }

}

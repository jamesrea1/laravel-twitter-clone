<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tweet extends Model
{
    use HasFactory, Likeable;
    
    protected $guarded = [];

    public function getPublishedDateAttribute()
    {
        if($this->created_at->diffInSeconds() <= 60)
        {
            return $this->created_at->diffInSeconds().'s';
        }
        else if($this->created_at->diffInMinutes() <= 60)
        {
            return $this->created_at->diffInMinutes().'m';
        }
        else if($this->created_at->diffInHours() <= 24)
        {
            return $this->created_at->diffInHours().'h';
        }
        else
        {
            return $this->created_at->format('M j')
                .($this->created_at->isCurrentYear()? '' : ", {$this->created_at->year}");
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
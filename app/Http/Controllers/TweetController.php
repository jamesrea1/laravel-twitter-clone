<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
        $follows = auth()->user()->follows;

        return view('home', [
            'tweets' => $tweets,
            'follows' => $follows]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect(url('/home'));
    }
}  

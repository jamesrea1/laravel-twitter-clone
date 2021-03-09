<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;


class TweetController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
        $follows = auth()->user()->follows;

        //dd($follows);

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show')
            ->with(compact('user'));
    }

    public function edit(User $user)
    {
        //abort_if(current_user()->isNot($user) , 403);   // move check to policy
        
        //$this->authorize("edit", $user);  // check here or on the route

        return view('profiles.edit');
    }
}

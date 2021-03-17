<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show')
            ->with(compact('user'))
            ->with(['tweets' => $user->tweets()->paginate(3)]);
    }

    public function edit(User $user)
    {
        //abort_if(current_user()->isNot($user) , 403);   // move check to policy
        
        //$this->authorize("edit", $user);  // check here or on the route

        return view('profiles.edit')
            ->with(compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name' => [
                'string', 
                'required', 
                'max:255',
            ],
            'avatar' => [
                'image',
            ],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);

        if(request('avatar'))
        {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}

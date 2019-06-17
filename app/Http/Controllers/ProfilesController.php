<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\User;

class ProfilesController extends Controller 
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if(request('image')) {
            $imgPath = request('image')->store('profile', 'public');

            $img = Image::make(public_path("storage/{$imgPath}"))->fit(1000, 1000);
            $img->save();

            $imgArray = ['image' => $imgPath];
        }
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imgArray ?? []
        ));


        return redirect("/profile/{$user->id}");
    }
}

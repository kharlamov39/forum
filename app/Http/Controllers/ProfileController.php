<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profile = User::with('profile')->select('name', 'email', 'id')->findOrFail($id);

        if($profile->id == Auth::id() && !$profile->profile) {
            Profile::create(['user_id' => $profile->id]);
        }

        return view('profile.show', ['profile' => $profile]);  
    }

    public function edit($id)
    {
        if($id != Auth::id()) {
            return redirect()->intended('/');
        }

        $profile = User::with('profile')->select('name', 'email', 'id')->findOrFail($id);

        return view('profile.edit', ['profile' => $profile]);
    }

    public function update($id)
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function edit() {
        $user = Auth::user();
        return view("user.profile", [
            'user' => $user
        ]);
    }

    public function update(Request $request) {

        //validate incoming request
        $request->validate([
            'name' => ['required','string', 'max:100'],
            'avatar' => [
                File::types(['jpg','jpeg', 'png', 'gif'])->max(1024)
            ]
        ]);

        // get user data
        $id = Auth::user()->id;
        $user = User::find($id);
        // change user value
        $user->name = $request->name;
        if($request->file('avatar')){
            if($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }
            $user->avatar = Storage::putFile('avatars', $request->file('avatar'));
        }
        // update data with save method
        $user->save();

        return redirect()->route('profile.edit');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfilesEditUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('profiles.userEdit')->with('user', $user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->number = $request->input('number');
        if ($request->input('password') != "" && $request->input('newPassword') != "") {
            if (Hash::check($request->input('password'), $user->password)) {
                $user->password = Hash::make($request->input('newPassword'));
            } else {
                return redirect('home/' . $id . '/edit')->with('error', 'Your current password does not match');
            }
        }
        $user->save();
        return redirect('home/' . $id . '/edit')->with('success', 'You successfully edit profile');
    }
}

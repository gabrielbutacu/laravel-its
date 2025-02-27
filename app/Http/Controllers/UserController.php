<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userProfile($id){
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));

    }
}

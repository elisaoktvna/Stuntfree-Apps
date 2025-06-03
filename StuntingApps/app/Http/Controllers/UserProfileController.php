<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //
    public function index() {
    $user = Auth::user(); // guard 'web'
    return view('profile.user', compact('user'));
}

}

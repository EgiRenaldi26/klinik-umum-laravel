<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $title = "Profile Pages";
        $profile = User::all();
        return view('view.profile' , compact('profile','title'));
    }
}

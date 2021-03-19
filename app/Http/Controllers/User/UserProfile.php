<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfile extends Controller
{
    public function __invoke()
    {
        $data = array(
            'title' => 'User Profile'
        );

        return view('auth.profile', $data);
    }
}

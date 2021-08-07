<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    public function showProfile($profileName)
    {
        return view('profile', ['profileName' => $profileName]);
    }
}

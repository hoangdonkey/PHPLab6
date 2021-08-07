<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function showDetails()
    {
        return 'About detail informations';
    }

    public function showSubject($theSubject)
    {
        return "Detail informations about $theSubject";
    }
}

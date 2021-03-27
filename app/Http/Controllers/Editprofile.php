<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;

class Editprofile extends Controller
{
    function save(Request $req)
    {
        print_r($req->input());
    }
}


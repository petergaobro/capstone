<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//
//use Illuminate\Support\Facades\Redirect;
//
//use App\Http\Requests\ContactFormRequest;
//
//use Illuminate\Support\Facades\Session;

class AdminHomeController extends Controller
{
    public function create()
    {
        return view('admin.home');
    }
}

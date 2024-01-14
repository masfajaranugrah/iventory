<?php

namespace App\Http\Controllers\err;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class Err403Controller extends Controller
{
    public function index(){
        return view('err.403.403');
    }
}

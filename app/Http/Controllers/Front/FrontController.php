<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {

        return $this->home();
    }
    public function home()
    {
        return view('front.index');
    }
}

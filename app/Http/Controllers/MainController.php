<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function homeAction() {
        return view('home');
    }

    public function admin() {
        return view('admin');
    }
}
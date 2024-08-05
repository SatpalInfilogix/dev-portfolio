<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        echo 'here!';
    }

    public function redirectToDashboard(){
        return redirect()->route('dashboard');
    }
}

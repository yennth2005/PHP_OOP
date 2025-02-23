<?php

namespace App\Controllers\Admin;

use App\Controller;

class DashboardController extends Controller{
    public function index(){
        // echo "dashboard";
        return view('admin.dashboard');
    }
}
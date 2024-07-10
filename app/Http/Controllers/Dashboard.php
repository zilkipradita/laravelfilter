<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller{

    public function index(){
		$data = array();
        $data['app_name']     = "CMS Laravel";
		$data['title_parent'] = "Home";
        $data['title_child']  = "Dashboard";

		return view('dashboard.index', compact('data'));
	}
}

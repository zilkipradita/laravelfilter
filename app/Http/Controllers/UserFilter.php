<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_filter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserFilter extends Controller{

    public function index(){
		$data = array();
		$data['app_name']        = "CMS Laravel";
		$data['title_parent']    = "Admin Panel";
        $data['title_child']     = "User";
        $data['province_select'] = User_filter::distinct()->get(['province']);

		return view('userfilter.index', compact('data'));
	}

    function json(){
		$user_filter = User_filter::get();

		$count=0;
		$data = array();
		foreach($user_filter as $post){
			$data[$count]['id']       = $post->id;
			$data[$count]['name']     = $post->name;
			$data[$count]['telp']     = $post->telp;
			$data[$count]['gender']   = ucwords($post->gender);
			$data[$count]['province'] = $post->province;
			$data[$count]['city']     = $post->city;
			$data[$count]['address']  = $post->address;
			
			$count++;
		}

		echo json_encode(array("data"=>$data));		
	}

    function search(Request $request){
        $gender = $request->gender;
        $province = $request->province;
        $search = $request->search;

        if($gender==""){
            $user_filter = User_filter::where('province','LIKE',"%{$province}%")
            ->where('name','LIKE',"%{$search}%")
            ->get();
        }else{
            $user_filter = User_filter::where('gender',$gender)
            ->where('province','LIKE',"%{$province}%")
            ->where('name','LIKE',"%{$search}%")
            ->get();
        }

		$count=0;
		$data = array();
		foreach($user_filter as $post){
			$data[$count]['id']       = $post->id;
			$data[$count]['name']     = $post->name;
			$data[$count]['telp']     = $post->telp;
			$data[$count]['gender']   = ucwords($post->gender);
			$data[$count]['province'] = $post->province;
			$data[$count]['city']     = $post->city;
			$data[$count]['address']  = $post->address;
			
			$count++;
		}

		echo json_encode(array("data"=>$data));		
	}
    
}

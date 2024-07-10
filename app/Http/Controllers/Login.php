<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Controller{

    public function index(){
		if(!Session()->has('login')){
            $data = array();
			$data['app_name'] = "CMS Laravel";
			$data['title']    = "Login";

			return view('index', compact('data'));
        }else{
			return redirect()->route('dashboard.index')->with('info','Welcome '.Session::get('nama'));
		}
	}

    public function process(Request $request){
        $username = $request->username;
        $password = $request->password;
		$hash_password = Hash::make($request->password);
		
		$user = DB::table('users')
            ->join('user_levels', 'users.user_levels_id', '=', 'user_levels.id')
            ->select('users.*', 'user_levels.nama as user_levels_nama')
			->where('users.username', $username)
            ->first();

		if($user){
			$try = Hash::check($request->password, $user->password);
			if($try){
				
				Session::put('user_levels_id',$user->user_levels_id);
				Session::put('user_levels_nama',$user->user_levels_nama);
				Session::put('username',$user->username);
				Session::put('nama',$user->nama);
				Session::put('login',TRUE);
				
				return redirect()->route('dashboard.index')->with('info','Welcome '.$user->nama);
			}else{
				return redirect()->route('login')->with('danger','Username and Password is not match');
			}
		}else{
			return redirect()->route('login')->with('danger','Username is not found');
		}
    }

    function logout(){
		Session::flush();
        return redirect()->route('login')->with('info','Successfully logout');
	}
}

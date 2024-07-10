<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_level;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Userlevel extends Controller{

    public function index(){
		$data = array();
		$data['app_name']     = "CMS Laravel";
		$data['title_parent'] = "Admin Panel";
        $data['title_child']  = "User Level";

		return view('userlevel.index', compact('data'));
	}

	function json(){
		$user_level = User_level::get();

		$count=0;
		$data = array();
		foreach($user_level as $post){
			$edit = "<a style='color:#6c757d;font-weight:bold' href=".route('userlevel.edit',$post->id).">Edit</a>";
				
			$data[$count]['id']     = "<div style='text-align: center;'>".$post->id."</div>";
			$data[$count]['nama']   = $post->nama;
			$data[$count]['action'] = "<div style='text-align: center;'>".$edit."</div>";
			
			$count++;
		}

		echo json_encode(array("data"=>$data));		
	}

	function edit($id){
		$user_level = User_level::where('id', $id)->first();
		if($user_level){
			$data = array();
			$data['app_name']     = "CMS Laravel";
			$data['title_parent'] = "Admin Panel";
			$data['title_child']  = "User Level Edit";
			$data['id']           = $id;
			$data['user_level']   = $user_level;
			
			return view('userlevel.edit', compact('data'));			
		}else{
			return redirect()->route('userlevel.index')->with('alert','Data is not found');
		}
	}

	function update(Request $request){
		$data = array();
		$user_level = User_level::where('id', $request->id)->first();
		$validate = Validator::make($request->all(), [
			'id'     => 'required',
			'nama'   => 'required|min:5|max:100|regex:/^[a-zA-Z]+$/u|unique:user_levels,nama,'.$user_level->id
			],[
            'id.required' => 'ID field is required.',
            'nama.required' => 'Nama field is required',
			]);
			
			if($validate->fails()){
				$data['code']   = "412";
				$data['errors'] = $validate->errors();
				
				echo json_encode($data);		
			}else{
				if($user_level){
					
					User_level::where('id', $request->id)
				   ->update([
					   'nama' => $request->nama
					]);
					
					$data['code']   = "200";
					$data['msg']    = "Successfully saves data";
				
					echo json_encode($data);			
				}else{
					$data['code']   = "404";
					$data['msg']    = "Data is not found";
				
					echo json_encode($data);
				}
			}	
	}


    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    	public function all()
    	{
		$users = Users::all();
		return response($users);
	}
	
	public function show(Request $requests)
	{
		$id = $requests->id;
		$users = Users::find($id);
		return response($users);

	}
	
	public function search(Request $requests)
	{

		//Not working
		$name = request()->get('name');
		
		$user = Users::query()->where('first_name', 'LIKE', "%{$name}%")->orWhere('last_name','LIKE', "%{$name}%")->get();
		return $user;
	}
}

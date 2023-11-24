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

	public function generation(Request $requests)
	{

		$number = $requests->number;
		//$users = new Users;

		$first_name = ['Anton','Andrey','Vladimir', 'Denis', 'Ivan', 'Kirill', 'Nikita', 'Pavel', 'Roman', 'Anna', 'Alisa', 'Irina', 'Marina', 'Polina'];
		$last_name = ['Valeryevna', 'Victorovich', 'Mikhaylovna', 'Vasilyevich', 'Vladimirovich'];
		$age;
		$role = ['Illusionist','Driver', 'Doctor', 'Policeman', 'Builder', 'Engineer', 'Fireman', 'Administrator', 'Broker', 'Miner', 'Blogger', 'Pilot'];
	
		function random($first_name,$last_name,$role){
			$random = [
				$first_name[rand(0, count($first_name) - 1)], 
				$last_name[rand(0, count($last_name) - 1 )],
				//$age = rand(18,60),
				$role[rand(0, count($role) - 1)]
			];
			return $random;
		}
	
		for($i = 0; $i < $number; $i++){
			$users = new Users;
			$random = random($first_name,$last_name,$role);
			$users->first_name = $random[0];
			$users->last_name = $random[1];
			$users->age = rand(18,60);
			$users->role = $random[2];
			$users->save();
		}
		
		return 'Сгенерировано ' . str($number) . ' записей'; 

	}
}

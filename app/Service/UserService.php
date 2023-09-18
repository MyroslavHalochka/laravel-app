<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserService
{

	public function store($data)
	{
		try{
            DB::beginTransaction();

            $data['password'] = Hash::make($data['password']);
            $user = User::firstOrCreate(['email' => $data['email']], $data);

            DB::commit();
        } catch(\Exception $exception) {
        	DB::rollback();
            abort(500);
        }
	}

	public function update($data, $user)
	{
		try{
			DB::beginTransaction();
            
	        $user->update($data);

	        DB::commit();
        } catch(\Exception $exception) {
        	DB::rollback();
            abort(500);
        }

        return $user;
	}

}
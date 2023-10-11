<?php

namespace App\Service;

use App\Models\User;
use App\Mail\User\PasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{

	public function store($data)
	{
		try{
            DB::beginTransaction();

            $password = Str::random(10);
            $data['password'] = Hash::make($password);
            $user = User::firstOrCreate(['email' => $data['email']], $data);
            Mail::to($data['email'])->send(new PasswordMail($password));

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
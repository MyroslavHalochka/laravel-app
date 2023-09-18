<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}

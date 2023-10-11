<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use Illuminate\Http\Request;
use App\Models\User;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $roles = User::getRoles();
        return view(('admin.users.create'), compact('roles'));
    }
}

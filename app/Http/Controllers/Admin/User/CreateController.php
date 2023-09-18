<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.users.create');
    }
}

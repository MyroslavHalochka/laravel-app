<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}

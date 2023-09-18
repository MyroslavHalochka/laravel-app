<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\User\BaseController;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user = $this->service->update($data, $user);

        return view('admin.users.show', compact('user'));
    }
}

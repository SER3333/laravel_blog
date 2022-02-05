<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Roles\UpdateRequest;
use App\Models\Roles;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Roles $role){
        $data = $request -> validated();
        $role -> update($data);
        return view('admin.roles.show', compact('role'));
    }
}

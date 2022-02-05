<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class EditController extends Controller
{
    public function __invoke(Roles $role){
        return view('admin.roles.edit', compact('role'));
    }
}

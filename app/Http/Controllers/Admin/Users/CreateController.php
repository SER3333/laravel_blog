<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class CreateController extends Controller
{
    public function __invoke(){
        $roles = Roles::all();
        return view('admin.users.create', compact('roles'));
    }
}

<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

class EditController extends Controller
{
    public function __invoke(User $user){
        $roles = Roles::all();
        return view('admin.users.edit', compact('user','roles'));
    }
}

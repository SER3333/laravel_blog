<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class IndexController extends Controller
{
    public function __invoke(){
        $roles = Roles::all();
        return view('admin.roles.index', compact('roles'));
    }
}

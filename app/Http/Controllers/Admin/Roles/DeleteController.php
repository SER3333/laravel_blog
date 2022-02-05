<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

class DeleteController extends Controller
{
    public function __invoke(Roles $role){
        $role -> delete();
        return redirect() -> route('admin.roles.index');
    }
}

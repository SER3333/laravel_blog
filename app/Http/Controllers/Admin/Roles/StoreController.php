<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Roles\StoreRequest;
use App\Models\Roles;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request -> validated();
        Roles::FirstOrCreate($data);
        return redirect()-> route('admin.roles.index');
    }
}

<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Requests;
use App\Http\Requests\Admin\Categories\StoreRequest;
use App\Models\Categorie;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request -> validated();
        Categorie::FirstOrCreate($data);
        return redirect()-> route('admin.categories.index');
    }
}

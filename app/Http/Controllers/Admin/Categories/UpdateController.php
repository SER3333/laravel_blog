<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Categorie;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Categorie $category){
        $data = $request -> validated();
        $category -> update($data);
        return view('admin.categories.show', compact('category'));
    }
}

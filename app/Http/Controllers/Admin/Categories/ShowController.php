<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class ShowController extends Controller
{
    public function __invoke(Categorie $category){
        return view('admin.categories.show', compact('category'));
    }
}

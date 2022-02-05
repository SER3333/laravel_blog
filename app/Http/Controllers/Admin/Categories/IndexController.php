<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class IndexController extends Controller
{
    public function __invoke(){
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }
}

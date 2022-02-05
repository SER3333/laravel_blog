<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class EditController extends Controller
{
    public function __invoke(Categorie $category){
        return view('admin.categories.edit', compact('category'));
    }
}

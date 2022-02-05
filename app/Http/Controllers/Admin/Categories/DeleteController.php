<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class DeleteController extends Controller
{
    public function __invoke(Categorie $category){
        $category -> delete();
        return redirect() -> route('admin.categories.index');
    }
}

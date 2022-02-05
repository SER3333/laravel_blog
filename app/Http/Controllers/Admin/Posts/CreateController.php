<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke(){
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }
}

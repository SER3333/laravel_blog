<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(){
        $data = [];
        $data['count_user']=User::all()->count();
        $data['count_post']=Post::all()->count();
        $data['count_categori']=Categorie::all()->count();
        $data['count_tag']=Tag::all()->count();

        return view('admin.main.index', compact('data'));
    }
}

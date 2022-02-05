<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class indexController extends Controller
{
    public function __invoke(){
       
        return redirect() -> route('posts.index');
    }
}

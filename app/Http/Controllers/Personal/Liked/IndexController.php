<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(){
        
        $posts = auth()->user()->likedPosts;
        //dd($data);
        return view('personal.liked.index', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(){
        $posts = Post::paginate(6);
        //dd($posts);
        $randomPosts = Post::get()->random(4);
        $likedPost = Post::withCount('likedUsers')
            ->orderBy('liked_users_count', 'DESC')
            ->get()
            ->take(4);
        //dd($likedPost);
        return view('posts.index', compact('posts', 'randomPosts', 'likedPost'));
    }
}

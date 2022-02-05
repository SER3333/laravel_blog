<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Post $post){
        return view('admin.posts.show', compact('post'));
    }
}

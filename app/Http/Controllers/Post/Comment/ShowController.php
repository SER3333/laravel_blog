<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post){
        
        $data = $post->comments->load('user');
        
        return $data;
    }
}

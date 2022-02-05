<?php

namespace App\Http\Controllers\Post\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(Post $post, User $user)
    {
        $user->likedPosts()->toggle($post->id);
        //$data = $user->likedPosts->contains($post->id);
        //return $data;
        
    }
}

<?php

namespace App\Http\Controllers\Post\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(Post $post, User $user){
        
        $data['post_count'] = $post->liked_users_count;
        $data['user_liked'] = $user->likedPosts->contains($post->id);
        //dd($data);
        return $data;
    }
}

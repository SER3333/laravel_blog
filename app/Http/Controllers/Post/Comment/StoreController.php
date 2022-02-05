<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, Post $post, User $user){
        $data = $request -> validated();
        $data['user_id'] = $user->id;//auth()->user()->id;
        $data['post_id'] = $post->id;
        //dd($data);
        Comment::Create($data);
        //return redirect()-> route('posts.show', $post->id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag;
use App\Models\Categorie;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';

    protected $withCount = ['likedUsers'];

    protected $with = ['category'];


    protected $fillable = [
        'title',
        'content',
        'category_id',
        'preview_image',
        'main_image',
    ];
    public function tags(){
        return $this -> belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category(){
        return $this -> belongsTo(Categorie::class, 'category_id', 'id');
    }
    public function likedUsers(){
        return $this -> belongsToMany(User::class, 'post_user_likeds', 'post_id', 'user_id');
    }
    public function comments(){
        return $this -> hasMany(Comment::class, 'post_id', 'id');
    }
}

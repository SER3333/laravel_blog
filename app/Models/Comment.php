<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';


    protected $fillable = [
        'message',
        'post_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //public function getDateAsCarbonAttribute(){
    //    return Carbon::parse($this->created_at);
    //}

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->diffForHumans();
    }
    public function post(){
        return $this -> belongsTo(Post::class, 'post_id', 'id');
    }
}

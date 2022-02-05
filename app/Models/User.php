<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Roles;
use App\Models\Post;
use App\Models\Comment;
use App\Notifications\SendVerifyWithQueueNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public function sendEmailVerificationNotification(){
        $this -> notify(new SendVerifyWithQueueNotification());
    }
    public function likedPosts(){            
        return $this -> belongsToMany(Post::class, 'post_user_likeds', 'user_id', 'post_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

}

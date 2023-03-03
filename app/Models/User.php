<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Rennokki\Befriended\Contracts\Likeable;
use Rennokki\Befriended\Contracts\Liker;
use Rennokki\Befriended\Contracts\Liking;
use Rennokki\Befriended\Traits\CanBeLiked;
use Rennokki\Befriended\Traits\CanLike;
use Rennokki\Befriended\Traits\Like;

class User extends Authenticatable implements JWTSubject, Liker, Likeable, Liking
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use CanBeLiked, CanLike, Like;

    protected $table = 'users';
    protected $guarded = [];
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'birthday' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}

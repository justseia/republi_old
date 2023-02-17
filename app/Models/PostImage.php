<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post_images';
    protected $guarded = [];
    protected $hidden = [
        'post_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

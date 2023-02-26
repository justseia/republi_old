<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'images';
    protected $guarded = [];
    protected $hidden = [
        'post_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

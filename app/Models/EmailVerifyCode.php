<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerifyCode extends Model
{
    use HasFactory;

    protected $table = 'email_verify_codes';
    protected $guarded = [];
    protected $hidden = [];
}

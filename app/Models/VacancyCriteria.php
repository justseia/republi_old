<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacancyCriteria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vacancy_criterias';
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}

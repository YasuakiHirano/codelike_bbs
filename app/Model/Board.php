<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'user_name',
        'about_text',
        'password',
    ];
    protected $dates = ['deleted_at'];
}

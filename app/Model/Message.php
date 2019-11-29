<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 * @package App\Model
 */
class Message extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'board_id',
        'user_name',
        'message'
    ];
    protected $dates = ['deleted_at'];
}

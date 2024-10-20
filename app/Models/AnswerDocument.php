<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerDocument extends Model
{
    protected $fillable = [
        'original_name',
        'path',
        'user_id',
        'petition_id',
    ];
}

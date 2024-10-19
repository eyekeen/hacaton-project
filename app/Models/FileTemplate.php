<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileTemplate extends Model
{
    protected $fillable = [
        'uri',
        'role_id'
    ];
}

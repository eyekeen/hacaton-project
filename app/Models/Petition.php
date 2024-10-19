<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Document;

class Petition extends Model
{
    protected $fillable = [
        'document_id',
        'user_id',
        'status',
        'reciever'
    ];


    public function statuses() {
        return $this->belongsTo(Status::class, 'status');
    }

    public function documents() {
        return $this->belongsTo(Document::class, 'document_id');
    }

}

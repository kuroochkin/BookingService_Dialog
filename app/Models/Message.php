<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'sender_id',
        'recipient_id',
        'text',
        'date',
        'status',
        'dialog_id',
    ];
}

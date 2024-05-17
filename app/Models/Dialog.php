<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'landlord_id',
        'tenant_id',
    ];

    public function getKeyType()
    {
        return 'string';
    }
}

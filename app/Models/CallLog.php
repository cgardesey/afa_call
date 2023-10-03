<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'caller_phonenumber',
        'callee_phonenumber',
        'call_id',
        'user_id',

    ];
}

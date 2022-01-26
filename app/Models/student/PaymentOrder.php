<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'user_id',
        'transcript_request_id',
        'amaunt',
        'telphone',
        'status'
    ];
}

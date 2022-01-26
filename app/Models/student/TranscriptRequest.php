<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranscriptRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'payment_status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 

}

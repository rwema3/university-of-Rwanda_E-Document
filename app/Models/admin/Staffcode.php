<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',

    ];
}

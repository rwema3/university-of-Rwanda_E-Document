<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'level',
        'credits',
        'semester',
        'user_id',
        'status',
        'departement_id'
    ];
}

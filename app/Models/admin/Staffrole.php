<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffrole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',

    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}

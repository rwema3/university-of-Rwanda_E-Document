<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
     protected $fillable = [
        'marks',
        'user_id',
        'module_id',
        'year'
];

public function user(){
    return $this()->belongsTo(User::class);
}

}

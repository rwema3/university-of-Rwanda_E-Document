<?php

namespace App\Models\admin;

use App\Models\staff\Staffrequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telphone',
        'email',
        'stamp',
        'signature',
        'about',
        'status',
        'completed',
    ];

    public function requests()
    {
        return $this->hasMany(Staffrequest::class);
    }
}

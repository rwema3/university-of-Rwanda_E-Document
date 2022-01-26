<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stamp',
        'status'
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }

}

<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stamp',
        'status',
        'college_id'
    ];

    public function departements()
    {
        return $this->hasMany(Departement::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

}

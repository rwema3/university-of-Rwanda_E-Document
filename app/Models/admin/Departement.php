<?php

namespace App\Models\admin;

use App\Models\head\HeadOfDepartement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stamp',
        'status',
        'college_id',
        'schools_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function headofdepartement()
    {
        return $this->belongsTo(HeadOfDepartement::class);
    }
}

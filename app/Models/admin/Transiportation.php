<?php

namespace App\Models\admin;

use App\Models\staff\Staffrequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transiportation extends Model
{
    use HasFactory;

    public function staffrequests()
    {
        return $this->hasMany(Staffrequest::class);
    }

}

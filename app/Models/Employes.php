<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;

    protected $table = 'employes';

    function company(){
        return $this->hasOne('App\Models\Companies', 'id', 'company_id');
    }
}

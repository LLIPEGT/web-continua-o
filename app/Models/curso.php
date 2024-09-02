<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;

    public function eixo(){
        return $this->belongsTo('App\Models\Eixo');
    }
}

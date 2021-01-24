<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    //relacion 1 a1 inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
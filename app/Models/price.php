<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // relacion uno a muchos
    public function course(){
        return $this->hasMany('App\Models\Course');
    }
}

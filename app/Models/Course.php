<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'status'];
    const borrador = 1;
    const revision = 2;
    const publicado = 3;

    // relacion uno a muchos
  public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }
    public function audience(){
        return $this->hasMany('App\Models\Audience');
    }
    public function sections(){
        return $this->hasMany('App\Models\section');
    }

    // relaciona uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }
    public function category(){
        return $this->belongsTo('App\Models\Level');
    }
    public function price(){
        return $this->belongsTo('App\Models\Level');
    }
    
    

    // relacion muchos a muchos 
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    // relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\section');
    }
}




<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // relacion uno a un
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

// relacion uno a muchos inversa
    public function section(){
        return $this->belongsTo('App\Models\section');
    }
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }
    // relacion muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    // relacion uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    // relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphToMany('App\Models\Comment', 'commentable');
    } 
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}

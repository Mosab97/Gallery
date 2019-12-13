<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['Album_id','description','photo','title','size'];
    public function album(){
        return $this->belongsTo(Album::class,'Album_id','id');

    }
}

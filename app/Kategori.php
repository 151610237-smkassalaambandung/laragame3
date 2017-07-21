<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['kategori'];

    public function beritas()
    {
    	return $this->hasMany('App/Berita');
    }
}

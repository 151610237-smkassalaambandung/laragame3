<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Berita extends Model
{
    protected $fillable = ['cover','judul','spoiler','deskripsi','kategori_id'];

    public function kategori()
    {
    	return $this->belongsTo('App\Kategori');
    }
}

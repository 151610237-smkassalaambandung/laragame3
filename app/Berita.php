<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Berita extends Model
{
    protected $fillable = ['cover','judul','deskripsi','tanggal','kategori_id'];

    public function kategoris()
    {
    	return $this->belongsTo('App\Kategori');
    }
}

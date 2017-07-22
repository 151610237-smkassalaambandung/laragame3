<?php

use Illuminate\Database\Seeder;
use App\Kategori;
use App\Berita;
use App\User;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori1=Kategori::create(['kategori'=>'Terbaru']);
        $kategori2=Kategori::create(['kategori'=>'Nitendo']);
        $kategori3=Kategori::create(['kategori'=>'PS2']);

        $berita1=Berita::create(['judul'=>'Street Fighter IV: Edisi Champion Memulai Debut Di Ranah iOS','deskripsi'=>'bababajkuhaihdadh', 'tanggal'=>'2017-10-10','kategori_id'=>$kategori1->id]);
    }
}

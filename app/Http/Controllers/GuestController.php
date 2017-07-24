<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Berita;
use Laratrust\LaratrustFacade as Laratrust;


class GuestController extends Controller
{
	public function index(Request $request, Builder $htmlBuilder)
	{
    if ($request->ajax())
        {
            $berita = Berita::with('kategori');
            return Datatables::of($berita)
            ->addColumn('cover', function($berita){
              return '<img src="/img/'.$berita->cover. '" height="100px" width="100px" >';
            })
            ->addColumn('deskripsi', function($berita){
              return '<a href="'.route('home.show',$berita->id).'">'.$berita->deskripsi.'</a>';
            })
            ->addColumn('stock',function($berita){
            return $berita->stock;
            })
                ->addColumn('action',function($berita){                    
                if (Laratrust::hasRole('guest')) return '';
                /* return '<a class="btn btn-xs btn-primary" 
                        href=" '.route('guest.beritas.borrow',$berita->id).' ">
                        <i class="fa fa-btn fa-check-square-o"></i> Pinjam</a>'; */
            })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data'=>'cover','name'=>'cover','title'=>'Cover'])
        ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
        ->addColumn(['data'=>'deskripsi','name'=>'deskripsi','title'=>'Deskripsi', 'orderable'=>false,'searchable'=>false])
        ->addColumn(['data'=>'tanggal','name'=>'tanggal','title'=>'Tanggal'])
        ->addColumn(['data'=>'kategori.kategori','name'=>'kategori.kategori','title'=>'Nama Kategori']);
        

        return view('beritas.index')->with(compact('html'));
    }

}

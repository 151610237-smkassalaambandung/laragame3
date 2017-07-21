<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Berita;
use Illuminate\Support\Facades\Session;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $beritas = Berita::with('kategoris');
            return Datatables::of($beritas)
                ->addColumn('cover', function($beritas){
                    return '<img src="/img/'.$beritas->cover. '" height="100px" width="100px">';
                })
                ->addColumn('action', function($berita){
                    return view('datatable._action', [
                        'model'     => $berita,
                        'form_url'  => route('beritas.destroy',$berita->id),
                        'edit_url' => route('beritas.edit', $berita->id),
                        'confirm_message' => 'Yakin Ingin Menghapus ' . $berita->name . ' ?' ]);
                    
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data'=>'cover','name'=>'cover','title'=>'Cover'])
        ->addColumn(['data'=>'judul','name'=>'judul','title'=>'Judul'])
        ->addColumn(['data'=>'deskripsi','name'=>'deskripsi','title'=>'Deskripsi'])
        ->addColumn(['data'=>'tanggal','name'=>'tanggal','title'=>'Tanggal'])
        ->addColumn(['data'=>'kategoris.kategori','name'=>'kategoris.kategori','title'=>'Nama Kategori'])
        ->addColumn(['data'=>'action', 'name'=>'action', 'title'=>'', 'orderable'=>false,'searchable'=>false]);

        return view('beritas.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beritas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' =>'required|unique:beritas,judul',
            'kategori_id'=>'required|exists:kategoris,id',
            'deskripsi'=>'required|string',
            'tanggal'=>'required|date',
            'cover'=>'image|max:10000'
            ]); 
        $berita = Berita::create($request->except('cover'));
        //isi file cover jika ada cover yang di upload
        if($request->hasFile('cover')) {
            //mengambil file yang di upload
            $uploded_cover = $request->file('cover');
            //mengambil extensi file
            $extension = $uploded_cover->getClientOriginalExtension();
            //membuat nama file random berikut extensi
            $filename=md5(time()) .'.'. $extension;
            //menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR .'img';
            $uploded_cover->move($destinationPath,$filename);
            //mengisi field cover di berita dengan file name yang baru di buat
            $berita->cover = $filename;
            $berita->save();
        }
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $berita->judul"
            ]);
        return redirect()->route('beritas.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

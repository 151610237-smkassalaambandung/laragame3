<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Author;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;



class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $kategoris = Kategori::select(['id','kategori']);
            return Datatables::of($kategoris)
                ->addColumn('action', function($kategori){
                    return view('datatable._action', [
                        'model'     => $kategori,
                        'form_url'  => route('kategoris.destroy',$kategori->id),
                        'edit_url' => route('kategoris.edit', $kategori->id),
                        'confirm_message' => 'Yakin Ingin Menghapus ' . $kategori->name . ' ?' ]);
                    
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data'=>'kategori','name'=>'kategori','title'=>'Kategori'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);

        return view('kategoris.index')->with(compact('html'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['kategori'=>'required|unique:kategoris']);
        $kategori = Kategori::create($request->only('kategori'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $kategori->kategori"]);
        return redirect()->route('kategoris.index');
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
        $kategori=Kategori::find($id);
        return view('kategoris.edit')->with(compact('kategori'));
        
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
        $this->validate($request, ['kategori'=>'required|unique:kategoris,kategori,'.$id]);
        $kategori = Kategori::find($id);
        $kategori->update($request->only('kategori'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $kategori->kategori"]);
        return redirect()->route('kategoris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Kategori::destroy($id))  return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Kategori Berhasil Dihapus"]);
        return redirect()->route('kategoris.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Publikasi;
use Illuminate\Http\Request;
use DateTime;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Publikasi::all();
        return view('pages.publikasi.adminPublikasi')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.publikasi.adminPublikasiForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'nama' => 'required|max:255',
        ));
        $data = new Publikasi();
        $data->nama = $request->nama;
        $data->tanggal  = DateTime::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d');
        //dd($data);
        $data->save();
        if(isset($request->dosenWali))
        {
            $data->dsnpublikasi()->sync($request->dosenWali,false);
        }else{
            $data->dsnpublikasi()->sync(array());
        }
        return redirect()->route('publikasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Publikasi::find($id);
        return view('pages.publikasi.adminViewPublikasi')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Publikasi::find($id);
        //$dosens = Data_Dosen::all();
        return view('pages.publikasi.publikasiFormEdit')->withPost($post);
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
        $this->validate($request,array(
            'nama' => 'required|max:255',
        ));
        $data = Publikasi::find($id);
        $data->nama = $request->nama;
        $data->tanggal  = DateTime::createFromFormat('d/m/Y', $request->tanggal)->format('Y-m-d');
        //dd($data);
        $data->save();
        if(isset($request->publikasi))
        {
            $data->dsnpublikasi()->sync($request->dosenWali);
        }else{
            $data->dsnpublikasi()->sync(array());
        }
        return redirect()->route('publikasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Publikasi::find($id);
        $post->delete();
        return redirect()->route('publikasi.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Data_Dosen;
use App\DataMahasiswa;
use App\Publikasi;
use Illuminate\Http\Request;
use Storage;
use Image;
use File;

class DataDosenController extends Controller
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
        $posts = Data_Dosen::paginate(10);
        //$mahasiswa = DataMahasiswa::all();
        return view('pages.dosen.adminDosen')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswas = DataMahasiswa::all();
        $publikasis = Publikasi::all();
        return view('pages.dosen.adminDosenForm')->withMahasiswas($mahasiswas)->withPublikasis($publikasis);
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
            'nip'  => 'required|max:255',
        ));
        $data = new Data_Dosen();
        $data->nama = $request->nama;
        $data->nip = $request->nip;

        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/dosen/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $data->gambar = $filename;
        }

        $data->save();
        if(isset($request->wali))
        {
            $data->waliMahasiswa()->sync($request->wali,false);
        }else{
            $data->waliMahasiswa()->sync(array());
        }

        if(isset($request->publikasi)){
            $data->publikasi()->sync($request->publikasi,false);
        }else {
            $data->publikasi()->sync(array());
        }

        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Data_Dosen::find($id);
        return view('pages.dosen.adminViewDosen')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Data_Dosen::find($id);
        $mahasiswas = DataMahasiswa::all();
        $publikasis = Publikasi::all();
        return view('pages.dosen.dosenFormEdit')->withPost($post)->withMahasiswas($mahasiswas)->withPublikasis($publikasis);
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
        //dd($request);
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'nip'  => 'required|max:255',
            'gambar' => 'image',
        ));

        $post = Data_Dosen::find($id);
        $post->nama = $request->nama;
        $post->nip = $request->nip;
        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/dosen/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFile = $post->gambar;
            //$destination = public_path('image/'.$oldFile);
            $oldLocation = public_path('image/dosen/'.$oldFile);
            //Storage::disk('local')->delete($oldLocation);
            //Storage::delete($oldLocation);
            //File::copy($oldLocation,$destination);
            File::delete($oldLocation);
            $post->gambar = $filename;
        }

        $post->save();

        if(isset($request->wali))
        {
            $post->waliMahasiswa()->sync($request->wali);
        }else{
            $post->waliMahasiswa()->sync(array());
        }

        if(isset($request->publikasi)){
            $post->publikasi()->sync($request->publikasi);
        }else {
            $post->publikasi()->sync(array());
        }

        return redirect()->route('dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Data_Dosen::find($id);
        //Storage::delete($post->gambar);
        File::delete($post->gambar);
        $post->delete();
        return redirect()->route('dosen.index');
    }
}

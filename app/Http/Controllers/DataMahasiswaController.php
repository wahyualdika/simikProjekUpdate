<?php

namespace App\Http\Controllers;

use App\Data_Dosen;
use Illuminate\Http\Request;
use App\DataMahasiswa;
use DateTime;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Storage;
use Image;
use File;
use Illuminate\Support\Facades\Input;


class DataMahasiswaController extends Controller
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
        $posts = DataMahasiswa::all();
        return view('pages.mahasiswa.adminMahasiswa')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosens = Data_Dosen::all();
        return view('pages.mahasiswa.adminMahasiswaForm')->withDosens($dosens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request,array(
            'nama' => 'required|max:255',
            'nim'  => 'required|max:255',
            'pembimbing1'=>'max:255',
            'pembimbing2'=>'max:255',
            'gambar' =>'image',

        ));
        $data = new DataMahasiswa();
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->pembimbing1 = $request->pembimbing1;
        $data->pembimbing2 = $request->pembimbing2;

        $data->tanggal_masuk  = DateTime::createFromFormat('d/m/Y', $request->tanggal_masuk)->format('Y-m-d');
        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/mahasiswa/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $data->gambar = $filename;
        }
        //dd($data);
        $data->save();
        if(isset($request->dosenWali))
        {
            $data->dosenWali()->sync($request->dosenWali,false);
        }else{
            $data->dosenWali()->sync(array());
        }
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DataMahasiswa::find($id);
        return view('pages.mahasiswa.adminViewMahasiswa')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DataMahasiswa::find($id);
        $dosens = Data_Dosen::all();
        return view('pages.mahasiswa.mahasiswaFormEdit')->withPost($post)->withDosens($dosens);
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
            'nim'  => 'required|max:255',
            'pembimbing1'=>'max:255',
            'pembimbing2'=>'max:255',
            'gambar' => 'mimes:jpeg,jpg,bmp,png,bin|max:2048',

        ), [
            'gambar.max' => 'exceed expected maximum limitation'
        ]);
        $data = DataMahasiswa::find($id);
        $data->nama = $request->nama;
        $data->nim = $request->nim;
        $data->pembimbing1 = $request->pembimbing1;
        $data->pembimbing2 = $request->pembimbing2;
        $data->tanggal_masuk  = DateTime::createFromFormat('d/m/Y', $request->tanggal_masuk)->format('Y-m-d');

        if(Input::file('gambar')!= null){
            $image = Input::file('gambar');
            $filename = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/mahasiswa/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFile = $data->gambar;
            $oldLocation = public_path('image/mahasiswa/'.$oldFile);
            //Storage::disk('local')->delete($oldLocation);
            //Storage::delete('image/mahasiswa/'.$oldFile);
            File::delete($oldLocation);
            $data->gambar = $filename;
        }

        //dd($data);
        $data->save();
        if(isset($request->dosenWali))
        {
            $data->dosenWali()->sync($request->dosenWali);
        }else{
            $data->dosenWali()->sync(array());
        }
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $post = DataMahasiswa::find($id);
        //$post->dosenWali()->detach();
        //Storage::delete($post->gambar);
        if ($user->can('destroy', $post)) {
            echo "Current logged in user is allowed to delete the Post: {$post->id}";
            dd('berhasil'.$user->id);
        } else {
            echo 'Not Authorized.';
            dd('berhasil'.$user->id);
        }
        File::delete($post->gambar);
        $post->delete();
        return redirect()->route('mahasiswa.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\DataStaff;
use Illuminate\Http\Request;

class DataStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts =  DataStaff::all();
        return view('pages.staff.adminStaff')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.staff.adminStaffForm');
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
            'jabatan' => 'required|max:255',
        ));
        $data = new DataStaff();
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->jabatan = $request->jabatan;
        $data->save();
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DataStaff::find($id);
        return view('pages.staff.adminViewDosen')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DataStaff::find($id);
        return view('pages.staff.staffEditForm')->withPost($post);
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
            'nip'  => 'required|max:255',
            'jabatan' => 'required|max:255',
        ));
        $data = DataStaff::find($id);
        $data->nama = $request->nama;
        $data->nip = $request->nip;
        $data->jabatan = $request->jabatan;
        $data->save();
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = DataStaff::find($id);
        $post->delete();
        return redirect()->route('staff.index');
    }
}

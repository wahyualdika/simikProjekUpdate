<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataMahasiswa;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

  /*  public function getData($nim)
    {
        $data = DataMahasiswa::where('nim',$nim)->first();
//        dd($data);
//        $json = json_encode($data);
//        $options = view("home",compact('json'))->render();
        return response()->json($data);
    }*/
     public function getData(Request $request)
    {
        $nim = $request->nim;
        $data = DataMahasiswa::where('nim',$nim)->first();
//        dd($data);
//        $json = json_encode($data);
//        $options = view("home",compact('json'))->render();
        return response()->json($data);
    }
}

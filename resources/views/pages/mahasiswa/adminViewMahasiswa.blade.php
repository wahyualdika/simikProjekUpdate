@extends('pages.master')

@section('side-content')
    <div class="col-md-12 mb-7">
        <div class="card">
            <dl class="card-body">
                <h5 class="card-title">Data Mahasiswa {{ $posts->nama }}</h5>

                <!-- Default panel contents -->



                <!-- List group -->
                <dl>
                    <dt>Nama            : {{$posts->nama}}</dt>
                    <dt>NIM             : {{$posts->nim}}</dt>
                    <dt>Tanggal Masuk   : {{date('d/m/Y',strtotime($posts->tanggal_masuk))}}</dt>
                </dl>
                <dl>
                    <dt>Judul TA:</dt>
                    <dt>Pembimbing 1 : {{$posts->pembimbing1}}</dt>
                    <dt>Pembimbing 2 : {{$posts->pembimbing2}}</dt>
                </dl>
                <dt>Dosen Wali :  <ul class="list-group">
                    @foreach($posts->dosenWali as $post)
                        <li class="list-group-item">{{$post->nama}}</li>
                    @endforeach
                </ul>
                </dt>
            </dl>

        </div>
        <div><img src="{!! asset('image/mahasiswa/'.$posts->gambar) !!}" style="width: 80px;height: 80px" ></div>


    </div>
    </div>

@endsection
@extends('pages.master')

@section('side-content')
    <div class="col-md-3 mb-7">
        <div class="card">
            <dl class="card-body">
                <h5 class="card-title">Data Dosen {{ $posts->nama }}</h5>
                                <dl>
                                    <dt>Nama : {{$posts->nama}}</dt>
                                    <dt>NIP : {{$posts->nip}}</dt>
                                </dl>
                                <dl>
                                    <dt>Publikasi:</dt>
                                    <ul class="list-group">
                                        @foreach($posts->publikasi as $publikasi)
                                            <li class="list-group-item">{{$publikasi->nama}}</li>
                                        @endforeach
                                    </ul>
                                </dl>
                                    <dt>Dosen Wali Dari:</dt>
                                        <ul class="list-group">
                                            @foreach($posts->waliMahasiswa as $post)
                                                  <li class="list-group-item">{{$post->nama}}</li>
                                            @endforeach
                                        </ul>
                                </dl>
                        </div>
        <div><img src="{!! URL::asset('image/dosen/'.$posts->gambar) !!}" style="width: 80px;height: 80px" ></div>
        </div>
    </div>

@endsection
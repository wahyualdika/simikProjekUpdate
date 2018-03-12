@extends('pages.master')

@section('side-content')
    <div class="col-md-12 mb-7">
        <div class="card">
            <dl class="card-body">
                <h5 class="card-title">Data Publikasi {{ $posts->nama }}</h5>

                <!-- Default panel contents -->



                <!-- List group -->
                <dl>
                    <dt>Nama               : {{$posts->nama}}</dt>
                    <dt>Tanggal Publikasi  : {{$posts->tanggal}}</dt>
                </dl>
                <dt>Dosen Wali :  <ul class="list-group">
                    @foreach($posts->dsnpublikasi as $post)
                        <li class="list-group-item">{{$post->nama}}</li>
                    @endforeach
                </ul>
                </dt>
            </dl>

        </div>


    </div>
    </div>

@endsection
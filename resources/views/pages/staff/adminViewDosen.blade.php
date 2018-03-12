@extends('pages.master')

@section('side-content')
    <div class="col-md-3 mb-7">
        <div class="card">
            <dl class="card-body">
                <h5 class="card-title">Data Staff</h5>
                <h4 class="card-title">{{ $posts->nama }}</h4>

                <!-- Default panel contents -->



                <!-- List group -->
                <dl>
                    <dt>Nama    : {{$posts->nama}}</dt>
                    <dt>NIP     : {{$posts->nip}}</dt>
                    <dt>Jabatan : {{$posts->jabatan}}</dt>
                </dl>
                <dl>
                    <dt>Publikasi:</dt>
                </dl>
                <dt>Dosen Wali Dari:</dt>
            </dl>

        </div>


    </div>
    </div>

@endsection
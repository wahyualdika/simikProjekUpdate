@extends('pages.master')

@section('side-content')
    <div class="col-lg-12 mb-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">List Mahasiswa</h5>
                <table class="table table-hover">
                    <thead>
                    <tr class="text-primary">
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Dosen Wali</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>Tanggal Masuk</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1
                    @endphp
                    @foreach($posts as $post)

                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{ $post->nama }}</td>
                            <td>{{ $post->nim }}</td>
                            @foreach($post->dosenWali as $dosenWali)
                                 <td>{{ $dosenWali->nama}}</td>
                            @endforeach
                            <td>{{ $post->pembimbing1}}</td>
                            <td>{{ $post->pembimbing2}}</td>
                            <td>{{ date('d/m/Y',strtotime($post->tanggal_masuk))}}</td>
                            <form class="forms-sample" action="{!! url('mahasiswa/'.$post->id) !!}"  method="post">
                                <td>
                                <div class="btn-group" role="group">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    <a href="{!! url('mahasiswa/'.$post->id.'/edit') !!}" class="btn btn-primary">Edit</a>
                                    <a href="{!! url('mahasiswa/'.$post->id) !!}" class="btn btn-success">Lihat</a>
                                </div>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection



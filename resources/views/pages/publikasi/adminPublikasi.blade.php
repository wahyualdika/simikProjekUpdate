@extends('pages.master')

@section('side-content')
    <div class="col-lg-10 mb-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">List Mahasiswa</h5>
                <table class="table table-hover">
                    <thead>
                    <tr class="">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tanggal </th>
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
                            <td>{{ $post->tanggal}}</td>
                            <form class="forms-sample" action="{!! url('publikasi/'.$post->id) !!}"  method="post">
                                <td style='width:140px'>
                                    <div class="btn-group" role='group'>
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <a href="{!! url('publikasi/'.$post->id.'/edit') !!}" class="btn btn-primary">Edit</a>
                                        <a href="{!! url('publikasi/'.$post->id) !!}" class="btn btn-success">Lihat</a>
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



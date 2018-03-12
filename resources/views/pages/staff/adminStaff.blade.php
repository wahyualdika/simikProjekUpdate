@extends('pages.master')

@section('side-content')
    <div class="col-lg-8 mb-7">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">List Staff</h5>
            <table class="table table-hover">
                <thead>
                <tr class="">
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIP</th>
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
                            <td>{{ $post->nip }}</td>
                            <form class="forms-sample" action="{!! url('staff/'.$post->id) !!}"  method="post">
                                <td>
                                    <div class="btn-group">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <a href="{!! url('staff/'.$post->id.'/edit') !!}" class="btn btn-primary">Edit</a>
                                        <a href="{!! url('staff/'.$post->id) !!}" class="btn btn-success">Lihat</a>
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



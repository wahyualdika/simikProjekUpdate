@extends('pages.master')

@section('side-content')

    <h3 class="page-heading mb-4">Form Input Dosen</h3>
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{!! url('staff/'.$post->id) !!}" method="post">
                        <input name="_method" type="hidden" value="PUT">
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="exampleNama">Nama</label>
                            <input type="text" class="form-control p-input" name="nama" value="{{ $post->nama }}" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">NIP</label>
                            <input type="text" class="form-control p-input" name="nip" value="{{ $post->nip }}" id="exampleInputNIP" placeholder="NIP">
                        </div>
                        <div class="form-group">
                            <label for="exampleJabatan">Jabatan</label>
                            <input type="text" class="form-control p-input" name="jabatan" value="{{ $post->jabatan }}" id="exampleInputJabatan" placeholder="Jabatan">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
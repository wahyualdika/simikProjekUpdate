@extends('pages.master')

@section('stylesheet')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({!! json_encode($post->waliMahasiswa()->allRelatedIds()) !!}).trigger('change');
        $(".select2-multi-publikasi").select2().val({!! json_encode($post->publikasi()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection

@section('side-content')
    <!--<div id="dialog-form" title="Create new user">
        <p>Do you want to delete this entry?</p>
    </div>-->

    <h3 class="page-heading mb-4">Form Input Dosen</h3>
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{!! url('dosen/'.$post->id) !!}" method="post" enctype="multipart/form-data">
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
                        <select class="form-control select2-multi" name="wali[]" multiple="multiple">
                            @foreach($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" selected>{{ $mahasiswa->nama }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control select2-multi-publikasi" name="publikasi[]" multiple="multiple">
                                @foreach($publikasis as $publikasi)
                                    <option value="{{ $publikasi->id }}" selected>{{ $publikasi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for='exampleGambar'>Upload Gambar</label>
                            <div class='input-group date'>
                                <input type="file" name="gambar" class="form-control">
                            </div>
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
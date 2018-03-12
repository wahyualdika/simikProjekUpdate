@extends('pages.master')

@section('stylesheet')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".select2-multi").select2({
            maximumSelectionLength: 1
        });
        $(".select2-multi").select2().val({!! json_encode($post->dosenWali()->allRelatedIds()) !!}).trigger('change');
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
@endsection


@section('side-content')

    <h3 class="page-heading mb-4">Form Input Dosen</h3>
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h5 class="card-title mb-4">Data Mahasiswa</h5>
                    <form class="forms-sample" action="{!! url('mahasiswa/'.$post->id) !!}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="exampleNama">Nama</label>
                        <input type="text" class="form-control p-input" name="nama" value="{{$post->nama}} " id="exampleInputNama" aria-describedby="Nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control p-input" name="nim" value="{{$post->nim}}" id="exampleInputNIM" placeholder="NIM">
                    </div>
                    <div class="form-group">
                        <label for="pembimbing">Dosen Pembimbing 1</label>
                        <input type="text" class="form-control p-input" name="pembimbing1" value="{{$post->pembimbing1}}" id="exampleInputPembimbing" placeholder="Pembimbing 1">
                    </div>
                    <div class="form-group">
                        <label for="pembimbingP">Dosen Pembimbing 2</label>
                        <input type="text" class="form-control p-input" name="pembimbing2" value="{{$post->pembimbing2}}" id="exampleInputPembimbing" placeholder="Pembimbing 2">
                    </div>
                    <div class="form-group">
                        <label for='exampleInputTanggal'>Tanggal Data Dimasukkan</label>
                        <div class='input-group date'>
                            <input type="text" name="tanggal_masuk"  value="{{date('d/m/Y',strtotime($post->tanggal_masuk))}}" class="form-control" id="datepicker">
                            <div class='input-group-addon'>
                                <span class='fa fa-calendar'></span>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for='exampleGambar'>Upload Gambar</label>
                            <div class='input-group date'>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>
                    <div class="form-group">
                        <label for='exampleDosenWali'>Dosen Wali</label>
                        <select class="select2-multi form-control" name="dosenWali[]" multiple="multiple">
                            @foreach($dosens as $dosen)
                                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
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
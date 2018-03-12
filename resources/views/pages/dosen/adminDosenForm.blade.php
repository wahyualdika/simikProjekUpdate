@extends('pages.master')

@section('stylesheet')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
@endsection

@section('side-content')

        <h3 class="page-heading mb-4">Form Input Dosen</h3>
        <div class="row mb-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Dosen</h5>
                        <form class="forms-sample" action="{{ route('dosen.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleNama">Nama</label>
                                <input type="text" class="form-control p-input" name="nama" id="exampleInputNama" aria-describedby="emailHelp" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleNIP">NIP</label>
                                <input type="text" class="form-control p-input" name="nip" id="exampleInputNIP" placeholder="NIP">
                            </div>
                            <div class="form-group">
                                <label for="exampleMahasiswaWali">Mahasiswa Perwalian</label>
                                <select class="form-control select2-multi" name="wali[]" multiple="multiple">
                                    @foreach($mahasiswas as $mahasiswa)
                                        <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleMahasiswaWali">Publikasi</label>
                                <select class="form-control select2-multi" name="publikasi[]" multiple="multiple">
                                    @foreach($publikasis as $publikasi)
                                        <option value="{{ $publikasi->id }}">{{ $publikasi->nama }}</option>
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
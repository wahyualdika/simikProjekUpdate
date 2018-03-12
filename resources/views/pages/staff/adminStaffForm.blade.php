@extends('pages.master')

@section('stylesheet')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
@endsection

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#datepicker").datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });
    </script>
@endsection

@section('side-content')

    <h3 class="page-heading mb-4">Form Input Mahasiswa</h3>
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Mahasiswa</h5>
                    <form class="forms-sample" action="{{ route('staff.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama</label>
                            <input type="text" class="form-control p-input" name="nama" id="exampleInputNama" aria-describedby="Nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIP</label>
                            <input type="text" class="form-control p-input" name="nip" id="exampleInputNIP" placeholder="NIP">
                        </div>
                        <div class="form-group">
                            <label for="dosenWali">Jabatan</label>
                            <input type="text" class="form-control p-input" name="jabatan" id="exampleInputJabatan" placeholder="Jabatan">
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
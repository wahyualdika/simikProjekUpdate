@extends('pages.master')

@section('stylesheet')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
@endsection

@section('script_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        //  $(".select2-multi").select2();
        $(".select2-multi").select2();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
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
                    <h5 class="card-title mb-4">Data Publikasi</h5>
                    <form class="forms-sample" action="{{ route('publikasi.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama</label>
                            <input type="text" class="form-control p-input" name="nama" id="exampleInputNama" aria-describedby="Nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for='exampleInputTanggal'>Tanggal Data Dimasukkan</label>
                            <div class='input-group date'>
                                <input type="text" name="tanggal" class="form-control" id="datepicker">
                                <div class='input-group-addon'>
                                    <span class='fa fa-calendar'></span>
                                </div>
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
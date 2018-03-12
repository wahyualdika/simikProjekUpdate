@extends('pages.master')
@section('side-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                    <input class="form-control mr-sm-2 search" type="text" name="nim" placeholder="Search" id="nim">
                    <button id="submit" type="button">Cari</button>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="content-wrapper full-page-wrapper d-flex text-center error-page">
                            <div class="col-lg-6 mx-auto">
                                <h1 class="display-1 mb-0">Selamat Datang</h1>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_bottom')
{{--<script>
    $(document).ready(function(){
        $("button").click(function(){
            var input = $("#nim").val();
            $.get("{!! url('/dataNim/') !!}/"+input, function(data, status){
                console.log(data);
                $("h1").append("<p>"+data.nama+"</p>");
            });
        });
    });
</script>--}}
<script>
 $(document).ready(function(){
    $("button").click(function(){
        var input = $("#nim").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("{!! url('/dataNim') !!}",
            {
                nim : input
            },
            function(data, status){
                console.log(data);
                $("h1").append("<p>"+data.nama+"</p>");
            });
    });
 });
</script>
@endsection

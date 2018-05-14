@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        Global Setup
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="{{ url('/home') }}">Dashboard</a>
            </li>
            <li>
                <i class="fa fa-file"></i> <a href="{{ route('globalsetup.index') }}">Global Setup</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Tambah Baru
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <form action="{{ route('globalsetup.store') }}" method="POST">
            <div class="form-group">
                <label>Nama Setup</label>
                <input type="text" name="nama" class="form-control" required>
                {{ csrf_field() }}
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Detail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="after-add"></tr>
                    <tr>
                        <td colspan="3">
                            <button class="btn btn-success" onclick="addrow()" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-save"></i> Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="col-lg-12">
    </div>
</div>



<script>
    function addrow(){
        var id = $(".multi").length;
        id++;
        var html ='<tr class="control-group">'
        +'<td ><input type="text" name="code[]" class="form-control input-sm" id="code'+id+'"></td>'
        +'<td ><input type="text" name="detail[]" class="form-control input-sm multi" id="detail'+id+'"></td>'
        +'<td width="90px"align="center"><a href="#"class="remove"><span class="glyphicon glyphicon-trash"></span></a></td>';

        $(".after-add").before(html);
        $("#code"+id).focus();
        $("body").on("click",".remove",function(){ 
            $(this).parents(".control-group").remove();
        });
    };
</script>

@endsection
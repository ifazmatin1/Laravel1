@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        Global Setup
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="home">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Global Setup
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
    @if(Session::has('alert-success'))
    <div class="alert alert-success">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
    </div>
    @endif
    </div>
    <div class="col-lg-12">
        <a href="{{ route('globalsetup.create') }}" class="btn btn-success">Tambah</a>
    </div>
    <div class="col-lg-12">
        &nbsp;
    </div>
    <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $datas->global_setup_name }}</td>
                    <td>
                        <form action="{{ route('globalsetup.destroy', $datas->global_setup_id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('globalsetup.edit',$datas->global_setup_id) }}" class=" btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
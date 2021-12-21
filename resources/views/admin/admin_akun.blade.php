@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Halaman Akun') }}</div>
            <a href="/admin/register" class="btn btn-primary">Tambah Akun Admin</a>
            <a href="/author/register" class="btn btn-primary">Tambah Akun Author</a>
                </br>
                 @foreach($admin as $ang)
                <div class="card-header">{{ $ang->username }}</div>
                <div class="card-body">
                Email : {{ $ang->email }} </br>   
                </div>
                <a href="/admin/akunhapus/{{$ang->id}}" class="btn btn-danger">Hapus Data</a> 
            @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

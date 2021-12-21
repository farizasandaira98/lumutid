@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Halaman Post') }}</div>
            <a href="/admin/posttambah" class="btn btn-primary">Tambah Data Post</a>
                </br>
                 @foreach($post as $ang)
                <div class="card-header">Judul : {{ $ang->title }}</div>
                <div class="card-body">
                Waktu : {{ $ang->date }} </br>
                Deskripsi : {{ $ang->content }}    
                </div>
                <a href="/admin/postedit/{{$ang->id}}"   class="btn btn-warning">Edit Data</a>
                <a href="/admin/posthapus/{{$ang->id}}" class="btn btn-danger">Hapus Data</a> 
            @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

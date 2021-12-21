@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('Halaman Post') }}</div>
                </br>
                 @foreach($post as $ang)
                <div class="card-header">Judul : {{ $ang->title }}</div>
                <div class="card-body">
                Waktu : {{ $ang->date }} </br>
                Deskripsi : {{ $ang->content }}    
                </div>
            @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

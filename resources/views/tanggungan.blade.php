@extends('layout')
@section('tanggunganactive')
    active
@endsection
@section('judul')
    Tanggungan
@endsection
@section('content')
    {{-- @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif --}}
    <div class="alert alert-success">
        Pemberitahuan! Tidak Ada Tanggungan
    </div>
@endsection
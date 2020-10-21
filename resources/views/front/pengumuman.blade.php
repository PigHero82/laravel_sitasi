@extends('front.layout')

@section('judul')
    {{ $data->judul }}
@endsection

@section('content')
    <div class="container">
        <!-- Title -->
        <h1 class="mt-1">{{ $data->judul }}</h1>

        <!-- Author -->
        <hr>

        <!-- Date/Time -->
        <p>{{ $data->katakunci }} | {{ $data->created_at->format('d-m-Y') }}</p>

        <hr>

        @if ($data->foto == null)
        @else
          <!-- Preview Image -->
          <div class="text-center">
            <img class="img-fluid rounded" src="{{ $data->foto }}" alt="{{ $data->judul }}">
          </div>
        @endif

        <hr>

        <!-- Post Content -->
        {!! $data->content !!}
    </div>
@endsection
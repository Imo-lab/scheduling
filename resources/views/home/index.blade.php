@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center bg-light p-5 rounded-3">
        <h1 class="display-4">Selamat Datang di CSM Portal!</h1>
        <p class="lead">Sistem untuk mengelola data employee di CSM.</p>
        <hr class="my-4">
        <p>Gunakan navigasi di bawah untuk mulai mengelola.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('employee.index') }}" role="button">Lihat Daftar Agen</a>
        <a class="btn btn-primary btn-lg" href="{{ route('kpi.index') }}" role="button">Key Performance Indicator</a>
    </div>

    {{-- Anda bisa menambahkan widget atau statistik di sini --}}
@endsection
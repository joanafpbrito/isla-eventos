@extends('layouts.app')
@section('titulo', 'Página não encontrada')
@section('conteudo')
    <p>This was unexpected.</p>
    <h1>404 - Common Sense Not Found</h1>
    <img src="{{ asset('images.jpg') }}" alt="404 - Not Found">
    <p> <a href="{{ route('inicio') }}">Keep searching, you might find it somewhere else</a> </p>
@endsection
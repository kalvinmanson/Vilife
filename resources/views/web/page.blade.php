@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
    <h1>{{ $page->name }}</h1>

    {!! $page->content !!}
@endsection
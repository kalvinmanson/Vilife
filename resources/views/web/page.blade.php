@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
<div class="row">
	<div class="col-sm-8">
		<h1>{{ $page->name }}</h1>
		{!! $page->content !!}
		<hr>
		<h3>Comentarios</h3>
		
	</div>
	<div class="col-sm-4">
		@include('partials.sidebar')
	</div>
</div>
@endsection
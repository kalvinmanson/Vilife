@extends('layouts.admin')

@section('content')

<h1>Edit Page</h1>

		<form method="POST" action="{{ url('admin/pages/' . $page->id) }}">

			@include('partials.errors')


			<div class="form-group">
				<label for="name">Name</label>
				<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $page->name }}">	
			</div>
			<div class="form-group">
				<input name="slug" type="text" class="form-control input-sm" value="{{ old('slug') ? old('slug') : $page->slug }}">	
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="category_id">Category</label>
						<select name="category_id" id="category_id" class="form-control">
							@foreach ($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id == $page->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="picture">Imagen</label>
						<input name="picture" id="picture" type="text" class="form-control ckfile" readonly value="{{ old('picture') ? old('picture') : $page->picture }}">	
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" class="form-control">{{ old('content') ? old('content') : $page->content }}</textarea>
				<script type="text/javascript">
					var editor = CKEDITOR.replace('content');
				</script>
			</div>
			<div class="form-group">
				<label for="tags">Tags</label>
				<input type="text" name="tags" id="tags" class="form-control" data-role="tagsinput" value="{{ old('tags') ? old('tags') : $page->tags }}">
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="checkbox">
						<label>
							<input type="hidden" name="suscribe" value="0">
							<input type="checkbox" name="suscribe" value="1" {{ $page->suscribe == true ? 'checked' : ''}}> Para suscriptores
						</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="checkbox">
						<label>
							<input type="hidden" name="premium" value="0">
							<input type="checkbox" name="premium" value="1" {{ $page->premium == true ? 'checked' : ''}}> Para premium
						</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">

			</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<input type="hidden" name="_method" value="PUT" id="token">
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['admin.pages.destroy', $page->id]
]) !!}
    {!! Form::submit('Delete this page?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}

{!! Form::open([
    'method' => 'POST',
    'route' => ['admin.pages.duplicate']
]) !!}
	<input type="hidden" name="id" value="{{ $page->id }}">
	{!! Form::submit('Duplicate', ['class' => 'btn btn-primary pull-right']) !!}
{!! Form::close() !!}
@endsection
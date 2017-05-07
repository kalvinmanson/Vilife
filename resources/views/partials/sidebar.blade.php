<div class="sidebar">
	<h3>Actualidad</h3>
	@foreach($lastNews as $lastNew)
        <a href="/{{ $lastNew->category->slug }}/{{ $lastNew->slug }}">
	        <h2>{{ $lastNew->name }}</h2>
	        <img src="/t.php?src={{ $lastNew->picture }}&w=100&h=80" class="pull-right">
	        <p>{{ substr(strip_tags($lastNew->content), 0, 100) }}</p>
        </a>
	@endforeach
</div>
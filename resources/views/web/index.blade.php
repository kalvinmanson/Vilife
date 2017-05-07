@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
<div id="carrohome" class="carousel slide carousel-fade" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carrohome" data-slide-to="0" class="active"></li>
    <li data-target="#carrohome" data-slide-to="1"></li>
    <li data-target="#carrohome" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/img/slide01.png">
      <div class="carousel-caption">
        <h2>Lorem ipsum</h2>
        <p>Dolor sit amet</p>
      </div>
    </div>
    <div class="item">
      <img src="/img/slide02.png">
      <div class="carousel-caption">
        <h2>Lorem ipsum</h2>
        <p>Dolor sit amet</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carrohome" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carrohome" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Enseignants')

@section('sidebar')
    @parent

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GooD PlanninG</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li ><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li class="active"><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
@endsection

@section('content')
<div class="container">

<div class="starter-template">
  <h1>Bienvennue dans GooD PlanninG</h1>
  <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
</div>

<div class="row">
  <div class="col-md-3">
  {{ $enseignants }}
    <ul>
      @foreach($enseignants as $enseignant )
        <li onClick="enseignant({{$enseignant->id}})">
          {{$enseignant->nom}}
        </li>
      @endforeach
    </ul>
  <div>
  <div class="col-md-9">
    <div>

    </div>
  <div>
</div>
</div><!-- /.container -->
@endsection





  
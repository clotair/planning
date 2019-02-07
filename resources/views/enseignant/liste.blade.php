
@extends('layouts.app')

@section('title', 'Enseignants')
@section('css')
  <!-- liens css -->
@endsection
@section('sidebar')
    @parent

    @section('menu')
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li ><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li class="active"><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
            <li><a class = "orientation" href="/classe"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Classe</a></li>
            <li><a class = "orientation" href="/temps"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Emplois de temps</a></li>
          </ul>
        </div><!--/.nav-collapse -->
     
    @endsection
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
          {{$enseignant->prof}}
        </li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-9">
    <div>

    </div>
  </div>
</div>
</div><!-- /.container -->


@endsection
@section('js')
  <!-- liens js -->
@endsection




  
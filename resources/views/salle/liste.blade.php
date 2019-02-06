



  




@extends('layouts.app')

@section('title', 'Salles')

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
            <li class="active"><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li ><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
@endsection

@section('content')

<div class = "container-fluid">
      <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="submit" class="btn-info" value="salle de travaux pratiques">
            </div>
          </div>
          <div class="col-lg-8">bienvenue</div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="submit" class="btn-info" value="salle de travaux dirigés">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="submit" class="btn-info" value="salle de cours">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="submit" class="btn-info" value="amphitheatres">
            </div>
          </div>
        </div>
    </div>
@endsection

    

    






@extends('layouts.app')

@section('title', 'Accueil')

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
            <li class="active"><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  @endsection

  @section('content')
  <div id="myCarousel" class="carousel slide imp" data-ride="carousel ">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="image/2.jpg" alt="image 1" style="width:100%; height:450px; ">
        </div>
    
        <div class="item">
          <img src="image/4.jpg" alt="image 2" style="width:100%; height:450px;">
        </div>
    
        <div class="item">
          <img src="image/1.jpg" alt="image 3" style="width:100%; height:450px;">
        </div>
      </div>
    
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container texte" style="width:50%;">

      <div class="starter-template">
        <h1>Bienvenue sur GooD PlanninG</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->
    <div class = "container-fluid">
      <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos salles</h4>
              <p>Consultez l'emploi de temps en fonction des salles.</p>
              <input type="submit" class="btn-info" value="salles">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos matériels</h4>
              <p>Consultez l'emploi de temps en fonction des matériels.</p>
              <input type="submit" class="btn-info" value="materiels">
            </div>
          </div> 
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos enseignants</h4>
              <p>Consultez l'emploi de temps en fonction des enseignants.</p>
              <input type="submit" class="btn-info" value="enseignants">
            </div>
          </div> 
       </div>
    </div>
@endsection

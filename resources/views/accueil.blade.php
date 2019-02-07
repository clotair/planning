

@extends('layouts.app')

@section('title', 'Accueil')
@section('css')
<link rel="stylesheet" href="../css/starter-template">
@endsection
@section('sidebar')
    @parent

    @section('menu')
    <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
            <li><a class = "orientation" href="/classe"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Classe</a></li>
            <li><a class = "orientation" href="/temps"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Emplois de temps</a></li>
          </ul>
        </div><!--/.nav-collapse -->
     
    @endsection

 
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

      <div class="starter-template couleur">
        <h1>Bienvenue sur GooD PlanninG</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->
  <br><br><br><br><br><br>
    <div class = "container-fluid">
      <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos salles</h4>
              <p>Consultez l'emploi de temps en fonction des salles.</p>
              <a class = "orientation" href="/salle"><button class="btn btn-primary"><span class="glyphicon
                glyphicon-ok-sign"></span> cliquer ici</button></a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Matériel</h4>
              <p>Consultez l'emploi de temps en fonction du matériel.</p>
              <a class = "orientation" href="/materiel"><button class="btn btn-primary"><span class="glyphicon
                glyphicon-ok-sign"></span> cliquer ici</button></a>
            </div>
          </div> 
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos enseignants</h4>
              <p>Consultez l'emploi de temps en fonction des enseignants.</p>
              <a class = "orientation" href="/enseignant"><button class="btn btn-primary"><span class="glyphicon
                glyphicon-ok-sign"></span> cliquer ici</button></a>
            </div>
          </div> 
       </div>
    </div>
    <br><br> <br><br> <br><br>

 

@endsection

@section('js')
  <!-- liens js -->
@endsection
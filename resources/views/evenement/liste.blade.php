@extends('layouts.app')

@section('title', 'Materiel')
@section('css')
  
@endsection
@section('sidebar')
    @parent
      @section('menu')
        <div id="navbar" class="collapse navbar-collapse">
          	<ul class="nav navbar-nav">
                <li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Accueil</a></li>
                <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
                <li><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Matériels</a></li>
                <li><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
          <li><a class = "orientation" href="/classe"><span class ="glyphicon glyphicon-book"></span> &nbsp;Classe</a></li>
          <li class="active"><a class = "orientation" href="/evenement"><span class ="glyphicon glyphicon-bell"></span> &nbsp;Evènement</a></li>
          
          
          <li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class = "orientation" href="/admin" target ="_blank"><span class ="glyphicon glyphicon-user"></span> &nbsp;Connexion</a></li>
              </ul>
        </div><!--/.nav-collapse -->
      
      @endsection
    
@endsection

@section('content')
     <br>

@endsection
@section('js')
  <!-- liens js -->
@endsection




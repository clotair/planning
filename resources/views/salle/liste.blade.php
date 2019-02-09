
@extends('layouts.app')

@section('title', 'Salles')
@section('css')
  	<!-- liens css -->
@endsection
@section('sidebar')
    @parent

    @section('menu')
        <div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
						<li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Accueil</a></li>
						<li class="active"><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
						<li><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Matériels</a></li>
						<li ><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
						<li><a class = "orientation" href="/classe"><span class ="glyphicon glyphicon-book"></span> &nbsp;Classe</a></li>
						<li><a class = "orientation" href="/evenement"><span class ="glyphicon glyphicon-bell"></span> &nbsp;Evènement</a></li>
						
						
						<li>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class = "orientation" href="/admin" target ="_blank"><span class ="glyphicon glyphicon-user"></span> &nbsp;Connexion</a></li>
					  </ul>
        </div><!--/.nav-collapse -->
     
    @endsection
@endsection
@section('content')

<div class="container" style="margin-top:70px;">
  <div class="row">
    <div class="col-md-3">
      <div class="jolieliste">
        <div class="list-group" style="text-align:center;">
            <button type="button" class="list-group-item list-group-item-action active salle br" onClick="search_salle_active()" style="text-align:center">
            RECHERCHER
            </button>
      
            			@foreach($salles as salle)
 
              				<button type="button"  id="{{'s'.$salle->id}}" class="list-group-item list-group-item-action salle" onClick="planning_salle({{$salle->id}},'{{$salle->nom}}')"    title="{{salle->nom}}"> 
               				 	{{$salle->code}}
              				</button>
            			@endforeach
        			</div>
      			</div>
    		</div>
    		<div class="col-md-9 recherche">
      			<form>
       				<center><h4 >RECHERCHE</h4></center><br/>
        			<div class="col-md-2"></div>
        			<div class="col-md-9 ">
          				<input type="search" class="form-control terme"  placeholder="Entrez le nom ou le code d'une salle" onInput="search_salle({{$salles}})"/>
					</div>
				</form>
    		</div>
    		<div class="col-md-9 calendrier">
      			<center><a href="#salleModal" data-toggle="modal" data-target="#salleModal"><h4 id="titreS"></h4></a></center><br/>
    			<div class="table-responsive">
      				<table class="table table-bordered" id="listePS">
    
      				</table>
    			</div>
    		</div>
    	</div>
	</div>
  <div class="modal fade bd-example-modal-xl" tabindex="-1" id="salleModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header" style="text-align:center;">
        <strong class="modal-title" style="font-size: 30px;"></strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
  	<!-- liens js -->
  	<script src="js/salles.js"></script>
@endsection
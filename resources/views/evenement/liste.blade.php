
@extends('layouts.app')

@section('title', 'Evenements')
@section('css')
  	<!-- liens css -->
@endsection
@section('sidebar')
    @parent

    @section('menu')
        <div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
						<li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Accueil</a></li>
						<li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
						<li><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Matériels</a></li>
						<li ><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
						<li><a class = "orientation" href="/classe"><span class ="glyphicon glyphicon-book"></span> &nbsp;Classe</a></li>
						<li class="active"><a class = "orientation" href="/evenement"><span class ="glyphicon glyphicon-bell"></span> &nbsp;Evènement</a></li>
						
						
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
            <button type="button" class="list-group-item list-group-item-action active evenement br" onClick="search_evenement_active()" style="text-align:center">
            RECHERCHER
            </button>
      
            			@foreach($evenements as $evenement)
 
              				<button type="button"  id="{{'ev'.$evenement->id}}" class="list-group-item list-group-item-action evenement" onClick="planning_evenement({{$evenement->id}},'{{$evenement->description}}')"    title="{{$evenement->type}}"> 
               				 	{{$evenement->description}}
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
          				<input type="search" class="form-control terme"    placeholder="Entrez la description de l'evenement" onInput="search_evenement({{$evenements}})"/>
					</div>
        </form>
        <div class="rechercheresult" style="magrin-top:40px;text-align:center"></div>
    		</div>
    		<div class="col-md-9 calendrier">
      			<center><a href="#evenementModal" data-toggle="modal" data-target="#evenementModal"><h4 id="titreEv"></h4></a></center><br/>
    			<div class="table-responsive">
      				<table class="table table-bordered" id="listePEv">
    
      				</table>
    			</div>
    		</div>
    	</div>
	</div>
  <div class="modal fade bd-example-modal-xl" tabindex="-1" id="evenementModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header" style="text-align:center">
        <strong class="modal-title" ></strong>
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
  	<script src="js/evenement.js"></script>
@endsection
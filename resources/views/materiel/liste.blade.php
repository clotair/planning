<<<<<<< HEAD


@extends('layouts.app')

@section('title', 'Page Title')

=======
@extends('layouts.app')

@section('title', 'Page Title')
@section('css')
  <!-- liens css -->
@endsection
>>>>>>> f4dfcacdd8a033b1da3207d397a0ba5cda2e0826
@section('sidebar')
    @parent

    @section('menu')
    <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li class="active"><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li ><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
          </ul>
        </div><!--/.nav-collapse -->
<<<<<<< HEAD
      </div>
    </nav>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">
  {{ $materiels }}
    <ul>
      @foreach($materiels as $materiel )
        <li onClick="materiel({{$materiel->id}})">
          {{$materiel->nom}}
        </li>
      @endforeach
    </ul>
  <div>
  <div class="col-md-9">
    <div>

    </div>
  <div>
</div>
</div> 
<div class="starter-template">
        <h1>Bienvennue dans GooD PlanninG</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
      <table class="table table-striped">
=======
     
    @endsection

@endsection

@section('content')
<table class="table table-striped">
>>>>>>> f4dfcacdd8a033b1da3207d397a0ba5cda2e0826
            <div class="panel-heading"><h3 class=""> Emploi de temps</h3></div>
            <thead>
                <tr>
                    <td class="hour"></td>
                    <td>Lundi</td>
                    <td>Mardi</td>
                    <td>Mercredi</td>
                    <td>Jeudi</td>
                    <td>Vendredi</td>
                    <td>Samedi</td>
                </tr>
            </thead>
            <tbody>
                <tr>    
                    <td class="hour">07h - 9h55</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hour">10h05 - 12h55</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hour">13h05 - 15h55</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td class="hour">16h05 - 18h55</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                </tr>
                <tr>
                    <td class="hour">19h05 - 21h55</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                    <td>info</td>
                </tr>
            </tbody>
        </table>

@endsection




<<<<<<< HEAD
      
=======

@endsection
@section('js')
  <!-- liens js -->
@endsection

 

>>>>>>> f4dfcacdd8a033b1da3207d397a0ba5cda2e0826

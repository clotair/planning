@extends('layouts.app')

@section('title', 'Materiel')
@section('css')
  
@endsection
@section('sidebar')
    @parent
      @section('menu')
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
                <li><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
                <li class="active"><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
                <li><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      
      @endsection
    
@endsection

@section('content')
     
<div class="container">
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
    </div>
  </div>
</div>


@endsection
@section('js')
  <!-- liens js -->
@endsection




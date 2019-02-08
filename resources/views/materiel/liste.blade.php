@extends('layouts.app')

@section('title', 'Materiel')
@section('css')
  <link rel="stylesheet" href="../css/style2.css">
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
                <li><a class = "orientation" href="/temps"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Emplois de temps</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      
      @endsection
    
@endsection

@section('content')
     
<!--div class="container">
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
</div-->
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-2">
      <h3>** Menu **</h3>
      <ul>
        <li><a href="#">Classes</a>
        <ul class="sous_lien">
          <li class="LIS"><a href="">INFO L1</a></li>
          <li class="LIS"><a href="">INFO L1</a></li>
          <li class="LIS"><a href="">INFO L2</a></li>                            
          <li class="LIS"><a href="">INFO L3</a></li>                            
        </ul>
        </li>
        <li><a href="#">Salles</a> 
          <ul class="sous_lien">
            <li ><a href="">Amphi 1001</a></li>
            <li ><a href="">Amphi 501</a></li>
            <li ><a href="">Amphi 250</a></li>                            
            <li ><a href="">Amphi 135</a></li>                            
          </ul>
        </li> 
        <li><a href="">Matériel: 50</a></li>     
        <li><a href="">Evènements: 25</a>  </li>
      </ul>  
    </div>
  

<<<<<<< HEAD
    <div class="col-lg-10">
          <table class="table table-striped">
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
                        <td class="hour">09h56 - 10h04</td>
                        <td>P</td>
                        <td>A</td>
                        <td>U</td>
                        <td>S</td>
                        <td>E</td>
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
                        <td class="hour">12h56 - 13h04</td>
                        <td>P</td>
                        <td>A</td>
                        <td>U</td>
                        <td>S</td>
                        <td>E</td>
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
                        <td class="hour">15h56 - 16h04</td>
                        <td>P</td>
                        <td>A</td>
                        <td>U</td>
                        <td>S</td>
                        <td>E</td>
                        <td></td>
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
                        <td class="hour">18h56 - 19h04</td>
                        <td>P</td>
                        <td>A</td>
                        <td>U</td>
                        <td>S</td>
                        <td>E</td>
                        <td></td>
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
    </div>
  </div>
=======
        <table class="table table-striped">
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
    <br>
>>>>>>> a560901ae7055c56357625cc8b075a14984f73fe
</div>
@endsection
@section('js')
  <!-- liens js -->
@endsection





@extends('layouts.app')
    <style>
      table, th, td{
        border: 1px solid blueviolet;
        border-collapse: collapse;
        opacity: 0.95;
      }
      table{
        width: 50px;
      }
      th, td{
        padding: 10px;
        text-align: center;
      }

    </style>
  </head>
@section('title', 'Salles')
@section('css')
  <!-- liens css -->
@endsection
@section('sidebar')
    @parent

    @section('menu')
    <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a class = "orientation" href="/"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li class="active"><a class = "orientation" href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
            <li ><a class = "orientation" href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
            <li><a class = "orientation" href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
          </ul>
        </div><!--/.nav-collapse -->
     
    @endsection
  

 
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-3">
    <div class="list-group">
          <button type="button" class="list-group-item list-group-item-action active salle" onClick="search_salle({{$salles}})">
            Rechercher
          </button>
         @foreach($salles as $salle)
 
            <button type="button"  id="{{'s'.$salle->id}}" class="list-group-item list-group-item-action salle" onClick="planning_salle({{$salle->id}})" data-toggle="popover"  data-content="{{$salle->nom}}" title="{{$salle->type}}"> 
              {{$salle->code}}
            </button>
        @endforeach
      </div>
    </div>
    <div class="col-md-9">
    <div class="table-responsive">
      <table class="table" id="listePS">
    
      </table>
    </div>
    </div>
    </div>
</div>

<div class = "container-fluid">
      <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="bouton" class="btn-info" value="salle de travaux pratiques">
            </div>
          </div>
          <div class="col-lg-8">bienvenue</div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="bouton" class="btn-info" value="salle de travaux dirigés">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="bouton" class="btn-info" value="salle de cours">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <input type="bouton" class="btn-info" value="amphitheatres">
            </div>
          </div>
        </div>
    </div>
    <div class ="row">  
      <div class = "col-md-7 col-offset-md-7">
         <table class="table table-striped ">
           <tr>
             <td colspan ="7"><h1>EMPLOIS DU TEMPS <br> Du... AU ...</h1></td>
           </tr>
               <tr>
                   <th>  </th>
                   <th>LUNDI</th>
                   <th>MARDI</th>
                   <th>MERCREDI</th>
                   <th>JEUDI</th>
                   <th>VENDREDI</th>
                   <th>SAMEDI</th>
               </tr>
               <tr>
                   <th>7h - 9h55</th>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
               </tr>
               <tr>
                 <th colspan ="7">pause 10 min</th>
               </tr>
               <tr>
                 <th>10h05 - 12h45</th>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
               <tr>
                 <th colspan ="7">PAUSE 20 min</th>
               </tr>
               <tr>
                 <th>13h05 - 15h55</th>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
               <tr>
                 <th colspan ="7">PAUSE 10min</th>
               </tr>
               <tr>
                 <th>16h05 - 18h45</th>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
               <tr>
                 <th colspan ="7">PAUSE 20min</th>
               </tr>
               <tr>
                 <th>19h05 - 22h05</th>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
               </tr>
           </table>
      </div>
       </div>
           <br><br><br>
     
@endsection
@section('js')
  <!-- liens js -->
  <script src="js/salles.js"></script>
@endsection
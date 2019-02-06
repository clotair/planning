
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

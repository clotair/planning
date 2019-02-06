
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nos Salles</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

  <body>

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

    <div class="container">

      <div class="starter-template">
        <h1>Bienvennue dans GooD PlanninG</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->
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


    

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </body>

</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <li class="active"><a class = "orientation"s href="/">Home</a></li>
            <li><a class = "orientation" href="/salle">Nos Salles</a></li>
            <li><a class = "orientation" href="/materiel">Materiels</a></li>
            <li><a class = "orientation" href="/enseignant">Enseignants</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Bienvenue sur GooD PlanninG</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->
    <div class = "container-fluid">
      <div class="row">
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos salles</h4>
              <p>Consultez l'emploi de temps en fonction des salles.</p>
              <input type="submit" class="btn-info" value="salles">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos matériels</h4>
              <p>Consultez l'emploi de temps en fonction des matériels.</p>
              <input type="submit" class="btn-info" value="materiels">
            </div>
          </div> 
          <div class="col-lg-4">
            <div class="col-lg-12">
              <h4>Nos enseignants</h4>
              <p>Consultez l'emploi de temps en fonction des enseignants.</p>
              <input type="submit" class="btn-info" value="enseignants">
            </div>
          </div> 
       </div>
    </div>

    <script src="bootstrap/js/bootstrap.js"></script>
    </body>

</html>
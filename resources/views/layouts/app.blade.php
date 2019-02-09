
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>@yield('title')</title>
    
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-social.css" rel="stylesheet">
    


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/main.css" rel="stylesheet">
    @yield('css')
    <style>
        #footer{
            background:#1283f5;
            padding: 0 0 30px 0;
            color: #ffffff;
            font-size: 14px;
        }
        #footer .footer-top{
            background: #111;
            padding: 60px 0 30px 0;
        }
        #footer .footer-top .footer-info{
            margin: 30px;
        }
        #footer .footer-top .footer-info h3{
            font-size: 34px;
        }
        #footer .footer-top .footer-links ul a:hover{
            color: #06b00b;
        }
        #footer .footer-top .footer-contact{
            margin-bottom: 30px;
        }
        #footer .footer-top .footer-contact p{
            line-height: 25px;
        }
        #footer .footer-top .footer-newsletter{
            margin-bottom: 20px;
        }
        #footer .footer-top .footer-newsletter input[type="email"]{
            border: 0;
            padding: 6px 8px;
            width: 75%;
        }

        #footer .footer-top .footer-newsletter input[type="submit"]{
            background: #1283f5;
            border: 0;
            padding: 6px 0;
            text-align: center;
            color: #fff;
            transition: 0.3s;
            cursor: pointer;
        }

        #footer .footer-top .footer-newsletter input[type="submit"]:hover{
            background: #06b00b;
        
        }

        #footer .copyright{
            text-align: center;
            padding-top: 30px;
        }

        #footer .credits{
            text-align: center;
            font-size: 13px;
            color: #ffffff;
        }
    </style>
  </head>

  <body>

    @section('sidebar')
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
        @yield('menu')
      </div>
    </nav>
    @show
    
      @include('flash::message')
    
    
  
            @yield('content')
    <!-- footer de nos pages; tkp demande de ne plus toucher a sa -->
    <footer id = "footer">
        <div class = "footer-top">
            <div class = "container">
                <div class = "row">
                    <div class = "col-lg-3 col-md-6 footer-info">
                        <h3>GooG PlanninG</h3>
                        <p>Notre site permet a tous etudiants de la faculte ainsi qu'aux Enseignant  de consulte
                            leur planning sans toute fois bouger de leurs chambres ou d'y regarder sur un papier
                        </p>
                    </div>
                    <div class =  "col-lg-3 col-md-6 footer-links">
                        <h4>Liens Utiles</h4>
                        <ul>
                            <li><i class = "ion-ios-arrow-right"></i><a href="/"><span class="glyphicon glyphicon-home"></span> &nbsp;Home</a></li>
                            <li><i class = "ion-ios-arrow-right"></i><a href="/salle"><span class ="glyphicon glyphicon-inbox"></span> &nbsp;Nos Salles</a></li>
                            <li><i class = "ion-ios-arrow-right"></i><a href="/materiel"><span class ="glyphicon glyphicon-scissors"></span> &nbsp;Materiels</a></li>
                            <li><i class = "ion-ios-arrow-right"></i><a href="/enseignant"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Enseignant</a></li>
                            <li><i class = "ion-ios-arrow-right"></i><a href="/classe"><span class ="glyphicon glyphicon-briefcase"></span> &nbsp;Classe</a></li>
                            <li><i class = "ion-ios-arrow-right"></i><a href="#"><span class ="glyphicon glyphicon-bell"></span> &nbsp;Evènement</a></li>
                        </ul>
                    </div>
                    <div class =  "col-lg-3 col-md-6 footer-contact">
                        <h4>Suivez Nous</h4>
                        <a class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
                        <a class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
                        <a class="btn btn-social-icon btn-google"><span class="fa fa-google"></span></a>
                        <a class="btn btn-social-icon btn-instagram"><span class="fa fa-instagram"></span></a>


                    </div>
                    <div class = "col-lg-4 col-md-6 footer-newsletter">
                        <h4>Notre liste de membres</h4>
                        <p><ul>
                                <li>EYENGA ETOUNGOU Ruth Lydienne -17R2162</li>
                                <li>DOMCHE NOUNO Maureen     -     17R2956</li>
                                <li>FEZEU GHOMSI Eugene Clotaire - 17Q2864</li>
                                <li>GUEBOU BOUYIM Ghislaine    -   17R2256</li>
                                <li>POSSEU Jordan         -        17R2196</li>
                                <li>POUMEYOU Chimssiatou     -     17R2125</li>
                                <li>TCHUENTE KAMMOGNE Patrice   -  16U2543</li>
                            </ul> 
                        </p>

                    </div>
                </div>

            </div>

        </div>
        <p class = "copyright text-muted">Copyright &copy; GooG-PlanninG 2019</p>
    </footer>
  
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script>
      $('div.alert').not('.alert-important').delay(30000).fadeOut(350);
      $('#flash-overlay-modal').modal();
    </script>
        <script src="js/sweetalert.min.js"></script>

<!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
    @yield('js')
</html>


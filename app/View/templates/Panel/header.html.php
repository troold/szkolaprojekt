<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <script src='{$router->publicWeb("bower_components/jquery/dist/jquery.min.js")}'></script>
  <script src="{$router->assetic->assetJs('userdata.js')}"></script>
  

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href='{$router->publicWeb("bower_components/bootstrap/dist/css/bootstrap.min.css")}'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{$router->publicWeb("bower_components/font-awesome/css/font-awesome.min.css")}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='{$router->publicWeb("bower_components/Ionicons/css/ionicons.min.css")}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{$router->publicWeb("dist/css/AdminLTE.min.css")}'>  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href='{$router->publicWeb("dist/css/skins/_all-skins.min.css")}'>
  <link rel="stylesheet" href='{$router->publicWeb("libs/css/style.css")}'>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../panel,page/index" class="navbar-brand"><b>Projekt</b> J.Kubik</a>
<!--           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
<!--         <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div> -->
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs username">Ładowanie...</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src='{$router->publicWeb("libs/images/default_avatar.png")}' class="img-circle" alt="User Image">
                  <p class='username'>Ładowanie...</p>
                  <p><small class='user-full-name'>Ładowanie...</small></p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <a href="../panel,users/one">Edytuj Profil</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="../panel,users/index" class="btn btn-default btn-flat">Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Wyloguj</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
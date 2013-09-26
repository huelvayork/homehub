<!DOCTYPE html>
<html>
  <head>
    <title>HomeHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
    <link href="css/homehub.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
    <h1>HomeHub</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

<? 
  $menudir = "menu.d";
  $directorio = dir($menudir);
  while ($fichero = $directorio->read()) {
    $fichero = $menudir ."/" .$fichero;
    $info = pathinfo($fichero);
    if ($info['extension'] == 'php')
    	include($fichero);
  }
  $directorio->close();

//<div id="modaldialog" class="modal hide fade in" style="display: none; ">
?>
<div>
<?
  ServiceHandler::modalDialog();
?>
<script src="js/homehub.js"></script>
</body>
</html>

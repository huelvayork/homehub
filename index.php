<html>
<link href="css/boton.css" rel="stylesheet"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>HomeHub</title>
</head>
<body>

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
?>
</body>
</html>

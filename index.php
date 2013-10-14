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
  $dir = dir($menudir);
  while ($file = $dir->read()) {
    $file = $menudir ."/" .$file;
    $info = pathinfo($file);
    if ($info['extension'] == 'php')
    	include($file);
  }
  $dir->close();
?>
<!-- pop-up modal -->
<!-- Modal -->
<div class="modal" id="hhDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="hhDialogTitle">Modal title</h4>
            </div>
            <div class="modal-body" id="hhDialogBody">
            </div>
            <div class="modal-footer">  
              <a href="#" class="btn" data-dismiss="modal">Close</a>  
            </div> 
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script src="js/homehub.js"></script>
</body>
</html>

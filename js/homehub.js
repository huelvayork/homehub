function hhServiceSetup() {
  $(".hhService").click(function(caller) {
    $("#hhServiceDialogTitle").text("Control Servicios - " + caller.target.name);
    $("#hhServiceDialog").modal();
  });
}

$( document ).ready( hhServiceSetup );

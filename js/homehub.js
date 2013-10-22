function hhServiceSetup() {
	$(".hhService").click(function(caller) {
		serviceName = caller.target.name;
		$("#hhDialogTitle").text("Control Servicios - " + serviceName);
		$("#hhDialogBody").text("");
		$("#hhDialog").modal();
		$("#hhDialogBody").load("lib/ServiceHandler-helper.php?action=show&service=" + serviceName);
	});	
}

function hhServiceAction(serviceName, action) {
		$("#hhDialogBody").load("lib/ServiceHandler-helper.php?action=" + action + "&service=" + serviceName);
}
$( document ).ready( hhServiceSetup );

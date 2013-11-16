<?php

	require_once('ServiceHandler.php');
	$action = $_REQUEST['action'];
	$serviceName = $_REQUEST['service'];
	$service = new ServiceHandler($serviceName);
	switch ($action) {
		case 'show':
			$service->showDialog();
			break;
		case 'start':
			$service->start();
			break;
		case 'restart':
			$service->restart();
			break;
		case 'stop':
			$service->stop();
			break;
		default:
			# code...
			break;
	}

?>

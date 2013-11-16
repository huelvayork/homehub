<?php
require_once ('lib/MessageWidget.class.php');

function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

// Filesystems to show.
$filesystems = array ('/', '/media/almacen');

$message = '<table class="table table-condensed"><thead><tr><th>File System</th><th style="text-align:center">Total</th><th style="text-align:center">Used</th><th style="text-align:center">Free</th></tr></thead><tbody>';
foreach ($filesystems as $fs) {
	$total = disk_total_space($fs);
	$free = disk_free_space($fs);
	$used = $total - $free;
	$percent_used = $used * 100 / $total;

	if ($percent_used > 95.0) {
		$class_percent = ' class="danger"';
	}
	elseif ($percent_used > 75.0) {
		$class_percent = ' class="warning"';
	}
	else {
		$class_percent = '';
	}

	$message .= "<tr$class_percent><td>$fs</td><td style=\"text-align:right\">" . human_filesize($total) . '</td><td style="text-align:right">' . human_filesize($used) .
	            '</td><td style="text-align:right"><strong>' . human_filesize($free) . "</strong></td></tr>\n";
}
$message .= "</tbody></table>\n";

$msg_widget = new MessageWidget(2);
$msg_widget->setHeader('File System Information');
$msg_widget->setMessage ($message, TRUE);
$this->registerWidget($msg_widget);

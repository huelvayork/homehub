<?php
require_once ('lib/MessageWidget.class.php');

$temperatura = `cat /tmp/pachube*.out|grep Temp_2880AA9A30064|cut -d, -f2`;

$msg_widget = new MessageWidget(2);
$msg_widget->setMessage ("<a href='#' class=\"btn btn-primary btn-lg\" style=\"width:100%\">Temperatura Placas<br>$temperatura</a>");
$this->registerWidget($msg_widget);

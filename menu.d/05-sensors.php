<?php
require_once ('lib/MessageWidget.class.php');

$temperatura = `sensors|grep temp1|head -1`;

$msg_widget = new MessageWidget(2);
$msg_widget->setMessage ("<a href='#' class=\"btn btn-primary btn-lg\" style=\"width:100%\">Temperatura sistema<br>$temperatura</a>");
$this->registerWidget($msg_widget);

<?php
require_once ('lib/MessageWidget.class.php');

$temperatura = `sensors|grep temp1|head -1`;

$msg_widget = new MessageWidget(1);
$msg_widget->setHeader('Temperatura del sistema');
$msg_widget->setMessage ($temperatura);
$this->registerWidget($msg_widget);

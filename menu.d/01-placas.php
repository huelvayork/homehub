<?php
require_once ('lib/MessageWidget.class.php');

$temperatura = `cat /tmp/pachube*.out|grep Temp_2880AA9A30064|cut -d, -f2`;

$msg_widget = new MessageWidget(1);
$msg_widget->setHeader('Temperatura Placas');
$msg_widget->setMessage ($temperatura);
$this->registerWidget($msg_widget);

<?php
require_once('lib/ServiceHandler.php');
$widget = new ServiceHandler('motion');
$widget->statusCommand = 'pidof motion';
$this->registerWidget($widget);

<?php
require_once('lib/ServiceHandler.class.php');
$widget = new ServiceHandler('plexmediaserver');
$widget->statusCommand = 'pidof "Plex Media Server"';
$this->registerWidget($widget);

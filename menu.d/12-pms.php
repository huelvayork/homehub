<?php
require_once('lib/ServiceHandler.php');
$widget = new ServiceHandler('plexmediaserver');
$widget->statusCommand = 'pidof "Plex Media Server"';
$this->registerWidget($widget);

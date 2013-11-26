<?php

// Session-related operations
//
// we must have defined every class before starting session 
// 		so any object stored in the session can be instantiated as its original class.


require_once('Menu.class.php');
require_once('MessageWidget.class.php');
require_once('ServiceHandler.class.php');

session_start();
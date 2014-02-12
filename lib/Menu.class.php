<?php

class Menu {
	private $widgets;
	private $name='';

	private function __construct($name = '')
	{
		$this->widgets = array();
		$this->name = $name;
	}

	// Not singleTon. You can instantiate many instances, with different names.
	// If you ask for an already defined instance (saved in the PHP session),
	// the function returns the same instance. If not already defined, you get a new one
	// The second parameter specifies the directory containing the widgets for this menu
	public function getInstance ($name = '', $dir = null)
	{
		if ( isset ($_SESSION['hhMenu_' .$name])) 
		{
			$instance = unserialize($_SESSION['hhMenu_' .$name]);
		} else {
			$instance = new self($name);
			if ( ! is_null($dir) ) 
				$instance->readWidgets($dir);
		}
		return $instance;
	}

	public function registerWidget (IWidget $widget)
	{
		$this->widgets[] = $widget;
	}

	public function readWidgets ($directory='menu.d')
	{
		$files = glob($directory.'/*.php');
		foreach ($files as $file) {
			include($file);
		}
	}

	public function drawWidgets ()
	{
		$num_cols = 0;
		foreach ($this->widgets as $widget) {
			if ($num_cols == 0) {
				echo '<div class="row">';
			}

			if ($num_cols+$widget->size <= 4) {
				$widget->draw();
				$num_cols += $widget->size;
			}
			else {
				echo "</div> <!-- Row -->\n";
				echo '<div class="row">';
				$widget->draw();
				$num_cols = $widget->size;
			}

			if ($num_cols == 4) {
				echo "</div> <!-- Row -->\n";
				$num_cols = 0;
			}
		}

		if ($num_cols != 4) {
			echo "</div> <!-- Row -->\n";
		}
	}

	public function save() 
	{
		$_SESSION['hhMenu_' .$this->name] = serialize($this);
	}
}

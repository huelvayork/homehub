<?php

class Menu {
	private $widgets;

	public function __construct()
	{
		$this->widgets = array();
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

			if ($num_cols == 4) {
				echo "</div> <!-- Row -->\n";
				$num_cols = 0;
				continue;
			}

			if ($num_cols+$widget->size > 4) {
				echo "</div> <!-- Row -->\n";
				echo '<div class="row">';
				$widget->draw();
				$num_cols = $widget->size;
			}
		}

		if ($num_cols != 4) {
			echo "</div> <!-- Row -->\n";
		}
	}
}

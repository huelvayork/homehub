<?php

require_once('Widget.interface.php');

abstract class AWidget implements IWidget {
	public $size; // In "blocks". Max: 4

	public function __construct ($size=1)
	{
		if ($size < 1) {
			$size = 1;
		}
		elseif ($size > 4) {
			$size = 4;
		}

		$this->size = $size;
	}

	protected function preDraw()
	{
		switch ($this->size) {
			case 2:
				$size_xs = 12;
				$size_sm = 6;
				break;

			case 3:
				$size_xs = 12;
				$size_sm = 9;
				break;

			case 4:
				$size_xs = 12;
				$size_sm = 12;
				break;

			default:
				$size_xs = 6;
				$size_sm = 3;
				break;
		}
		echo "<div class=\"col-xs-$size_xs col-sm-$size_sm hh_widget\">\n";
	}

	abstract public function draw();

	protected function postDraw()
	{
		echo "</div> <!-- Widget -->\n";
	}
}

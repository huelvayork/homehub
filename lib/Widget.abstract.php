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
				$size_md = 6;
				break;

			case 3:
				$size_xs = 12;
				$size_md = 9;
				break;

			case 4:
				$size_xs = 12;
				$size_md = 12;
				break;

			default:
				$size_xs = 6;
				$size_md = 3;
				break;
		}
		echo "<div class=\"col-xs-$size_xs col-md-$size_md\" style=\"margin-top: 10px; display:inline-block\">\n";
	}

	abstract public function draw();

	protected function postDraw()
	{
		echo "</div> <!-- Widget -->\n";
	}
}

<?php

require_once ('Widget.abstract.php');

class MessageWidget extends AWidget
{
	private $message;

	public function __construct($size=1) {
		parent::__construct($size);
		$this->message = '';
	}

	public function setMessage($message)
	{
		$this->message = $message;
	}

	public function draw() {
		$this->preDraw();
		echo $this->message;
		$this->postDraw();
	}
}
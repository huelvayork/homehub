<?php

require_once ('Widget.abstract.php');

class MessageWidget extends AWidget
{
	private $header;
	private $message;
	private $footer;
	private $isTable;

	public function __construct($size=1) {
		parent::__construct($size);
		$this->header = null;
		$this->message = '';
		$this->footer = null;
	}

	public function setHeader($header)
	{
		$this->header = $header;
	}

	public function setMessage($message, $isTable=FALSE)
	{
		$this->message = $message;
		$this->isTable = $isTable;
	}

	public function setFooter($footer)
	{
		$this->footer = $footer;
	}

	protected function render()
	{
		echo "<div class=\"panel panel-primary\">\n";
		if (! is_null($this->header)) {
			echo "<div class=\"panel-heading\">
				<h3 class=\"panel-title\">{$this->header}</h3>
				</div>\n";
		}

		if (! $this->isTable) {
			echo "<div class=\"panel-body\">
				{$this->message}
					</div>
				</div>\n";
		}
		else {
			echo $this->message;
		}

		if (! is_null($this->footer)) {
			echo "<div class=\"panel-footer\">{$this->footer}</div>\n";
		}
	}
}
<?
class ServiceHandler
{
	public $name;
	public $service;
	public $running;
	public $startCommand = '';
	public $stopCommand;
	public $restartCommand;
	public $statusCommand;
	public $cssClass = "btn btn-primary btn-lg";

	var $initScriptsPath = '/etc/init.d/';

	function __construct($name='') {
		$this->name = $name;
		$this->service = $name;
		$this->startCommand = $this->initScriptsPath .$this->service . ' start';
		$this->stopCommand = $this->initScriptsPath .$this->service . ' stop';
		$this->statusCommand = $this->initScriptsPath .$this->service . ' status';
		$this->restartCommand = $this->initScriptsPath .$this->service . ' restart';
	}

	public function isRunning() {
		$result = (`pidof {self->service}` == '' ? false : true);
		return $result;
	}

	public function drawButton() {
		$running = $this->isRunning();
		$name = $this->name;
		$class = $this->cssClass;
		echo "<a href='#' class='$class'> $name<br>$running</a>";
	}
}
?>

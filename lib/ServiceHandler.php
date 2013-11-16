<?php

require_once ('Widget.abstract.php');

class ServiceHandler extends AWidget
{
	public $name;
	public $service;
	public $running;
	public $startCommand = '';
	public $stopCommand;
	public $restartCommand;
	public $statusCommand;
	public $cssClass = "hhService btn btn-primary btn-lg ";

	var $serviceCommand = '/usr/bin/sudo /usr/sbin/service';

	public function __construct($name='', $size=1) {
		parent::__construct($size);
		$this->name = $name;
		$this->service = $name;
		$this->startCommand = $this->serviceCommand .' ' .$this->service . ' start';
		$this->stopCommand = $this->serviceCommand .' ' .$this->service . ' stop';
		$this->statusCommand = $this->serviceCommand .' ' .$this->service . ' status';
		$this->restartCommand = $this->serviceCommand .' ' .$this->service . ' restart';
	}

	public function isRunning() {
		exec($this->statusCommand, $output, $retval);
		// Standard init-scripts status command returns 0 when the service is running
		$result = ( ($retval == 0) ? true : false);
		return $result;
	}

	protected function render() {
		$running = $this->isRunning();
		$name = $this->name;
		if ($running) {
			$class = $this->cssClass . " btn-green";
			$txtRunning = "running";
		} else {
			$class = $this->cssClass . " btn-red";
			$txtRunning = "stopped";
		}

		echo "<a href='#modaldialog' class='$class' style=\"width:100%\" id='hhServiceHandler$name' name='$name'>$name<br>$txtRunning</a>";
	}

	public function showDialog() {
		?>
		<p class='btn btn-primary btn-lg btn-green' onclick="hhServiceAction('<?=$this->service?>','start');">Start</p>
		<p class='btn btn-primary btn-lg' onclick="hhServiceAction('<?=$this->service?>','restart');">ReStart</p>
		<p class='btn btn-primary btn-lg btn-red' onclick="hhServiceAction('<?=$this->service?>','stop');">Stop</p>
		<?php
	}

	private function execCommand ($command)
	{
		$output = array();
		$result = 0;
		exec($command, $output, $result);
		foreach ($output as $line) {
			echo $line ."<br>";
		}
		if ($result != 0) {
			echo "<p>ERROR - return code: $result</p>";
		} else {
			echo "<p>Success.</p>";
		}

		$this->showDialog();
	}

	public function start()
	{
		echo "<p> Starting {$this->name}</p>";
		$this->execCommand($this->startCommand);
	}

	public function restart()
	{
		echo "<p> ReStarting {$this->name}</p>";
		$this->execCommand($this->restartCommand);
	}

	public function stop()
	{
		echo "<p> Stopping {$this->name}</p>";
		$this->execCommand($this->stopCommand);
	}
}

?>

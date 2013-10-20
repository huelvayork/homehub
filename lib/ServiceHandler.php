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
		exec($this->statusCommand, $output);
		$result = (strpos($output[0], 'process') === FALSE ? false : true);
		return $result;
	}

	public function drawButton() {
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

	public function draw() {
		$running = $this->isRunning();
		$name = $this->name;
		if ($running) {
			$class = $this->cssClass . " btn-green";
			$txtRunning = "running";
		} else {
			$class = $this->cssClass . " btn-red";
			$txtRunning = "stopped";
		}

		$this->preDraw();
		echo "<a href='#modaldialog' class='$class' style=\"width:100%\" id='hhServiceHandler$name' name='$name'>$name<br>$txtRunning</a>";
		$this->postDraw();
	}

	public function showDialog() {
		?>
		<p class='btn btn-primary btn-lg btn-green' onclick="hhServiceAction('<?=$this->service?>','start');">Start</p>
		<p class='btn btn-primary btn-lg' onclick="hhServiceAction('<?=$this->service?>','restart');">ReStart</p>
		<p class='btn btn-primary btn-lg btn-red' onclick="hhServiceAction('<?=$this->service?>','stop');">Stop</p>
		<?
	}
	public function start() {
		$output = array();
		$result = 0;
		?>
		<p> Starting <?=$this->name?></p>
		<?
		exec($this->startCommand, $output, $result);
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
	public function restart() {
		$output = array();
		$result = 0;
		?>
		<p> ReStarting <?=$this->name?></p>
		<?
		exec($this->restartCommand, $output, $result);
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
	public function stop() {
		$output = array();
		$result = 0;
		?>
		<p> Stopping <?=$this->name?></p>
		<?
		exec($this->stopCommand, $output, $result);
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
}
?>

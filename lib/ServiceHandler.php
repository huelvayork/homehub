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
	public $cssClass = "hhService btn btn-primary btn-lg ";

	var $serviceCommand = '/usr/sbin/service';

	function __construct($name='') {
		$this->name = $name;
		$this->service = $name;
		$this->startCommand = $this->serviceCommand .' ' .$this->service . ' start';
		$this->stopCommand = $this->serviceCommand .' ' .$this->service . ' stop';
		$this->statusCommand = $this->serviceCommand .' ' .$this->service . ' status';
		$this->restartCommand = $this->serviceCommand .' ' .$this->service . ' restart';
	}

	public function isRunning() {
		$result = (`pidof {$this->service}` == '' ? false : true);
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
		
		echo "<a href='#modaldialog' class='$class' id='hhServiceHandler$name' name='$name'>$name<br>$txtRunning</a>";
	}
	
	public function showDialog() {
		?>
		<p class='btn btn-primary btn-lg  btn-green' onclick="hhServiceAction('<?=$this->service?>','start');">Start</p>
		<p class='btn btn-primary btn-lg '>ReStart</p>
		<p class='btn btn-primary btn-lg  btn-red'>Stop</p>
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

	}
}
?>

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
	
	public function modalDialog() {
?>
<!-- pop-up modal -->
<!-- Modal -->
<div class="modal" id="hhServiceDialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="hhServiceDialogTitle">Modal title</h4>
            </div>
            <div class="modal-body" id="hhServiceDialogBody">
<p class='btn btn-primary btn-lg  btn-green'>Start</p>
<p class='btn btn-primary btn-lg '>ReStart</p>
<p class='btn btn-primary btn-lg  btn-red'>Stop</p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?
	}
}
?>

<?php

class PiControl {
	
	public function processPost(){

		if( $_GET['action'] == "shutdown" ) {
			$test = shell_exec("touch /tmp/shutdown");
			echo '<pre>Shutting down...</pre>';
		}
		
		if( $_GET['action'] == "reboot" ) {
			$test = shell_exec("touch /tmp/reboot");
			echo '<pre>Rebooting down...</pre>';
		}
	}
	
}

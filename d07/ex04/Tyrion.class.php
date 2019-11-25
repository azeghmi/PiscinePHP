<?php
require_once 'Lannister.class.php';
class Tyrion Extends Lannister{
	public function sleepWith($amant){
		if ($amant instanceof Lannister)
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}
	
}


?>
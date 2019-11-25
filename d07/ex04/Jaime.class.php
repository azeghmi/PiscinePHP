<?php
require_once 'Lannister.class.php';

class Jaime Extends Lannister{
	public function sleepWith($amant)
	{
		if ($amant instanceof Cersei)
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
		else if ($amant instanceof Tyrion)
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}		
}
?>
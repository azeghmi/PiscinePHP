<?php

class NightsWatch implements IFighter{
	private $tab = array();	
	public function recruit($soldier){
		$this->tab[] = $soldier;
	}
	public function fight()
	{
		foreach ($this->tab as $hero) {
			if (method_exists($hero, 'fight'))
				$hero->fight();
		}
	}
}

?>
<?php

class UnholyFactory
{
	 static public $type_soldier = array(
        'foot soldier' => 0,
        'archer' => 0,
        'assassin' => 0,
        'llama' => 0
    );

	public $tab = array();
	public $tab_person = array();

	public function check($tab)
 	{
 		if (!empty($tab))
 		{
 			foreach ($tab as $value)
 				self::$type_soldier[$value->getType()] += 1;
			unset($this->tab);
		}
 	}
	
	public function absorb($person)
	{
		if ($person instanceof Fighter)
		{
			if (self::$type_soldier[$person->getType()] != 0)
			{
				echo "(Factory already absorbed a fighter of type foot soldier)\n";
				return ;
			}
			echo "(Factory absorbed a fighter of type " . $person->getType() . ")\n";
			$this->tab[] = $person;
		}
		else
			echo "(Factory can't absorb this, it's not a fighter)\n";
		$this->check($this->tab);
 	}
 	public function fabricate($type)
 	{

 		if ($type == "llama")
 			echo "(Factory hasn't absorbed any fighter of type llama)\n";
 		else
 		{
 			$obj = ucfirst(implode("", explode(" ", $type)));
 			$object = new $obj();
 			echo "(Factory fabricates a fighter of type " . $type . ")\n";
 		}
		return $object;
 	} 
}

?>
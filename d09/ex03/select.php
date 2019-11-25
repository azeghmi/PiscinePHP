<?php
$fd = file_get_contents('list.csv');
$split = explode("\n", $fd);
$ntab = array();
$i = 0;
foreach ($split as $tab) {
	$ntab[$i++] = explode(";", $tab);
}

echo json_encode($ntab);
?>

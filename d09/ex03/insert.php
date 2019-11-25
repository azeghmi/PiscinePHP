<?php
    
    function ft_insert($content, $id, $num) {
        $file = file_get_contents('list.csv');
        $tab = explode("\n", $file);
        if (count($tab) > 1)
        	$id = $tab[count($tab) - 2][0];
        else
        	$id = 0;
        $id = (intval($id)) + 1;
        if ($num)
        	file_put_contents('list.csv', strval($id) .";".$content."\n", FILE_APPEND);
    }
    if (isset($_POST['content']) && isset($_POST['i']) && isset($_GET['num']))
        ft_insert($_POST['content'], $_POST['i'], $_GET['num']);
?>
#!/usr/bin/php
<?php
    date_default_timezone_set('CET');
    $filename = "/var/run/utmpx";
    $handle = fopen($filename, "rb");
    while ($content = fread($handle, 628))
    {
        $content = unpack("a256user/a4identifer/a32tty/ipid/itype/I2time/a256hostname/i16pad", $content);
        $content = str_replace("\0", "", $content);
        if ($content["type"] == 7)
            echo $content["user"]." ".$content["tty"]." ".date(" M j H:i", $content["time1"]) . " \n";
        }
?>
#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        function replace($matches)
        {
            $matches = preg_replace_callback("/>.*</sU",
            function ($matches) {
                return (strtoupper($matches[0]));
            }, $matches[0]);
            return $matches;
        }
        $content = file_get_contents($argv[1]);
        $content = preg_replace_callback("/(<a[^>]*)(.*)(\/a>)/sU", "replace", $content);
        $content = preg_replace_callback('/title="(.*)"/sU',
                function ($matches) {
                    return ('title="' . strtoupper($matches[1]) . '"');
            }, $content);
        echo "$content\n";
    }
?>
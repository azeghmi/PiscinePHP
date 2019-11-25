#!/usr/bin/php
<?php
function ft_error()
{
	echo "Wrong Format\n";
	exit(0);
}

function ft_get_time($arr, $i)
{
	return $arr[$i];
}

function ft_check_month($str)
{
	if (preg_match('/[Jj]anvier/', $str) === 1)
		return 1;
	else if (preg_match('/[Ff][ée]vrier/', $str) === 1)
		return 2;
	else if (preg_match('/[Mm]ars/', $str) === 1)
		return 3;
	else if (preg_match('/[Aa]vril/', $str) === 1)
		return 4;
	else if (preg_match('/[Mm]ai/', $str) === 1)
		return 5;
	else if (preg_match('/[Jj]uin/', $str) === 1)
		return 6;
	else if (preg_match('/[Jj]uillet/', $str) === 1)
		return 7;
	else if (preg_match('/[Aa]o[ûu]t/', $str) === 1)
		return 8;
	else if (preg_match('/[Ss]eptembre/', $str) === 1)
		return 9;
	else if (preg_match('/[Oo]ctobre/', $str) === 1)
		return 10;
	else if (preg_match('/[Nn]ovembre/', $str) === 1)
		return 11;
	else if (preg_match('/[Dd][ée]cembre/', $str) === 1)
		return 12;
	else
		return 1;
}
if ($argc == 0)
	exit(0);
if (preg_match('/(([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([0-2][0-9]|3[01]|[0-9]) ([Jj]anvier|[Ff][ée]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[ûu]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre) [0-9]{4} ([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9])/', $argv[1]) === 0)
	ft_error();    
if (preg_match('/(31) ([Aa]vril|[Jj]uin|[Ss]eptembre|[Nn]ovembre)/', $argv[1]) === 1)
	ft_error();
date_default_timezone_set('Europe/Paris');
$arr = explode(' ', $argv[1]);
echo mktime(ft_get_time(explode(":", $arr[4]), 0), ft_get_time(explode(":", $arr[4]), 1), ft_get_time(explode(":", $arr[4]), 2),ft_check_month($arr[2]), $arr[1], $arr[3])."\n";
?>
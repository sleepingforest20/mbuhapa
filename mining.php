<?php

include('config.php');
$w = "\033[1;37m";
$g = "\033[1;32m";
$r = "\033[1;31m";
$cy = "\033[1;36m";
$y = "\033[1;33m";
$b = "\033[1;34m";
$p = "\033[1;35m";
$d = "\033[1;30m";


function login($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $info_code = $info["http_code"];
        if ($info_code == 200){
                if (strpos($result,"All BTC Wallets are allowed!")){
                        echo "\n\033[1;31m Disconnected...!\n";
                        sleep(2);
                       login($PHPSESSID);
                       start($PHPSESSID);
                }
                else{
                        $one = explode('<header class="wp-header" role="banner" style="list-style-type:none;">
    <h1><i class="fa fa-bitcoin"></i> 
                 <span id="user_balance">', $result);
                        $two = explode('</span></h1>', $one[1]);
                        global $pr;
                        $pr = "$two[0]\n";
                }
        }
        else{
                echo "\n\033[1;31m Disconnected...!\n";
                sleep(2);
                start($PHPSESSID);
        }
}
function ball($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_reset($ch);
        $one = explode('<header class="wp-header" role="banner" style="list-style-type:none;">
    <h1><i class="fa fa-bitcoin"></i> 
                 <span id="user_balance">', $result);
                        $two = explode('</span></h1>', $one[1]);
                        global $pr;
                        $pr = "$two[0]\n";
                        login($PHPSESSID);
}
function start($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['start_mining_info'] = '1';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
        login($PHPSESSID);
}
function click($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['claimbuttons_fb'] = '1';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_reset($ch);
}
function setInterval($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['check_status'] = '0';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
}
function stop($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/73.0.3683.90 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['stop_mining_info'] = '1';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;

        $result = curl_exec($ch);
        curl_reset($ch);
}

date_default_timezone_set('Asia/Jakarta');
$asciicode = " ";

date_default_timezone_set('Asia/Jakarta');
system('clear');
echo $g.`figlet -f future "Sleeping Forest"`;
echo $asciicode;
echo $y."\nMenghubungkan....!";
login($PHPSESSID); 
echo $g."\nLogin ..!\n".$g."Login Berhasil! 😘👍"; 
echo "\nBallance : ".$w, $pr;
echo "\n".$y."Mulai Macul......!\n";
$i = 1;
while($i ==1) {
     { click($PHPSESSID);
       setInterval($PHPSESSID);
       start($PHPSESSID); echo "\n".$g."[".date("h:i:s")."] Hasil macul : ".$w, $pr; 
       echo $p. 'Macul maning ...';  ball($PHPSESSID);   
       sleep(60);
      }
     
     
}

?>

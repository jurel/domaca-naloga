<?php
require_once("skripte/ez_sql_core.php");
require_once("skripte/ez_sql_mysql.php");

$db= new ezsql_mysql("root", "", "ufo", "localhost");
$db->query("SET NAMES UTF8");

function pr($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UFO</title>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
   <div class="container">
       <nav>
           <li><a href="index.php">Domov</a></li>
           <li><a href="upload.php">Dodaj videnje</a></li>
           </nav>
   
    

    
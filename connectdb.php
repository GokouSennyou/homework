<?php

$host="localhost";
$user="root";
$passwd="123";
$dbname="mmisdb";


$connect = mysqli_connect ( $host , $user ,$passwd , $dbname );
//檢查連接
if (! $connect )
{
    die( "連接錯誤: " . mysqli_connect_error ());
}




?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "Stock";

$connect = mysqli_connect($host,$user,$pass,$name);

if (mysqli_connect_error()) {
	echo "Erro na conexão:".mysqli_connect_error();
}




<?php

//tworze połączneie do bazy danych: sl

$host = "localhost";
$user = "root";
$haslo = "";
$dbname = "sl";
$port = 3306;

$polaczenie = @new Mysqli($host,$user,$haslo,$dbname,$port);

if(mysqli_connect_errno()!=0){
    echo("Błąd połączenia do bazy danych");
}
else{
    echo("Połączono do bazy danych");
}

?>
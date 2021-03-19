<?php
$host = "localhost";
$user = "root";
$haslo = "";
$dbname = "bazaprojekt";
$port = 3306;

$poloczenie = @new Mysqli($host,$user,$haslo,$dbname,$port);

if(mysqli_connect_errno()!=0){
    echo("Błąd połączenia do bazy danych");
}
else{
    echo("Połączono do bazy danych");
}

?>


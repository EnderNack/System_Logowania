<?php
session_start();
include_once("polaczenie.php"); ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Logowanie do systemu </title>
    <style>
.contener{
    width:500px;margin:auto;}
    </style>
</head>
<body>
<div class='contener'>

<fieldset>
<legend> System rejestracji kont </legend>
<table>
<form action="logowanie.php" method="post">
<tr>
        <td>Login:</td>  <td><input type="text" name='login' required /></td>
        </tr>

        <tr>
        <td>Haslo:</td>  <td><input type="password" name='haslo' required /></td>
        </tr>
       
        <td></td>  <td><input type="submit" name='submit' value="ZALOGUJ"/></td>
        </tr>
        <tr>
        <td></td> REJESTRACJA DO SYSTEMU  <td><a href="rejestracja.php"> REJESTRACJA </a></td>
        </tr>


</form>
</table>
</fieldset>
</div>

<?php
if(isset($_POST['submit'])){
    $login = htmlspecialchars($_POST['login']);
    $haslo = htmlspecialchars_decode($_POST['haslo']);

    $zapytanie = $polaczenie->query("SELECT imie, nazwisko, login, email FROM rejestracja WHERE login = '$login' and haslo = '$haslo' limit 1");

    if(mysqli_num_rows($zapytanie)){

        list($imie,$nazwisko,$log,$email) = mysqli_fetch_array($zapytanie);

        echo("
    imie: <b>$imie</b><br>
    nazwisko: <b>$nazwisko</b><br>
    email: <b>$email</b><br>
    <a href='logowanie.php?wyloguj=0'> WYLOGUJ </a>
        
        ");
        //rejestruje zmienna sesyjna 

        $_SESSION["zalogowano"] = 1; 
    }
     else{
        echo(
            "Błąd wykonania zapytania"
        );
    }
}

if(isset($_GET['wyloguj']) and $_GET['wyloguj']==0){
    $_SESSION["zalogowano"] = 0;
    echo("Zostałeś wylogowany");
}

?>
    
</body>
</html>

<?php $polaczenie->close();  ?> 
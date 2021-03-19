<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="panel">
            <fieldset>
                <form action="" method="post">
                        <h1>LOGOWANIE</h1>
                        <input type="text" placeholder="Login:" required>
                        <input type="password" placeholder="Hasło:" required>
                        <input type="submit" value="ZALOGUJ"> 
                </form>
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
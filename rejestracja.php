<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panel rejestracji</title>
</head>
<body>
        <div class="panel">

                <fieldset>
                <form action="" method="post">
                <input type="text" placeholder="Imię:" required>
                <input type="text" placeholder="Nazwisko:" required>
                <input type="text" placeholder="Login:" required>
                <input type="password" placeholder="Hasło:" required>
                <input type="password" placeholder="Powtórz hasło" required>
                <input type="text" placeholder="Adres" required>
                <input type="number" step=9 placeholder="Nr. tel:" required> 
                <input type="email" placeholder="Email:" required> <br>
                <input type="submit">  
                 </form>
                </fieldset> 
           
                
        </div>
        <?php

if(isset($_POST['submit'])){

    if($_POST['haslo1'] == $_POST['haslo2']){

        $login = htmlspecialchars($_POST['login']);
        $haslo = htmlspecialchars($_POST['haslo1']);
        $imie = htmlspecialchars($_POST['imie']);
        $nazwisko = htmlspecialchars($_POST['nazwisko']);
        $email = htmlspecialchars($_POST['email']);
        $zapytanie_sprawdz = $polaczenie->query("SELECT login FROM rejestracja WHERE login ='$login'");
        if(mysqli_num_rows($zapytanie_sprawdz)){
            echo("Podany login w bazie już istnieje <br>");
        } else{

            $zapytanie_dodajdobazy = $polaczenie->query("INSERT INTO rejestracja(login,haslo, imie, nazwisko, email) values('$login','$haslo','$imie','$nazwisko','$email')");

        if(mysqli_affected_rows($polaczenie)){
            echo("Dodano nowy rekor do bazy danych");
        }
        else{
            echo("Błąd dodania do bazy danych");
        }
        }

    }
}


?>


</body>
</html>
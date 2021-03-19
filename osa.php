<?php include_once("poloczenie.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Logowania</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="styleshee t" href="style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">AKTUALIZACJA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">ARCHIWUM <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">LISTA WSZYSTKICH URZYTKOWNIKOW</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">PROFIL</a>
                </li>
              </ul>
    
            </div>
          </nav>
</div>
    <div class="srodek">
        <div class="lewo">
        <div class="panel">

        <div class='contener'>

<fieldset>
<legend> System rejestracji kont </legend>
<table>
<form action="osa.php" method="post"  name="form" onsubmit='return sprawdz(this);'>
        <tr>
        <td>Login:</td>  <td><input type="text" name='login'/></td>
        </tr>

        <tr>
        <td>Haslo:</td>  <td><input type="password" name='haslo1'/></td>
        </tr>
        <tr>
        <td>Powtórz haslo:</td>  <td><input type="password" name='haslo2'/></td>
        </tr>
        <tr>
        <td>Imię:</td>  <td><input type="text" name='imie' /></td>
        </tr>
        <tr>
        <td>Nazwisko:</td>  <td><input type="text" name='nazwisko'/></td>
        </tr>
        <tr>
        <td>E-Mail:</td>  <td><input type="email" name='email'/></td>
        </tr>
        <tr>
        <td>Adres:</td>  <td><input type="text" name='adres'/></td>
        </tr>
        <td>telefon::</td>  <td><input type="text" name='tel'/></td>
        </tr>
        <tr>
        <tr>
        <td></td>  <td><input type="submit" name='submit' value="ZAREJESTRUJ"  /></td>
        </tr>
      

</form>
</table>
</fieldset>
</div>
        </div>
        </div>
        <div class="prawo">

        </div>
    </div>
     <div id="stopka">Piotr Pająk, Kacper Wilczek, Filip Urzoń, Łukasz Mieczkowski, Patryk Widomski, Weronika , System_Logowania</div>
    </div>
    <?php

if(isset($_POST['submit'])){

    if($_POST['haslo1'] == $_POST['haslo2']){

        $login = htmlspecialchars($_POST['login']);
        $haslo = htmlspecialchars($_POST['haslo1']);
        $imie = htmlspecialchars($_POST['imie']);
        $nazwisko = htmlspecialchars($_POST['nazwisko']);
        $email = htmlspecialchars($_POST['email']);
        $adres = htmlspecialchars($_POST['adres']);
        $tel = htmlspecialchars($_POST['tel']);
        $zapytanie_sprawdz = $poloczenie->query("SELECT login FROM dane WHERE login ='$login'");
        if(mysqli_num_rows($zapytanie_sprawdz)){
            echo("Podany login w bazie już istnieje <br>");
        } else{

            $zapytanie_dodajdobazy = $poloczenie->query("INSERT INTO dane( imie, nazwisko, login, haslo1, adres, tel, email ) VALUES ('$imie','$nazwisko','$login','$haslo','$adres','$tel','$email')");

        if(mysqli_affected_rows($poloczenie)){
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
<?php $poloczenie->close(); ?>

<?php include_once("polaczenie.php"); ?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System logowania</title>

    <script>
    function sprawdz(form){
        
        if(form.login_.value.length>10){
            alert('Login nie może mieć więcej niż 10 znaków!');
            form.login.focus();
            return false;
        }
        //var login_ = form.login.value;
        //alert(login);
        var login_ = document.forms[0].elements[0].value;
        
        if(form.login_.length < 3){
            alert("Login musi mieć więcej niż 3 znaki");
            form.login.focus();
            return false;
        } 
        //var haslo1_ = document.forms[0].haslo1.value;
        if(form.haslo1.value.length>=20){
            alert('Hasło nie może mieć więcej niż 20 znaków!');
            form.haslo1.focus();
            return false;
        }
        if(form.haslo1_.value.length=<8){
            alert('Hasło nie może mieć mniej niż 8 znaków!');
            form.haslo1.focus();
            return false;
        }
        if(form.haslo1.value != form.haslo2.value){
            alert('Hasła muszą się zgadzać!');
            form.haslo1.focus();
            form.haslo2.focus();
            return false;
        }else{
            return true;
        }
        if(form.haslo1.value.length=<3){
            alert("Hasło musi mieć więcej niż 3 znaki");
            form.haslo1.focus();
            return false;
        }
        if(form.imie.value.length=<2){
            alert("Imie musi mieć więcej niż 2 znaki");
            form.imie.focus();
            return false;
        }        

        if(nazwisko.value.length=<3){
            alert("Nazwisko musi mieć więcej niż 3 znaki");
            form.nazwisko.focus();
            return false;
        }

        
    }

    </script>
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
<form action="rejestracja.php" method="post"  name="form" onsubmit='return sprawdz(this);'>
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
        <td></td>  <td><input type="submit" name='submit' value="ZAREJESTRUJ"  /></td>
        </tr>
        <tr>
        <td></td> LOGOWANIE DO SYSTEMU  <td><a href="logowanie.php">LOGOWANIE </a></td>
        </tr>


</form>
</table>
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

<?php $polaczenie->close(); ?>
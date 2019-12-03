<?php

session_start();
//Useremail und Passwort
$userName = 'arnauld@gmail.com';
$userPassword = 0000;


$email = $_POST['email'];
$password = $_POST['password'];


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>venus</title>
</head>
<body>

<!-- -->
<div class="formular-connexion">
    <form action="" method="post">
        <h1>Login</h1>
        <input type="text" name="email" id="email" style="width: 75%; height: 35px" placeholder="Email"><br>
        <input type="password" name="password" id="password" style="width: 75%; height: 35px" placeholder="Passwort"><br>
        <input type="submit" name="submit" value="Anmelden" style="width: 77%; height: 35px; background-color: black; color: white"><br><br>

        <?php
        if(isset($_POST['submit'])){

            if($email && $password){

                if($email == $userName && $password == $userPassword){

                    header('Location: home.php');

                }else{

                    echo 'Passwort oder Email falsch ';
                }

            }else{

                echo 'Füllen sie bitte alle felder auf';
            }

        }


        ?>
    </form>
</div>


</body>
</html>
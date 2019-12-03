<?php
    session_start();


    if(isset($_POST['submit'])){

        //AdminName und AdminPasswort
        $adminName = 'Arnauld';
        $adminPassword = 2020;


        $admin = $_POST['admin'];
        $password = $_POST['password'];

        if($admin && $password){

            if($adminName == $admin && $password == $adminPassword){

                $_SESSION['adminName'] = $adminName;
                header('Location: admin.php');

            }else{

                $falseData = 'Passwort oder Email falsch ';
            }

        }else{

            $felderAusfüllen = 'Füllen sie bitte alle felder auf ';

        }

    }
?>



<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>venus</title>
</head>
<body>

<!-- Login form admin -->
<div class="formular-connexion">
    <form action="" method="post">
        <h1>Login - Admin</h1>
        <input type="text" name="admin" id="admin" style="width: 75%; height: 35px" placeholder="Admin Name"><br>
        <input type="password" name="password" id="password" style="width: 75%; height: 35px" placeholder="Passwort"><br>
        <input type="submit" name="submit" value="Anmelden" style="width: 77%; height: 35px; background-color: black; color: white"><br><br>
        <p><?php
                echo $felderAusfüllen;
                echo $falseData;
            ?>
        </p>
    </form>
</div>


</body>
</html>


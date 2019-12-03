<?php
    session_start();
    /*
     * when connecting with adminName and passwordAdmin, we are redirected to: admin.php
     * in all other cases, we are redirected to: index.php
     */

    if(isset($_SESSION['adminName'])){

    }else{
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>venus</title>
</head>
<body>

<h1> Willkommen <?php echo $_SESSION['adminName']; ?> </h1>

<!-- form to add a new colegue -->

<h2>neuer Mietarbeiter </h2>
<form method="post" action="">
    <label>Anrede</label><br>
    <input type="text" name="anrede" id="anrede"><br>
    <label>Vorname</label><br>
    <input type="text" name="vorname" id="vorname"><br>
    <label>Nachname</label><br>
    <input type="text" name="nachname" id="nachname"><br>
    <label>Email</label><br>
    <input type="email" name="email" id="email"><br>
    <label>Tel</label><br>
    <input type="tel" name="tel" id="tel"><br>
    <label>Handy Nummer</label><br>
    <input type="tel" name="personalnummer" id=""><br>
    <label>Zugriffsprofil</label><br>
    <input type="text" name="zugriffsprofil" id=""><br><br>
    <input type="submit" name="" id="" value="neuer Mitarbeiter hinzufügen"> <br>
</form>


</body>
</html>


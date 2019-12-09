<?php
session_start();

//Database connexion
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=stemplessystem;charset=utf8', 'root', 'root');
}
catch (Exception $e)

{
    die('Erreur!! : ' . $e->getMessage());
}


/*
* when connecting with adminName and passwordAdmin, we are redirected to: admin.php
* in all other cases, we are redirected to: index.php
*/

if(isset($_SESSION['adminName'])){

?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
    <br><br>
    <a href="?action=add"> Mitarbeiter hinzufügen </a> <br>
    <a href="?action=modifyAndDelete"> ändern oder löchen </a>

    <h1>Admin Seite</h1>
    <h3>Welcome <?php echo $_SESSION['adminName']; ?> </h3>

    </body>
    </html>

<?php

    if(isset($_GET['action'])){

        if($_GET['action']== 'add'){

            if(isset($_POST['submitB'])){

                $anredeB = $_POST['anredeB'];
                $vornameB = $_POST['vornameB'];
                $nachnameB = $_POST['nachnameB'];
                $passwortB =$_POST['passwortB'];
                $emailB = $_POST['emailB'];
                $telB = $_POST['telB'];
                $personalnummerB = $_POST['personalnummerB'];
                $zugriffsprofilB = $_POST['zugriffsprofilB'];

                if($anredeB && $vornameB && $nachnameB && $passwortB && $emailB && $telB && $zugriffsprofilB && $personalnummerB){

                    $req = $bdd->prepare('INSERT INTO benutzer(anrede, vorname, nachname, passwort, email, tel, zugriffsprofil, personalnummer) 
                                         VALUES(:anrede, :vorname, :nachname, :passwort, :email, :tel, :zugriffsprofil, :personalnummer)');

                    $req->execute(array(
                        'anrede' => $anredeB,
                        'vorname' => $vornameB,
                        'nachname' => $nachnameB,
                        'passwort' => $passwortB,
                        'email' => $emailB,
                        'tel' => $telB,
                        'zugriffsprofil' => $zugriffsprofilB,
                        'personalnummer' => $personalnummerB
                    ));

                    echo "neuer Mitarbeiter hingefügt!!";
                }else{

                    echo "fühlen Sie bitte alle Felder auf";
                }

            }
            ?>
            <div>
                <h1>Neuer Mitarbeiter hinfühgen</h1><br>
                <form action="" method="POST"><br>
                    <label>Anrede</label><br>
                    <input type="text" name="anredeB" id="anredeB"><br>
                    <label>Vorname</label><br>
                    <input type="text" name="vornameB" id="vorameB"><br>
                    <label>Nachname</label><br>
                    <input type="text" name="nachnameB" id="nachnameB"><br>
                    <label>Passwort</label><br>
                    <input type="password" name="passwortB" id="passwortB"><br>
                    <label>E-mail-Adresse</label><br>
                    <input type="email" name="emailB" id="emailB"><br>
                    <label>Tel</label><br>
                    <input type="tel" name="telB" id="telB"><br>
                    <label>Zugriffsprofil</label><br>
                    <input type="text" name="zugriffsprofilB" id="zugriffsprofilB"><br>
                    <label>Personalnummer</label><br>
                    <input type="number" name="personalnummerB" id="personalnummerB"><br>
                    <input type="submit" value="neuer Mitarbeiter hinfühgen" name="submitB" id="submitB"><br><br>
                </form>
            </div>
            <?php

        }else if($_GET['action'] == 'modifyAndDelete'){

            $select = $bdd->prepare("SELECT * FROM benutzer ");
            $select->execute();

            while($s=$select->fetch(PDO::FETCH_OBJ)){

                echo $s->vorname;
                ?>
                <a href="?action=modify&amp;id=<?php echo $s->id; ?>">Ändern</a>
                <a href="?action=delete&amp;id=<?php echo $s->id; ?>">Löschen</a><br>
                <?php
            }

        }else if($_GET['action']== 'modify'){

            $id = $_GET['id'];

            $select = $bdd->prepare("SELECT * FROM benutzer WHERE id = $id; ");
            $select->execute();

            $data = $select->fetch(PDO::FETCH_OBJ);

            ?>

            <div>
                <h1>Daten ändern</h1>
                <form action="" method="POST"><br>
                    <label>Anrede</label><br>
                    <input value="<?php echo $data->anrede; ?>" type="text" name="anredeB" id="anredeB"><br>
                    <label>Vorname</label><br>
                    <input value="<?php echo $data->vorname; ?>" type="text" name="vornameB" id="vorameB"><br>
                    <label>Nachname</label><br>
                    <input value="<?php echo $data->nachname; ?>" type="text" name="nachnameB" id="nachnameB"><br>
                    <label>Passwort</label><br>
                    <input type="password" name="passwordB" id="passwordB"><br>
                    <label>E-mail-Adresse</label><br>
                    <input value="<?php echo $data->email; ?>" type="email" name="emailB" id="emailB"><br>
                    <label>Tel</label><br>
                    <input value="<?php echo $data->tel; ?>" type="tel" name="telB" id="telB"><br>
                    <label>Zugriffsprofil</label><br>
                    <input value="<?php echo $data->zugriffsprofil; ?>" type="text" name="zugriffsprofilB" id="zugriffsprofilB"><br>
                    <label>Personalnummer</label><br>
                    <input value="<?php echo $data->personalnummer; ?>" type="number" name="personalnummerB" id="personalnummerB"><br><br>
                    <input type="submit" value="Änderung speichern" name="submitB" id="submitB"><br><br>
                </form>
            </div>

            <?php

            if(isset($_POST['submitB'])){

                $anredeB = $_POST['anredeB'];
                $vornameB = $_POST['vornameB'];
                $nachnameB = $_POST['nachnameB'];
                $passwordB = $_POST['passwordB'];
                $emailB = $_POST['emailB'];
                $telB = $_POST['telB'];
                $personalnummerB = $_POST['personalnummerB'];
                $zugriffsprofilB = $_POST['zugriffsprofilB'];


                $update = $bdd->prepare("UPDATE benutzer SET anrede = '$anredeB', vorname = '$vornameB', nachname = '$nachnameB', email = '$emailB', tel = '$telB', zugriffsprofil = '$zugriffsprofilB', personalnummer = '$personalnummerB' WHERE id = $id");
                $update->execute();

                header('Location: admin.php?action=modifyAndDelete');

            }


        }else if($_GET['action']== 'delete'){

            $id = $_GET['id'];
            $delete = $bdd->prepare("DELETE FROM benutzer WHERE id = $id");
            $delete->execute();

        }else{

            die('error');
        }
    }else{

    }
}else{

    header('Location: ../index.php');
}

?>




<?php include"include/header.php"; ?>

<div class="mitarbeiterDaten">
    <h1>Benutzer</h1><br>

    <h4>Anrede</h4>
    <p><?php echo $_SESSION['anrede']; ?></p>
    <br>

    <div class="nameContainer">
        <div id="Vorname">
            <h4>Vorname : </h4>
            <p><?php echo $_SESSION['vorname']; ?></p>
        </div>
        <div id="Nachname">
            <h4>Nachname : </h4>
            <p><?php echo $_SESSION['nachname']; ?></p>
        </div>
    </div>

    <br>
    <h4>Personal-Nummer  </h4>
    <p><?php echo $_SESSION['personalnummer']; ?></p>
    <br>

    <h4>E-Mail  </h4>
    <p><?php echo $_SESSION['email']; ?></p>
    <br>

    <h4>Tel-nummer  </h4>
    <p><?php echo $_SESSION['tel']; ?></p>
    <br>

    <h4>Zugriffsprofil </h4>
    <p><?php echo $_SESSION['zugriffsprofil']; ?></p>
</div>

<div class="mitarbeiterUrlaub">
    <h1>Akutueller Saldo</h1><br>
    <span>Total Urlaub: 31</span>
    <br>
    <p>Total Urlaubtage: <span>31 Tage</span></p>
    <p>Schon genommen: <span>11 Tage</span></p>
    <p>Resturlaub: <span>9 Tage</span></p>
</div>

<?php

include"include/responsivRecht.php";
include"include/responsivLink.php";
include"include/footer.php";

?>

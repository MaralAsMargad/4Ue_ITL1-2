<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Ue_ITL1-2</title>
</head>

<body>
    <h1>Kalorienrechner</h1>

    <?php

    if (isset($_GET["geschlecht"]) && isset($_GET["alter"]) && isset($_GET["gewicht"]) && isset($_GET["größe"])) {
        $geschlecht = $_GET["geschlecht"];
        $alter = $_GET["alter"];
        $gewicht = $_GET["gewicht"];
        $größe = $_GET["größe"];

        if ($geschlecht == "mann") {
            $kalorien = 66.47 + (13.7 * $gewicht) + (5 * $größe) - (6.8 * $alter);
        } else if ($geschlecht == "frau") {
            $kalorien = 655.1 + (9.6 * $gewicht) + (1.8 * $größe) - (4.7 * $alter);
        }
    }
    ?>

    <form action="/kalorienrechner.php">
        <div style="display: grid; grid-template-columns: 150px auto; row-gap: 10px;">

            <label for="geschlecht">Geschlecht:</label>
            <select name="geschlecht" id="geschlecht" style="width: 150px;">
                <option value="mann">Mann</option>
                <option value="frau">Frau</option>
            </select>

            <label for="alter">Alter:</label>
            <input type="number" name="alter" id="alter" required style="width: 150px;">

            <label for="gewicht">Gewicht (kg):</label>
            <input type="number" name="gewicht" id="gewicht" required style="width: 150px;">

            <label for="größe">Größe (cm):</label>
            <input type="number" name="größe" id="größe" required style="width: 150px;">
        </div>

        <br>
        <input type="submit" value="berechnen">
    </form>

    <?php
    if (isset($kalorien)) {
        echo "<h2>Dein Grundumsatz beträgt: " . round($kalorien) . " Kalorien pro Tag.</h2>";
    }
    ?>
    <br>

    <h1>PAL Faktor</h1>

    <?php

    if (isset($_GET["sitzen"]) && isset($_GET["büro"]) && isset($_GET["gehen"])) {
        $sitzen = $_GET["sitzen"];
        $büro = $_GET["büro"];
        $gehen = $_GET["gehen"];

        $summe = $sitzen + $büro + $gehen;

        if ($summe < 24) {
            $schlaf = 24 - $summe;
        } else {
            $schlaf = 0;
        }

        $tägKalorien = (($sitzen * 1.2) + ($büro * 1.45) + ($gehen * 1.85) + ($schlaf * 0.95)) / 24;
    }
    ?>

    <form action="" method="get">
        <div style="display: grid; grid-template-columns: 150px auto; row-gap: 10px;">
            <label for="sitzen">Sitzen (Stunden):</label>
            <input type="number" name="sitzen" id="sitzen" required style="width: 150px;">

            <label for="büro">Büro (Stunden):</label>
            <input type="number" name="büro" id="büro" required style="width: 150px;">

            <label for="gehen">Gehen (Stunden):</label>
            <input type="number" name="gehen" id="gehen" required style="width: 150px;">
        </div>

        <br>
        <input type="submit" value="berechnen">
    </form>

    <?php
    if (isset($tägKalorien)) {
        echo "<h2>Dein täglicher Kalorienbedark beträgt: " . round($tägKalorien, 2) . " Kalorien pro Tag.</h2>";
        echo "<p>Schlafenszeit: " . $schlaf . " Stunden pro Tag.</p>";
    }
    ?>

</body>

</html>
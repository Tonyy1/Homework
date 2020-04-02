<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Převod jednotek</title>
    <link href="css\style.css" rel="stylesheet">
</head>
<?php
if (isset($_POST["calc"]))
{
        $strKrych = $_POST["strKrych"];
        $milMtr = $_POST["milMtr"];
        $mps = $_POST["mps"];
        $krychPov = 6 * ($strKrych * $strKrych);
        $krychObj = $strKrych * $strKrych * $strKrych;
        $mmTocm = $milMtr / 10;
        $mpsToKph = $mps * (3.6);
}
?>
<body>
    <main>
        <form action="prevod.php" method="post">
            <h1>Převody jednotek a výpočet povrchu a objemu Krychle</h1>
                <ul>
                        <h2>Výpočet S a V krychle</h2>
                        <li><input type="number" name = "strKrych" placeholder="Zadejte stranu krychle (v cm)" min = "0"></li>
                        <h2>Převod mm na Cm</h2>
                        <li><input type="number" name = "milMtr" placeholder="Zadjte hodnotu v mm" min = "0"></li>
                        <h2>Převod m/s na Km/h</h2>
                        <li><input type="number" name = "mps" placeholder="Zadjte hodnotu v m/s" min = "0"></li>
                        <li><input type="submit" name = "calc" value="Vypočítat"></li>
                </ul>

<div class="wrap">
	<div class="cube">
		<div class="front"></div>
		<div class="back"></div>
		<div class="top"></div>
		<div class="bottom"></div>
		<div class="left"></div>
		<div class="right"></div>
	</div>
</div>

        </form>
        <div class = "output">
            <?php
                if (isset($_POST["calc"])) {
                    if (isset($_POST["strKrych"])) {
                        echo "Povrch krychle je: " . $krychPov . "cm²" . '<br>';
                        echo "Objem krychle je: " . $krychObj . "cm³" . '<br>';
                    }
                    if (!isset($_POST["strKrych"])) {
                    echo "Nezadána hodnota pro výpočet S a V Krychle";
                    } 
                    if (isset($_POST["milMtr"])) {
                        echo $milMtr. "mm je " . $mmTocm . "cm" . '<br>';
                    } else {
                    echo "Nezadána hodnota pro převod mm na cm";   
                    }
                    if (isset($_POST["milMtr"])) {
                        echo $mps . "m/s je: " . $mpsToKph . "Km/h" . '<br>';
                    } else {
                    echo "Nezadána hodnota pro převod m/s na Km/h";   
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>
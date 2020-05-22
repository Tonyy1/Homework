<?php
"<!--Soubor s klíčovými funkcemi-->";

global $sql;
global $link;

"<!--Připojení k databázi, konfigurace zdroje login údajů-->";
$config = parse_ini_file('config.ini');
$link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

"<!--Funkce pro výpis souřadnic-->";
function Select($link)
{
    $sql = "SELECT id, name, latitude, longitude FROM place";
    $result = $link->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . "ID: " . $row["id"] . ", Název bodu: " . $row["name"] . ", Latitude: " . $row["latitude"] . ", Longitude: " . $row["longitude"] . "</p>" . "<br>";
    }
}

"<!--Funkce pro aktualizaci záznamů v tabulce-->";
function Update($link)
{
    if (isset($_POST["update"])) {
        $id = $_POST["ID"];
        $name = $_POST["Name"];
        $latitude = $_POST["Latitude"];
        $longitude = $_POST["Longitude"];
        $sql = "UPDATE place SET name = '$name', latitude = '$latitude', longitude = '$longitude' WHERE id='$id'";
        if (mysqli_query($link, $sql)) {
            echo "Záznam updated successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        return ($sql);
    }
}

"<!--Funkce pro odstranění záznamů v tabulce-->";
function Delete($link)
{
    if (isset($_POST["delete"])) {
        $id = $_POST["id2Del"];
        $sql = "DELETE FROM place WHERE id='$id'";
        if (mysqli_query($link, $sql)) {
            echo "Záznam deleted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        return ($sql);
    }
}

"<!--Funkce pro vkládání záznamů do tabulky-->";
function Insert($link)
{
    if (isset($_POST["submit"])) {

        $name = $_POST["name"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];

        // Check connection
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Attempt insert query execution
        $sql =  "INSERT INTO place (name, latitude, longitude) VALUES ('$name', '$latitude', '$longitude')";
        if (mysqli_query($link, $sql)) {
            echo "Záznamy added successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        return ($sql);
    }
}

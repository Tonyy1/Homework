<!DOCTYPE html>
<html lang="en">

<!--Hlavička, načtení CSS a fontu-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>Vkládání souřadnic do databáze</title>
</head>

<body>
    <!--Header-->
    <header>
        <h1>Vkládání souřadnic do databáze</h1>
        <hr>
    </header>
    <!--Main-->
    <main>
        <!--Načtení souboru s funkcemi-->
        <?php
        require_once("functions.php");
        ?>
        <p class="nadpis">Název bodů a souřadnice z databáze</p>
        <!--Volání funkce pro výpis seznamu bodů se souřadnicemi-->
        <?php
        Select($link);
        ?>
        <p class="nadpis">Mazání dat z databáze</p>
        <!--Volání funkce pro odstranění záznamu bodů v databázi pomocí ID-->
        <form action="mapInsert.php" method="post">
            <?php
            Delete($link);
            ?>
            <!--Formulář #1-->
            <input name="id2Del" placeholder="Zadejte ID pro smazání" type="number">
            <input name="delete" type="submit">

            <br>

            <p class="nadpis">Update záznámů v tabulce</p>
            <!--Volání funkce pro aktualizaci záznamu bodů v databázi-->
            <?php
            Update($link);
            ?>
            <!--Formulář #2-->
            <input placeholder="Zadejte ID" name="ID" type="number">
            <input placeholder="Název" name="Name" type="text">
            <input placeholder="Latitude" name="Latitude" type="text">
            <input placeholder="Longitude" name="Longitude" type="text">
            <input name="update" type="submit">

            <br>

            <p class="nadpis">Vkládání záznamů do tabulky</p>
            <!--Volání funkce pro vložení záznamu bodů v databázi-->
            <?php
            Insert($link);
            ?>
            <!--Formulář #3-->
            <input name="name" placeholder="Název" type="text">
            <input name="latitude" placeholder="Latitude" type="text">
            <input name="longitude" placeholder="Longitude" type="text">
            <input name="submit" type="submit">
        </form>
    </main>
    <hr>
    <footer>
        <p>© 2020 Antonín Vojtěch a spol.</p>
    </footer>

</body>

</html>
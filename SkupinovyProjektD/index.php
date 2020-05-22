<!DOCTYPE html>
<html lang="en">

<!--Hlavička, načtení Javascriptu od Seznam.cz + načtení CSS a fontu-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interaktivní mapa | Seznam.cz API</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src="https://api.mapy.cz/loader.js"></script>
    <script>
        Loader.load()
    </script>
</head>

<body>
    <!--Header-->
    <header>
        <h1>Interektivní mapa</h1>
        <hr>
    </header>
    <!--Main-->
    <main>
        <h2>Název bodů a souřadnice z databáze</h2>
        <!--Načtení souboru s funkcemi-->
        <?php
        require_once("functions.php");

        "<!--Zavolání na výpis bodů + uložení výsledků z databáze do pole na pozdější potřebu-->";

        Select($link);
        $sql = "SELECT id, name, latitude, longitude FROM place";
        $result = $link->query($sql);
        if ($result) {
            $rowsNum = mysqli_num_rows($result);
        }

        while ($row = $result->fetch_assoc()) {
            $arrayLA[] = $row['latitude'];
            $arrayLO[] = $row['longitude'];
        }
        ?>
        <!--Samotný Javascript mapy-->
        <h3>Mapa</h3>
        <a href="mapInsert.php" target="_blank">Zadání dat do databáze</a>
        <div id="mapa"></div>
        <script type="text/javascript">
            "<!--Načtení souřadnice a následné využití indexu-->"
            var latitude = <?php echo json_encode($arrayLA[0]); ?>;
            var longitude = <?php echo json_encode($arrayLO[0]); ?>;
            var stred = SMap.Coords.fromWGS84(latitude, longitude);
            "<!--Vytvoření mapy s příslušnými parametry-->"
            var mapa = new SMap(JAK.gel("mapa"), stred, 10);

            "<!--Inicializace základní vrstvy mapy-->"
            mapa.addDefaultLayer(SMap.DEF_BASE).enable();
            mapa.addDefaultControls();

            "<!--For cyklus pro přidání bodů-->"
            <?php
            for ($i = 0; $i <= $rowsNum - 1; $i++) {
            ?>
                    "<!--Vytvoření vrstvy bodu-->"
                var pointerLayer = new SMap.Layer.Marker();
                mapa.addLayer(pointerLayer);
                pointerLayer.enable();

                "<!--Načtení souřadnic bodů a využití indexu pole-->"
                latitude = <?php echo json_encode($arrayLA[$i]); ?>;
                longitude = <?php echo json_encode($arrayLO[$i]) ?>;
                stred = SMap.Coords.fromWGS84(latitude, longitude);
                var options = {};
                var marker = new SMap.Marker(stred, "myMarker", options);
                "<!--Finální přidání bodu do vrstvy-->"
                pointerLayer.addMarker(marker);
            <?php } ?>
        </script>
    </main>
    <hr>
    <footer>
        <p>© 2020 Antonín Vojtěch a spol.</p>
    </footer>
</body>

</html>
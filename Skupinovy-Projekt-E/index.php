<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piškvorky (Tic Tac Toe)</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Tic Tac Toe (Piškvorky)</h1>
    </header>
    <main>
        <h2 id="idk"></h2>
        <form>
            <?php
            require_once("functions/functions.php");
            rowGen();
            ?>
            <input type="submit" onclick="newGame()" value="New Game">
            <script src="js/scripts.js"></script>
        </form>
    </main>
    <footer>
        <h3>© Antonín Vojtěch a spol.</h3>
    </footer>
</body>

</html>
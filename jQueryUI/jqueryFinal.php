<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JqueryUI - Registrační Formulář</title>
    <link rel="stylesheet" href="css/style-jquery.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <?php
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $birthDate = $_POST["birthDate"];
                $gender = $_POST["gender"];
                $email = $_POST["email"];
                $username = $_POST["username"];
                $password = $_POST["password"];

                echo "Jméno: " . $name . '<br>';
                echo "Příjmení: " . $surname . '<br>';
                echo "Datum Narození: " . $birthDate . '<br>';
                echo "Pohlaví: " . $gender . '<br>';
                echo "E-mail: " . $email . '<br>';
                echo "Username: " . $username . '<br>';
                echo "Heslo: " . $password . '<br>';
            } else {
            ?>
                <h1>Registrace</h1>
                <p>*Všechny údaje je povinné vyplnit</p>

                <form class="login-form" id="regform" action="jqueryFinal.php" method="POST">
                    <input type="text" placeholder="Jméno" name="name" id="name" required/>
                    <input type="text" placeholder="Příjmení" name="surname" id="surname" required/>
                    <input type="text" placeholder="Datum Narození" name="birthDate" id="flatpickr" required>
                    <select name="gender" id="gender" required>
                        <option value="" disabled selected>Pohlaví</option>
                        <option value="Muž">Muž</option>
                        <option value="Žena">Žena</option>
                        <option value="Jiné">Jiné</option>
                    </select>
                    <input type="email" placeholder="E-mail" name="email" id="email" required/>
                    <input type="text" placeholder="Uživatelské jméno" name="username" id="userName" required/>
                    <input type="password" placeholder="Heslo" name="password" id="password" required/>
                    <input type="password" placeholder="Zadejte heslo znovu" name="passwordAgain" id="passwordAgain" required/>
                    <input type="submit" class="btn" name="submit" id="submit" value="Registrovat" required>
                </form>
            <?php } ?>
            <script src="js/jquery.email-autocomplete.js"></script>
            <script src="js/scripts.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
            <script src="js/bootstrap-select.js"></script>
        </div>
    </div>
</body>

</html>
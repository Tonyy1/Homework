<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello there</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once 'VehicleModel.php';
    require_once 'htmlModel.php';

    $object = new Model;
    $htmlObject = new htmlModel;

    if (isset($_POST['delete_submit'])) {
        $ids = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
        $object->delete($ids);
    }
    if (isset($_POST['update_submit'])) {
        $update = $_POST['update'];
        $object->updateSubmit($update);
    }
    ?>
    <main>
        <h1>Txnyyho super simple správce thingy</h1>

        <!-- Show (select) sekce + generování-->
        <section>
            <h2>Show results</h2>
            <?php
            $htmlObject->optionGenerator("Vyberte ID pro zobrazení", "Zobrazit", "show");
            if (isset($_POST['show_submit'])) {
                $ids = filter_input(INPUT_POST, 'show', FILTER_VALIDATE_INT);
                $object->loadResults($ids);
            }
            ?>
        </section>

        <!-- Update/Insert sekce + generování-->
        <section>
            <h2>Update/Insert</h2>
            <?php
            $htmlObject->inputGenerator();
            ?>
        </section>

         <!-- Delete sekce + generování-->
        <section>
            <h2>Odstranit záznam z databáze</h2>
            <?php
            $htmlObject->optionGenerator("Vyberte ID pro smazání", "Odstranit", "delete");
            ?>
        </section>
    </main>
</body>

</html>
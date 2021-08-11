<?php
require_once 'VehicleModel.php';
class htmlModel
{

    private $object;

    // Načtení Id a řádků z tabulky, které se zde budou zpracovávat
    public function __construct()
    {
        $this->object = new Model;
        $this->options = $this->object->getIdsFromDatabase();
        $this->inputs =  $this->object->getColumnNames();
    }

    // Generátor option menu pro Show a Delete
    function optionGenerator($placeholder, $name, $action)
    {
        echo '<form action="" method="post">' . '<select name="' . $action . '"' .  " required>" . '<option value="">' . $placeholder . '</option>';
        for ($x = 0; $x <= count($this->options) - 1; $x++) {
            echo "<option value='" . implode($this->options[$x]) . "'>" . "ID: " . implode($this->options[$x]) . "</option>";
        }
        echo '</select>' . '<input type="submit" name="' . $action . '_submit" value="' . $name . '">' . '</form>';
    }

    // Zde mi nefungoval str_replace. Nezobrazoval zbytek stringu za "_", když jsem jej nahradil mezerou. EDIT: Už funguje :)
    function inputGenerator()
    {
        echo '<form action="" method="post">';
        for ($x = 0; $x <= count($this->inputs) - 1; $x++) {
            echo "<input type=" . 'text' . ' name = ' . "update" . "[]" . ' placeholder = ' . '"' . str_replace("_", " ", ucwords($this->inputs[$x])) . '"' . '>';
        }
        echo '<input type="submit" name="update_submit" value="Odeslat">' . '</form>';
    }

    // Zobrazí výsledky z databáze
    function show($input)
    {
        echo "<p>" . $input . "</p>";
    }
}

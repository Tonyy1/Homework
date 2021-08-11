<?php
require_once 'MySqlDriver.php';
require_once 'htmlModel.php';

class Model
{
    // Načtení "raw" výsledků z databáze
    public function loadResults($id)
    {
        $result = DB::fetchQueryToArray("SELECT * FROM vehicle WHERE id = $id");
        $this->extractResults($result);
        return $result;
    }

    // Update query
    public function update($content, $columns, $other)
    {
        DB::query("INSERT INTO vehicle ($columns) VALUES ($other) ON DUPLICATE KEY UPDATE $content");
        return;
    }

    // Delete query
    public function delete($id)
    {
        DB::query("DELETE FROM vehicle WHERE id = $id");
    }

    // Zpracování "raw" výsledků do použitelnější podoby
    public function extractResults($array)
    {
        $object = new htmlModel; //Prasárna, já vím, ale jinak jsem to nevymyslel, aby HTML a zpracování dat zůstalo odděleně
        foreach ($array[0] as $key => $value) {
            $object->show(str_replace("_", " ", ucwords($key)) . ": " . $value);
        }
        return;
    }

    // Získá Id z databáze pro option menu
    public function getIdsFromDatabase()
    {
        $result = DB::fetchQueryToArray("SELECT id FROM vehicle");
        return $result;
    }

    // Submit Update(u)
    public function updateSubmit($update)
    {
        $columns = $this->getColumnNames();
        $content = array_combine($this->getColumnNames(), $update);
        $content = array_filter($content, fn ($value) => !is_null($value) && $value !== '');
        $other = $update;
        foreach ($other as $key => $value) {
            $other[$key] = "'" . $value . "'";
        }
        foreach ($content as $key => $value) {
            $content[$key] = $key . " = " . "'" . $value . "'";
        }
        $content = implode(", ", $content);
        $columns = implode(", ", $columns);
        $other = implode(", ", $other);
        $this->update($content, $columns, $other);
    }

    // Získá názvy řádků v tabulce
    public function getColumnNames()
    {
        $result = "SHOW COLUMNS FROM vehicle";

        $res = DB::query($result);

        while ($row = $res->fetch_assoc()) {
            $columns[] = $row['Field'];
        }
        return $columns;
    }
}

<?php
function rowGen()
{
    $cycleCount = 0;
    for ($x = 0; $x <= 2; $x++) {

        for ($y = 0; $y <= 2; $y++) {
            $cycleCount = $cycleCount + 1;
            echo '<input type="button" class = "boxeek" id = "' . $cycleCount . '" onclick = "changeValue(this.id)" value="-">';
        }
        echo '<br>';
    }
}
?>

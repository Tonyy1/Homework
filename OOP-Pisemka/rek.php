<?php

class Neco
{
    public $nerad = 0;
    public $count = 0;


    //Kdo ví
    
    function uloha1()
    {
        $p = [];
        $p[3][5] = true;
        var_dump($p);
        echo '<br>';
    }

    //Seřazení pole

    function uloha2()
    {
        $p1 = [4, 2, 1, 3];
        $q = sort($p1);
        for ($z = 0; $z < count($p1); $z++) {
            echo $p1[$z] . " ";
        }
        echo '<br>';
    }

    //Výpočet průměru

    function avg($x, $y, $z): float
    {
        if ($y == NULL && $z == NULL) {
            $result = $x / 1;
            echo $result . '<br>';
            return $result;
        } elseif ($z == NULL) {
            $result = ($x + $y) / 2;
            echo $result . '<br>';
            return $result;
        } else {
            $result = ($x + $y + $z) / 3;
            echo $result . '<br>';
            return $result;
        }
    }

    //Nerekurzivní

    function part1($n): int
    {
        $use = 1;
        for ($l = 0; $l < $n; $l++) {
            $result1 = $use * ($l + 1);
            $use = $result1;
            if ($l == $n - 1) {
                echo $result1 . '<br>';
                return $result1;
            }
        }
    }

    //Rekurzivní

    function part2($m): int
    {
        if ($this->count == 0) {
            $this->nerad = $m - 1;
        }

        $result1 = $m * ($this->count + 1);
        $this->count += 1;
        if ($this->count == $this->nerad) {
            echo $result1 . '<br>';
        } else {
            $this->part2($result1, $this->count);
        }
        return $result1;
    }
}

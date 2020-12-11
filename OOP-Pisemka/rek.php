<?php

class Neco
{
    //Kdo ví

    function uloha1()
    {
        $p = [];
        $p[3][5] = true;
        var_dump($p);
        echo '<br>';
    }

    //Obrácení pole

    function uloha2()
    {
        $p = [4, 2, 1, 3, 6];
        echo implode(",", (array_reverse($p))) . '<br>';
    }

    //Výpočet průměru

    function avg($x, $y, $z): float
    {
        $p = [$x, $y, $z];
        $p = array_filter($p);
        $result = array_sum($p) / count($p);
        return $result;
    }

    //Nerekurzivní

    function part1($n): int
    {
        $use = 1;
        if ($n <= 1) {
            return 1;
        } else {
            for ($l = 0; $l < $n; $l++) {
                $result = $use * ($l + 1);
                $use = $result;
                if ($l == $n - 1) {
                    return $result;
                }
            }
        }
    }

    //Rekurzivní

    function part2($m): int
    {
        if ($m <= 1) {
            return 1;
        } else {
            return $m * $this->part2($m - 1);
        }
    }
}

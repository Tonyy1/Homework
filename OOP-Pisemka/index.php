<?php
include ('rek.php');

$objekt = new Neco();
// Ú1
$objekt->uloha1();
// Ú2
$objekt->uloha2();
// Ú3
echo $objekt->avg(3,5,10) . '<br>';
// Ú4 -> part 1 a 2 
echo $objekt->part1(6) . '<br>';
echo $objekt->part2(5);

<?php 
$a = 5;
$b = &$a;
//unset($a);
$b = 6; 

var_dump($a);
var_dump($b);


$resultado;

$resultado = ("0" == 1);


$a = array(1,2,3);
$b = array(1,1,1,4,5);
$c = $b + $a;

var_dump($c);


$s1 = "12";
$s2 = "1";

echo $s1 + $s2;

$s1 = 12;
$s2 = 1;


echo $s1 . $s2;


$a1 = array(1, 2, 3);
foreach ($a1 as &$value) {
 $value = $value + 1;
} 

echo "<br>";



var_dump($a1);

$arr1 = array(0=>2,1=>4,2=>6,3=>8);
$arr2 = array(1=>4,3=>8,0=>2,2=>6);


var_dump ($arr1 === $arr2);


 ?>
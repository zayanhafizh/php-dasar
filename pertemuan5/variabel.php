<?php 
//Variable scope
$x = 10; //local var

function tampilX() {
    echo $x;
}

function tampilX1() {
    $x = 20; //local var in func
    echo $x;
}

function tampilX2() {
    global $x; //mencari variabel x diluar func
    echo $x;
}

tampilX(); //undefined karena variabel x tidak diketahui di dalam function

echo "<br>";

echo $x; //mencetak 10

echo "<br>";

tampilX1(); //mencetak 20

echo "<br>";

tampilX2(); //mencetak 10




?>
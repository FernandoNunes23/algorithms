<?php

require_once("HeapSort.php");

$array = [20,80,32,12,1,35,45,121,3,12,121,80];

$heapSort = new HeapSort($array);

foreach ($heapSort->heapSort() as $k => $a) {
    print("Value: " . $a . " ||  ");
}
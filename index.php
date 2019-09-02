<?php

require_once("HeapSort.php");

$array = [20,80,32,12,1,35,45,121,3];

$heapSort = new HeapSort($array);

foreach ($heapSort->heapSort() as $k => $a) {
    print("Value: " . $a . " ||  ");
}
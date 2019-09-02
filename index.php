<?php

require_once("HeapSort.php");
require_once("BinarySearch.php");

$array = [20,80,32,12,1,35,45,121,3,12,121,80];

$heapSort = new HeapSort($array);

$orderedArray = $heapSort->heapSort();

foreach ($orderedArray as $k => $a) {
    print("Value: " . $a . " ||  ");
}

$binarySearch = new BinarySearch($orderedArray);
$result = $binarySearch->search(0, (count($orderedArray) - 1), 80);

print('Result: ' . $result);

<?php

require_once("HeapSort.php");
require_once("QuickSort.php");
require_once("BinarySearch.php");

$array = [];

$time_start = microtime(true);

for ($i = 0; $i <= 100000; $i++) {
    $array[$i] = rand(-100000, 100000);
}

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<b>Total Execution Time Populating Array:</b> <br>'.number_format((float) $execution_time, 10).' secs';

$quickSort = new QuickSort();

$time_start = microtime(true);

$orderedArray = $quickSort->sort($array);

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<br><b>Total Execution Time Quick Sorting:</b> <br>'.number_format((float) $execution_time, 10).' secs';

$sort = new HeapSort($array);

$time_start = microtime(true);

$orderedArray = $sort->heapSort();

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<br><b>Total Execution Time Heap Sorting:</b> <br>'.number_format((float) $execution_time, 10).' secs';

$binarySearch = new BinarySearch($orderedArray);

$time_start = microtime(true);

$result = $binarySearch->search(0, (count($orderedArray) - 1), 3);

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<br><b>Total Execution Time Binary Search:</b> <br>'.number_format((float) $execution_time, 10).' secs <br>';


print('Result: ' . $result);
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Sorting
require_once("HeapSort.php");
require_once("QuickSort.php");
require_once("CountingSort.php");
require_once("MergeSort.php");
require_once("BubbleSort.php");

//Search
require_once("BinarySearch.php");

//Recursion
require_once("Backtracking.php");

$backTracking = new Backtracking();

$sudoku = [
    [5,3,0,0,7,0,0,0,0],
    [6,0,0,1,9,5,0,0,0],
    [0,9,8,0,0,0,0,6,0],
    [8,0,0,0,6,0,0,0,3],
    [4,0,0,8,0,3,0,0,1],
    [7,0,0,0,2,0,0,0,6],
    [0,6,0,0,0,0,2,8,0],
    [0,0,0,4,1,9,0,0,5],
    [0,0,0,0,8,0,0,7,9]
];

var_dump($backTracking->solveSudoku($sudoku));exit;

function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

$array = [];

$n = 1000000;

echo $n . '<br>';

$time_start = microtime(true);

for ($i = 0; $i <= $n; $i++) {
    $array[$i] = rand(-100000, 100000);
}

echo '<br>' . convert(memory_get_usage(true)) . '<br>';

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<b>Total Execution Time Populating Array:</b> <br>'.number_format((float) $execution_time, 10).' secs';

$quickSort = new QuickSort();

$time_start = microtime(true);

$orderedArray = $quickSort->sort($array);

echo '<br>' . convert(memory_get_usage(true)) . '<br>';

$time_end = microtime(true);
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);
//execution time of the script
echo '<br><b>Total Execution Time Quick Sorting:</b> <br>'.number_format((float) $execution_time, 10).' secs';

//$sort = new HeapSort($array);

$time_start = microtime(true);

//$orderedArray = $sort->heapSort();

echo '<br>' . convert(memory_get_usage(true)) . '<br>';

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

echo '<br> Memory peak: ' . convert(memory_get_peak_usage(true)) . '<br>';
print('Result: ' . $result);
<?php


class SelectionSort
{
    /**
     * Return Minimun Swaps using Selection Sort Algorithm O(N²)
     * @param $arr
     * @return int
     */
    public function minimumSwaps($arr) {
        $counter = 0;

        for ($i = 0; $i < count($arr); $i++) {
            $changed = false;
            $tmpIndex = 0;
            $tmpValue = $arr[$i];

            for ($j = $i+1; $j < count($arr); $j++) {
                if ($tmpValue > $arr[$j]) {
                    $changed = true;
                    $tmpIndex = $j;
                    $tmpValue = $arr[$j];
                }
            }

            if ($changed == true) {
                $arr[$tmpIndex] = $arr[$i];
                $arr[$i] = $tmpValue;
                $counter++;
            }
        }

        return $counter;
    }
}
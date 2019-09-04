<?php


class QuickSort
{
    public function sort($array)
    {
        $loe = array();
        $gt  = array();

        if (count($array) < 2) {
            return $array;
        }

        $pivot_key = key($array);
        $pivot = array_shift($array);

        foreach ($array as $val) {

            if ($val <= $pivot) {
                $loe[] = $val;
            } elseif ($val > $pivot) {
                $gt[] = $val;
            }
        }

        return array_merge(
            $this->sort($loe),
            array($pivot_key => $pivot),
            $this->sort($gt)
        );
    }
}
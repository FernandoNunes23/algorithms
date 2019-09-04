<?php


class BinarySearch
{
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function search($offset, $limit, $searchParam)
    {
        if ($limit >= $offset) {
            $mid = ceil($offset + ($limit - $offset) / 2);

            if ($this->array[$mid] == $searchParam) {
                return floor($mid);
            }

            if ($this->array[$mid] > $searchParam) {
                return $this->search($offset, $mid - 1, $searchParam);
            }

            return $this->search($mid + 1, $limit, $searchParam);
        }

        return -1;
    }
}
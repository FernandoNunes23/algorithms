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
        if ($limit >= $offset)
        {
            $mid = ceil($offset + ($limit - $offset) / 2);

            // If the element is present
            // at the middle itself
            if ($this->array[$mid] == $searchParam)
                return floor($mid);

            // If element is smaller than
            // mid, then it can only be
            // present in left subarray
            if ($this->array[$mid] > $searchParam)
                return $this->search($offset, $mid - 1, $searchParam);

            // Else the element can only
            // be present in right subarray
            return $this->search($mid + 1, $limit, $searchParam);
        }

        // We reach here when element
        // is not present in array
        return -1;
    }
}
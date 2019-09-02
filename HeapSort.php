<?php


class HeapSort
{
    private $heap;
    private $size;

    public function __construct(array $inputArray)
    {
        $this->heap = $inputArray;
        $this->size = count($this->heap);
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function peek()
    {
        if ($this->size == 0) {
            return false;
        }

        return $this->heap[0];
    }

    // Remove item with max key
    public function remove()
    {
        $root = $this->heap[0];
        // put last element into root
        $this->heap[0] = $this->heap[--$this->size];
        $this->bubbleDown(0);
        return $root;
    }

    private function bubbleDown(int $index)
    {
        $largerChild = null;
        $root = $this->heap[$index];

        while ($index <= $this->getMidIndex()) {
            $largerChild = $this->getLeftChildIndex($index);

            if ($this->hasRightChild($index) && $this->getRightChild($index) > $this->getLeftChild($index)) {
                $largerChild = $this->getRightChildIndex($index);
            }

            if ($root >= $this->heap[$largerChild]) {
                break;
            }

            $this->swap($index, $largerChild);
            $index = $largerChild;
        }
    }

    public function heapSort()
    {
        for ($j = ($this->getMidIndex()) - 1; $j >= 0; $j--)
        {
            $this->bubbleDown($j);
        }

        // sort the heap
        for ($j = ($this->size - 1); $j >= 0; $j--) {
            $biggestValue = $this->remove();
            //var_dump($biggestValue);
            // use same nodes array for sorted elements
            $this->heap[$j] = $biggestValue;
        }

        return $this->heap;
    }

    /**
     * Return the middle index of the heap
     *
     * @return float
     */
    private function getMidIndex()
    {
        return floor($this->size / 2);
    }

    private function swap(int $indexOne, int $indexTwo)
    {
        $temp = $this->heap[$indexOne];
        $this->heap[$indexOne] = $this->heap[$indexTwo];
        $this->heap[$indexTwo] = $temp;
    }

    private function getLeftChildIndex(int $parentIndex)
    {
        return 2 * $parentIndex + 1;
    }

    private function getRightChildIndex(int $parentIndex)
    {
        return 2 * $parentIndex + 2;
    }

    private function getParentIndex(int $childIndex)
    {
        return ($childIndex - 1) / 2;
    }

    private function hasLeftChild(int $index)
    {
        return $this->getLeftChildIndex($index) < $this->size;
    }

    private function hasRightChild(int $index)
    {
        return $this->getRightChildIndex($index) < $this->size;
    }

    private function hasParent(int $index)
    {
        return $this->getParentIndex($index) >= 0;
    }

    private function getLeftChild (int $index)
    {
        return $this->heap[$this->getLeftChildIndex($index)];
    }

    private function getRightChild (int $index)
    {
        return $this->heap[$this->getRightChildIndex($index)];
    }

    private function parent (int $index)
    {
        return $this->heap[$this->getParentIndex($index)];
    }
}
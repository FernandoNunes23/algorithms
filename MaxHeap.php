<?php


class MaxHeap
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

    public function remove()
    {

    }

    public function add()
    {

    }

    private function heapifyDown()
    {

    }

    private function heapifyUp()
    {

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
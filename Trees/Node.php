<?php


class Node
{
    /**
     * @var Node
     */
    private $left;

    /**
     * @var Node
     */
    private $right;

    /**
     * @var int
     */
    private $data;

    public function __construct (int $data)
    {
        $this->data = $data;
    }

    public function insert (int $value)
    {
        if ($value <= $this->data) {
            if ($this->left == null) {
                $this->left = new Node($value);
            } else {
                $this->left->insert($value);
            }
        } else {
            if ($this->right == null) {
                $this->right = new Node($value);
            } else {
                $this->right->insert($value);
            }
        }
    }

    public function contains (int $value): bool
    {
        if ($value == $this->data) {
            return true;
        }

        if ($value < $this->data) {
            if ($this->left == null) {
                return false;
            }

            return $this->left->contains($value);
        }

        if ($this->right == null) {
            return false;
        }

        return $this->right->contains($value);
    }

    public function printInOrder()
    {
        if ($this->left != null) {
            $this->left->printInOrder();
        }

        echo $this->data . " | ";

        if ($this->right != null) {
            $this->right->printInOrder();
        }
    }
}
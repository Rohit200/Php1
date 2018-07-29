<?php
class Stack
{
    public $stack;
    public $size;
    public $front;

    public function __construct($size = 200)
    {
        $this->stack = array();
        $this->size = $size;
        $this->front = 0;
    }

    public function push($data)
    {
        if ($this->front < $this->size) {
            $this->stack[$this->front] = $data;
            $this->front++;

        } else {
            echo "Stack is full \n";

        }
    }
    public function pop()
    {
        if ($this->isEmpty()) {
            echo "Stack is empty \n";

        } else {
            return array_pop($this->stack);
        }
    }
    public function isEmpty()
    {
        if (count($this->stack) == 0) {
            return true;
        } else {
            return false;
        }

    }
    public function peek()
    {
        return array_shift($this->stack);
    }

}
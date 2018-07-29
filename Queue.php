<?php
class Queue
{
    public $queue;
    public $size;
    public $rear;
    public $front;
    public function __construct($size = 200)
    {
        $this->queue = array();
        $this->size = $size;
        $this->rear = 0;
        $this->front = 0;
    }
    public function enqueue($data)
    {
        if ($this->rear < $this->size) {
            $this->queue[$this->rear] = $data;
            $this->rear++;
        } else {
            echo "Queue is full \n";
        }

    }
    public function dequeue()
    {
        if ($this->front < $this->size) {

            return array_shift($this->queue);
        }
    }
    public function isEmpty()
    {
        if (count($this->queue) == 0) {
            return true;
        } else {
            return false;
        }

    }
}
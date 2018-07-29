<?php
class Node
{
    public $data;
    public $next;
  
    public function __construct($data)
    {
      $this->data=$data;
      $this->next=NULL;
     
    }
    public function readNode()
    {
        return $this->data;
    }
    public function dump() {
        if ($this->left !== null) {
            $this->left->dump();
        }
        var_dump($this->value);
        if ($this->right !== null) {
            $this->right->dump();
        }
    }
}
?>
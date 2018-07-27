<?php
include 'Node.php';
class LinkedList
{
    public $firstNode;
    public $lastNode;
    public $count;
    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }
    public function addLast($data)
    {
        if ($this->firstNode != null) {
            $link = new Node($data);
            $this->lastNode->next = $link;
            $link->next = null;
            $this->lastNode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    public function insertFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;
        if ($this->lastNode == null) {
            $this->lastNode = &$link;
        }
        $this->count++;
    }
    public function display()
    {
        $node = $this->firstNode;
        while ($node != null) {
            echo $node->readNode() . "\n";
            $node = $node->next;
        }
    }
    public function get($index)
    {
        $node = $this->firstNode;
        $r = 0;
        for ($i = 0; $i < $index; $i++) {
            if ($i == $index - 1) {
                $r = $node->data;
            }
            $node = $node->next;
        }
        return $r;
    }
    public function size()
    {
        return $this->count;
    }
    public function search($data1)
    {
        $node = $this->firstNode;
        while ($node != null) {
            if ($node->readNode() == $data1) {
                break;
            }
            $node = $node->next;
        }
        if ($node == null) {
            return false;
        } else {
            return true;
        }

    }
    public function searchString($data1)
    {
        $node = $this->firstNode;
        while ($node != null) {
            if (strcmp($node->readNode(),$data1)==0) {
                break;
            }
            $node = $node->next;
        }
        if ($node == null) {
            return false;
        } else {
            return true;
        }

    }

    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;
   for($i=1;$i<=$this->count;$i++)
   {
        while ($current->readNode() != $key) {
            if ($current->next == null) {
                return null;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstNode) {
            $this->firstNode = $this->firstNode->next;
        } else {
            $previous->next = $current->next;
        }
    }
    }
    public function sort() {
		if ( $this->firstNode != NULL &&  $this->firstNode->next != NULL  ) {
				for ( $i = 0; $i < $this->count; $i++ ) {
					$temp = NULL;
					$current = $this->firstNode;
					while ( $current != NULL ) {
						if ( $current->next != NULL && $current->data > $current->next->data ) {
							$temp = $current->data;
							$current->data = $current->next->data;
							$current->next->data = $temp;
						}
						$current = $current->next;
					
				}
			}
		}
	}
}
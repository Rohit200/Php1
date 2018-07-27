<?php
class card
{
    public $suits;
    public $ranks;

    public function __construct()
    {
        $this->suits=array("Clubs", "Diamonds", "Hearts", "Spades");
        $this->ranks=array("2", "3", "4", "5", "6", "7", "8", "9", "10", 
        "Jack", "Queen", "King", "Ace");
    }
}
?>

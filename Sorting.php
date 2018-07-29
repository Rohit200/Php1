<?php
include 'Utility.php';
include 'Linkedlist.php';
include 'Queue.php';
$u1=new Utility();
$a=$u1->sortofcard();
$l1=new LinkedList();
$q1=new Queue();
for($i=0;$i<sizeof($a);$i++)
{
    $k=$i+1;
    $s=$k." player cards\n";
    $l1->addLast($s);
    for($j=0;$j<sizeof($a[$i]);$j++)
    {
        $l1->addLast($a[$i][$j]);
    }
}
for($i=1;$i<=$l1->size();$i++)
{
    $q1->enqueue($l1->get($i));
}
for($i=1;$i<=$q1->rear;$i++)
{
    echo $q1->dequeue();
    echo "\n";
}
?>
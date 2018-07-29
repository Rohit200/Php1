<?php
include 'Linkedlist.php';
include 'Stack.php';
$l1=new LinkedList();
$s1=new Stack();
$filecontent=file_get_contents("rohit.json");
$json=json_decode($filecontent,true);
for($i=1;$i<sizeof($json);$i++)
{
   $k=$json[$i]["Symbol"];
   $l1->addLast($k);
}
$n1=$l1->size();
for($i=1;$i<=$n1;$i++)
{
    $k=$l1->get($i);
    $s1->push($k);
}
for($i=0;$i<$n1;$i++)
{
    echo $s1->pop()."\n";
}
?>
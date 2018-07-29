<?php
include 'Linkedlist.php';
$filecontent=file_get_contents("Stock.json");
$json=json_decode($filecontent);
$l1=new LinkedList();
for($i=0;$i<sizeof($json);$i++)
{
    $k=$json[$i];
$l1->addLast($k);
}
for($i=1;$i<=$l1->size();$i++)
{
    $k=$l1->get($i);
    print_r($k);
}

?>
<?php
include 'Linkedlist.php';
$filecontent=file_get_contents("inventory1.json");
$json=json_decode($filecontent);
$l1=new LinkedList();
for($i=0;$i<sizeof($json);$i++)
{
    $k=$json['Rice'];
$l1->addLast($k);
}
$l1->display();

?>
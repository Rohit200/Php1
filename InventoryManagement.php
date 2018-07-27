<?php
require 'Utility.php';
require 'Inventory.php';
$u1=new Utility();
$i1=new Inventory();
echo "Enter the fIle name \n";
$str=$u1->getString();
if(is_numeric($str)!=1)
{
$filecontent=$i1->readFile($str);
$json=$i1->createObject($filecontent);
$i1->display($json);
}
else
echo "Enter the correct filename \n";
?>
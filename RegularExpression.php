<?php
include 'Utility.php';
$u1=new Utility();
$str= "Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx. 
Please,let us know in case of any clarification Thank you BridgeLabz 01-01-2016"; 
echo "Enter the first name \n";
$fname=$u1->getString();
echo "Enter the last name \n";
$lname=$u1->getString();
echo "Enter the mobile number \n";
$mobile=$u1->getString();
$str=$u1->regularExp($fname,$lname,$mobile,$str);
echo $str;
?>
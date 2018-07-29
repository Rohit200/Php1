<?php
$myfile=fopen("thane.json","w+");
$a=array('First name' => "Rohit",'Last name' => "Kumar");
$txt="[".$a."]";
fwrite($myfile,$txt);
?>
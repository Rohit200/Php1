<?php
$filecontent=file_get_contents("Thane.json");
$json=json_decode($filecontent);
$n=sizeof($json);
echo $n;
//delete("Thane.json")
?>
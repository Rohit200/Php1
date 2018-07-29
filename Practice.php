<?php
$id=1;
$title="rohit";
$content="------";
 $AdditionalArray = array(
    'id' => $id,
    'title' => $title,
    'content' => $content
    );
    $data_results = file_get_contents('practice.json');

    $tempArray = json_decode($data_results);
    //append additional json to json file
    $tempArray[]=$AdditionalArray;
    $jsonData = json_encode($tempArray);

file_put_contents('practice.json', $jsonData); 
?>
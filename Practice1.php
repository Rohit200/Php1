<?php
$jsonString = file_get_contents('rohit.json');
$data = json_decode($jsonString, true);

foreach ($data as $key => $entry) {
    if ($entry['Stock Symbol'] == $symbol) {
        $data[$key]['No of Share'] = $s1;
    }
}
$newJsonString = json_encode($data);
file_put_contents('rohit.json', $newJsonString);
?>
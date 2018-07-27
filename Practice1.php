<?php
$jsonString = file_get_contents('inven.json');
$data = json_decode($jsonString, true);


$data[0]['activity_name'] = "TENNIS";
// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
    if ($entry['activity_code'] == '1') {
        $data[$key]['activity_name'] = "TABLE TENNIS";
    }
}
    $data = json_encode([
       'data1' => 'hello',
        'data2' => 'world' ]);
File::append('inven.json', $data);

?>
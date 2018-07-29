<?php
include 'Queue.php';
include 'Linkedlist.php';
$q1 = new Queue();
$l1 = new LinkedList();
$filecontent = file_get_contents("rohit.json");
$json = json_decode($filecontent, true);
for ($i = 1; $i < sizeof($json); $i++) {
    $k = $json[$i]["Purchase date"];
    $l1->addLast($k);
    if ($json[$i]["Sold date"] != "00-00-00") {
        $k1 = $json[$i]["Sold date"];
        $l1->addLast($k1);
    }
}
for ($i = 1; $i <= $l1->size(); $i++) {
    $k = $l1->get($i);
    $q1->enqueue($k);
}
$n = $q1->rear;
for ($i = 0; $i < $n; $i++) {
    echo $q1->dequeue() . "\n";
}

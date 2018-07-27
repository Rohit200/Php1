<?php
include 'Linkedlist.php';
class StockAccount
{
    public function stockAccount1($filename)
    {
        $myfile = fopen($filename, 'w+');
    }
    public function valueof($amt)
    {
        $amt1 = $amt;
        return $amt1;
    }
    public function buy($amt, $symbol)
    {
        $l1 = new Linkedlist();
        $filecontent = file_get_contents("Stock.json");
        $filecontent1 = file_get_contents("rohit.json");
        $json = json_decode($filecontent, true);
        $json1 = json_decode($filecontent1, true);
        $n = sizeof($json);
        for ($i = 0; $i < $n; $i++) {
            $k = $json[$i]["Stock symbol"];
            if (strcmp($symbol, $k) == 0) {
                if ($amt <= $json1[0]["Balance"] && $amt >= $json[$i]["Each share Price"]) {
                    $amt1 = $json[$i]["Each share Price"];
                    $s1 = floor($amt / $amt1);
                    echo "You purchase " . $s1 . " share and amount left is " . $amt - ($s1 * $amt1) . "\n";
                } else {
                    echo "You have insufficient balance \n";
                }

            }

        }
    }
    public function sell($amt, $company)
    {
        $l1 = new Linkedlist();
        $filecontent = file_get_contents("rohit.json");
        $json = json_decode($filecontent, true);
        $n = sizeof($json);
        for ($i = 0; $i < $n; $i++) {
            $k = $json[$i]["share name"];
            $l1->addLast($k);
            $l1->display();
        }
    }
    public function printreport()
    {
        $filecontents = file_get_contents("rohit.json");
        $someobject = json_decode($filecontents);
        print_r($someobject);
    }
}

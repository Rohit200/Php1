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
    public function buy($amt, $symbol, $str)
    {
        $l1 = new Linkedlist();
        $filecontent = file_get_contents("Stock.json");
        $filecontent1 = file_get_contents($str);
        $json = json_decode($filecontent, true);
        $json1 = json_decode($filecontent1, true);
        $n = sizeof($json);
        for ($i = 0; $i < $n; $i++) {
            $k = $json[$i]["Stock symbol"];
            $s1 = 0;
            if (strcmp($symbol, $k) == 0) {
                if ($amt <= $json1[0]["Balance"] && $amt >= $json[$i]["Each share Price"]) {
                    $amt1 = $json[$i]["Each share Price"];
                    $nsh = $json[$i]["No of share"];
                    $s1 = floor($amt / $amt1);
                    $k = $json1[0]['Balance'];
                    $k11 = $k - $amt1 * $s1;
                    //echo "Current balance in your account rs" . $k11;
                    $json1[0]['Balance'] = $k11;
                    if ($nsh > $s1) {
                        $n = $this->check($symbol, $s1, $k11, $str);
                        if ($n != 1) {
                            $newJsonString = json_encode($json1);
                            file_put_contents($str, $newJsonString);
                            $company = $json[$i]["Stock Name"];
                            $symol = $symbol;
                            $ns = $s1;
                            $pos = date("Y-M-D h:i:a");
                            $AdditionalArray = array(
                                'Stock name' => $company,
                                'Symbol' => $symol,
                                'No of Share' => $ns,
                                'Purchase date' => $pos,
                                'Sold date' => "00-00-00",
                            );
                            $data_results = file_get_contents($str);

                            $tempArray = json_decode($data_results);
                            //append additional json to json file
                            $tempArray[] = $AdditionalArray;
                            $jsonData = json_encode($tempArray);

                            file_put_contents($str, $jsonData);
                        }
                    } else {
                        echo "Share not available \n";
                        $s1 = 0;
                    }
                } else {
                    echo "You have insufficient balance \n";
                }
                return $s1;
            }
        }

    }

    public function sell($amt, $symbol, $str)
    {
        $u1 = new Utility();
        $l1 = new Linkedlist();
        $filecontent = file_get_contents($str);
        $json = json_decode($filecontent, true);
        if (is_numeric($amt)) {
            $c = 1;
            for ($i = 1; $i < sizeof($json); $i++) {
                if ($json[$i]["Symbol"] == $symbol) {
                    echo "Enter how many share to be sold\n";
                    $n1 = $u1->getString();
                    $n = $json[$i]['No of Share'];
                    if (is_numeric($n) == 1 && is_numeric($n1) == 1 && $n >= $n1) {
                        $k = $json[0]["Balance"];
                        $json[0]["Balance"] = $k + $amt * $n1;
                        $json[$i]['No of Share'] = $n - $n1;
                        $d = date("Y-M-D h:i:a");
                        $json[$i]['Sold date'] = $d;
                        $jsonData = json_encode($json);
                        file_put_contents($str, $jsonData);
                        break;
                    } else {

                        echo "Share not available \n";

                    }

                }
                $c++;
            }
            if ($c >= sizeof($json)) {
                echo "You have choosen wrong symbol \n";
            }

        }
    }

    public function printreport($str)
    {
        $filecontents = file_get_contents($str);
        $json = json_decode($filecontents, true);
        echo "Your name is " . $json[0]['name'] . "\n";
        echo "Balance left in your account Rs" . $json[0]["Balance"] . "\n";
        for ($i = 1; $i < sizeof($json); $i++) {
            echo "The name of comapany is " . $json[$i]["Stock name"] . " and the symbol
of purchsed stock is " . $json[$i]["Symbol"] . " and the no of share is " .
$json[$i]["No of Share"] . "\n";
        }

    }
    public function check($symbol, $s1, $k11, $str)
    {
        $jsonString = file_get_contents($str);
        $data = json_decode($jsonString, true);

        $i = 1;
        while ($i < sizeof($data)) {
            if ($data[$i]['Symbol'] == $symbol) {
                $data[0]['Balance'] = $k11;
                $k = $data[$i]['No of Share'];
                $data[$i]['No of Share'] = $k + $s1;
                $newJsonString = json_encode($data);
                file_put_contents($str, $newJsonString);

                break;
            }
            $i++;
        }
        if ($i >= sizeof($data)) {
            return 0;
        } else {
            return 1;
        }

    }
    public function create()
    {
        $u1=new Utility();
        echo "Enter the name \n";
       $str = $u1->getString();
            if (is_numeric($str) != 1) {
                $str = $str . ".json";
                if(file_exists($str)!=1)
                {
                echo "Enter the account value \n";
                $amt = $u1->getString();
                if (is_numeric($amt)) {
                    $amt1 = $this->valueof($amt);
                    $txt = '[ {"name":"' . $str . '","Balance":' . $amt1 . '}]';
                    
                    $this->stockAccount1($str);
                    $myfile = fopen($str, "w+");
                    fwrite($myfile, $txt);
                }
              else
              echo "Amount should be numeric \n";
            }
            else
            echo "Account already exist \n";
                } else {
                    echo "Enter Correct name\n";
                }
}
public function open()
{
    $u1=new Utility();
echo "Your account details: \n";
            echo "Enter the name \n";
            $str = $u1->getString();
            if (is_numeric($str) != 1) {
                $str = $str . ".json";
                if(file_exists($str))
                {
                $filecontent = file_get_contents($str);
                $json = json_decode($filecontent);
                print_r($json);
                echo "Enter 1 for buy\n
2 for sell \n";
                $n = $u1->getString();
                if (is_numeric($n)) {
                    switch ($n) {
                        case 1:$l1 = new Linkedlist();
                            $filecontent = file_get_contents("Stock.json");
                            $json = json_decode($filecontent, true);
                            $filecontent1 = file_get_contents($str);
                            $json1 = json_decode($filecontent1, true);
                            $n = sizeof($json);
                            for ($i = 0; $i < $n; $i++) {
                                $k = $json[$i]["Stock Name"];
                                //
                                $l1->addLast($k);

                            }
                            $l1->display();
                            echo "Enter the company name\n";
                            $str1 = $u1->getString();
                            $str1=strtolower($str1);
                            $str1=ucfirst($str1);
                            $c = 0;
                            for ($i = 0; $i < $n; $i++) {
                                if (strcmp($str1, $json[$i]["Stock Name"]) == 0) {
                                    $k = $json[$i]["Stock symbol"];
                                    $k1 = $json[$i]["No of share"];
                                    echo "Enter the amount \n";
                                    $amt = $u1->getString();
                                    $s1 = $this->buy($amt, $k, $str);
                                    $k1 = $k1 - $s1;
                                    foreach ($json as $key => $entry) {
                                        if ($entry['Stock Name'] == $str1) {
                                            $json[$key]['No of share'] = $k1;
                                        }

                                    }
                                    $newJsonString = json_encode($json);
                                    file_put_contents('Stock.json', $newJsonString);
                                    break;
                                }
                                $c++;

                            }
                            if ($c >= sizeof($json)) {
                                echo "enter correct option \n";
                            }

                            break;
                        case 2:$filecontent = file_get_contents($str);
                            $json = json_decode($filecontent, true);
                            $l1 = new LinkedList();
                            for ($i = 1; $i < sizeof($json); $i++) {
                                $k = $json[$i]["Symbol"];
                                $l1->addLast($k);
                            }
                            $l1->display();
                            echo "Enter the name of comapany share symbol to be sold \n";
                            $n1 = $u1->getString();
                            echo "Enter the amount to sell the share \n";
                            $n = $u1->getString();

                            $this->sell($n, $n1, $str);
                            break;
                        default:
                            echo "You have chosen wrong option\n";
                    }
                }
                
            }
            else
            echo "Account not exist \n";
            }
            else
            echo "Enter correct name \n";
        }
}

<?php
include 'Utility.php';
include 'StockAccount.php';

$u1 = new Utility();
$sa = new StockAccount();
echo "select the option \n";
echo "Select 1 for create account \n
Select 2 for open account \n
select 3 to exit \n
select 4 to print the report\n";
$n = $u1->getString();
if (filter_var($n, FILTER_VALIDATE_INT)) {
    switch ($n) {
        case 1:echo "Enter the name \n";
            $str = $u1->getString();
            if (is_numeric($str) != 1) {
                echo "Enter the account value \n";
                $amt = $u1->getString();
                if (is_numeric($amt)) {
                    $amt1 = $sa->valueof($amt);
                    $txt = '[ {"name":"' . $str . '","Balance":' . $amt1 . '}]';
                    $str = $str . ".json";
                    $sa->stockAccount1($str);
                    $myfile = fopen($str, "w+");
                    fwrite($myfile, $txt);
                } else {
                    echo "Enter Correct amount\n";
                }

            } else {
                echo "Enter correct name \n";
            }

            break;
        case 2:echo "Your account details: \n";
            echo "Enter the name \n";
            $str = $u1->getString();
            if (is_numeric($str) != 1) {
                $str = $str . ".json";
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
                                    $s1 = $sa->buy($amt, $k, $str);
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

                            $sa->sell($n, $n1, $str);
                            break;
                        default:
                            echo "You have chosen wrong option\n";
                    }
                }
            }
            break;
        case 3:echo "Thank you \n";
            break;
        case 4:
            echo "Enter the name\n";
            $str = $u1->getString();
            $str = $str . ".json";
            $sa->printreport($str);
            break;
        default:
            echo "You have chosen wrong option \n";

    }
} else {
    echo "Enter correct option \n";
}

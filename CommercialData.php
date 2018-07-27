<?php
include 'Utility.php';
include 'StockAccount.php';

$u1 = new Utility();
$sa = new StockAccount();
echo "select the option \n";
echo "Select 1 for create account \n Select 2 for open account \n select 3 to exit \n select 4 to print the report\n";
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
                    echo "Enter Correct account\n";
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
                echo "Enter 1 for buy\n 2 for sell \n";
                $n = $u1->getString();
                if (is_numeric($n)) {
                    switch ($n) {
                        case 1:$l1 = new Linkedlist();
                            $filecontent = file_get_contents("Stock.json");
                            $json = json_decode($filecontent, true);
                            $n = sizeof($json);
                            for ($i = 0; $i < $n; $i++) {
                                $k = $json[$i]["Stock Name"];
                                $l1->addLast($k);

                            }
                            $l1->display();
                            echo "Enter the company name\n";
                            $str1 = $u1->getString();
                            for ($i = 0; $i < $n; $i++) {
                                if (strcmp($str1, $json[$i]["Stock Name"]) == 0) {
                                    $k = $json[$i]["Stock symbol"];
                                    echo "Enter the amount \n";
                                    $amt = $u1->getString();
                                    $sa->buy($amt, $k);
                                }
                            }

                            break;
                        case 2:$sa->sell(2000, "Airtel");
                            break;
                        default:
                            echo "You have chosen wrong option\n";
                    }
                }
            }
            break;
        case 3:echo "Thank you \n";
            break;
        case 4: $sa->printreport();
                break;
        default:
            echo "You have chosen wrong option \n";

    }
}

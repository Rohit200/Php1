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
        case 1:$sa->create();
            break;
        case 2:$sa->open();
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

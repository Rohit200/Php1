<?php
include 'AddressBook.php';
echo "Select one of the given below option \n";
echo "Enter 1 for creating account \n
Enter 2 for update the information \n
Enter 3 to view your profile \n
Enter 4 to delete the account \n
Enter 5 to sort the records \n";
echo "Enter one option \n";
$u1=new Utility();
$n=$u1->getString();
if(filter_var($n,FILTER_VALIDATE_INT))
{
    switch($n)
    {
        case 1:createAccount();
                break;
        case 2:update();
                break;
        case 3:view();
                break;
        case 4:delete();
               break;
        case 5:sorting();
                break;
        default: echo "You have chosen wrong option \n";
    }
}
?>
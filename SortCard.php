<?php
include 'Utility.php';
$u1=new Utility();
$suits=array("Clubs", "Diamonds", "Hearts", "Spades");
$ranks=array("2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace");
$deck=array();
$n=0;
$a=array();
$a1=array();
for($i=0;$i<sizeof($ranks);$i++)
{
    for($j=0;$j<sizeof($suits);$j++)
    {
        $deck[$n]=$ranks[$i]." of ".$suits[$j];
        $n++;
    }
}
$n1=13;
$k=0;
for($i=0;$i<sizeof($ranks);$i++)
{
    for($j=0;$j<sizeof($suits);$j++)
    {
       $a[$k]=$n1;
       $k++;
}
    $n1--;
}
print_r($a);

for($i=0;$i<sizeof($deck);$i++)
{
$r=rand(0,51);
$temp=$deck[$r];
$a1[$r]=$deck[$i];
$a1[$i]=$temp;

}
print_r($deck);
$sortarray=array( "Queen of Spades","6 of Diamonds","4 of Clubs",
"3 of Spades", 
"7 of Diamonds",
"3 of Clubs",
"4 of Diamonds",
"10 of Diamonds",
"Jack of Diamonds",
"Jack of Spades");
for($i=0;$i<sizeof($sortarray);$i++)
{
$n=sizeof($sortarray)-1;
for($j=0;$j<$n-$i;$j++)
{
$l1=$sortarray[$j];
$l2=$sortarray[$j+1];
$l3=$u1->search($deck,$l1);
$l4=$u1->search($deck,$l2);
$l5=$u1->get($a,$l3);
$l6=$u1->get($a,$l4);
if($l5>$l6)
{
$k = $sortarray[$j];
$sortarray[$j] = $sortarray[$j + 1];
$sortarray[$j + 1] = $k;
}
}
}
print_r($sortarray);
?>



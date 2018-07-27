<?php
Class Stock
{
public $sum;
public $sontents;
public function __construct()
{
    $this->sum=0;
    $this->contents=file_get_contents("Stock.json");
}
public function eachStock()
{
    $json=json_decode($this->contents,true);
    $n=sizeof($json);
  for($i=0;$i<$n;$i++)
  {
    
      echo "The stock name is ".$json[$i]["Stock Name"]."\n"; 
      echo "The total number of share is ".$json[$i]["No of share"]."\n"; 
      echo "Each share value is ".$json[$i]["Each share Price"]."\n";
      $share=$json[$i]["No of share"]; 
      $price=$json[$i]["Each share Price"];
      $r=$share*$price;
      echo "The total share value is ".$r."\n";
      $this->sum=$this->sum+$r;
      echo "-------------------------------------\n";
  }
}
public function total()
{
    echo "The total share value of all the company is ".$this->sum."\n";
}
}

?>
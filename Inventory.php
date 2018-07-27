<?php
class Inventory
{
    public function fileCreate($filename, $txt)
    {
        $handle = fopen($filename, 'w');
        fwrite($handle, $txt);
    }
    public function readFile($filename)
    {
        $filecontent = file_get_contents($filename);
        return $filecontent;
    }
    public function createObject($filecontent)
    {
        $json = json_decode($filecontent, true);
        return $json;
    }
    public function display($json)
    {
        $a=array("Rice","Pulse","Wheat");
        $n=sizeof($json);
        $sum = 0;
        for ($i = 0; $i < $n; $i++) {
            $k=$a[$i];
            $sum1=0;
            $n1=sizeof($json[$k]);
        echo "Displaying the details of ".$k."\n";
            for($j=0;$j<$n1;$j++)
            {    
            $name = $json[$k][$j]["name"];
            $price = $json[$k][$j]["Price"];
            $weight = $json[$k][$j]["weight"];
            echo "Name of invenvorty is " . $name .
                " and the total quantity in stock is" . $weight .
                "kg and the price of per kg is Rs" . $price . "\n";
            $r = $price * $weight;
            $sum = $sum + $r;
            $sum1=$sum1+$r;
        }
        echo "Total inventory cost is Rs" . $sum . "\n";
        echo "------------------------------------------ \n";
    }
        echo "whole inventory cost is Rs" . $sum . "\n";
    }

}

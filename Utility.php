
<?php
include 'Card.php';
include 'Player.php';
class Utility
{
    public function getString()
    {
        fscanf(STDIN, "%s", $name);
        return $name;
    }
    public function regularExp($fname, $lname, $mobile, $str)
    {
        $str1 = "Please enter correct details";
        if (is_numeric($fname) != 1 && is_numeric($lname) != 1 &&
            filter_var($mobile, FILTER_VALIDATE_INT)) {
            $str = preg_replace("/<<name>>/", $fname, $str);
            $str = preg_replace("/<<full name>>/", $fname . " " . $lname, $str);
            $str = preg_replace("/xxxxxxxxxx/", $mobile, $str);
            $d = date("d-m-Y");
            $str = preg_replace("/01-01-2016/", $d, $str);
            return $str;
        } else {
            return $str1;
        }
    }
    public function Arrayofcard()
    {
        $c1 = new Card();
        $deck = array();
        $n = 0;
        for ($i = 0; $i < sizeof($c1->ranks); $i++) {
            for ($j = 0; $j < sizeof($c1->suits); $j++) {
                $deck[$n] = $c1->ranks[$i] . " of " . $c1->suits[$j];
                $n++;
            }
        }
        return $deck;
    }
    public function deckofcard($deck)
    {
        $a1 = array(array(), array());
        $a = $deck;
        for ($i = 0; $i < sizeof($deck); $i++) {
            $r = rand(0, 51);
            $temp = $a[$r];
            $a[$r] = $a[$i];
            $a[$i] = $temp;
        }
        $n1 = 0;
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $a1[$i][$j] = $a[$n1];
                $n1++;
            }
        }
        print_r($a);
        return $a;
    }
    public function displaycard()
    {
        $deck = $this->Arrayofcard();
        print_r($deck);
        $a1 = $this->deckofcard1($deck);
        for ($i = 0; $i < 4; $i++) {
            $k = $i + 1;
            echo "cards given to " . $k . " player\n";
            for ($j = 0; $j < 9; $j++) {
                echo $a1[$i][$j] . "\n";
            }
            echo "\n";
        }
    }
    public function search($deck, $l1)
    {
        $i = 0;
        while ($i < sizeof($deck)) {
            if ($deck[$i] == $l1) {
                break;
            }
            $i++;
        }
        return $i;
    }
    public function get($a, $l)
    {
        $i = 0;
        while ($i < $l) {
            $i++;
        }
        return $a[$i];
    }
    public function sortofcard()
    {
        $sort = array(array(), array());
        $a = array();
        $l1 = 0;
        $p1 = new player();
        $deck = $this->Arrayofcard();
        $a1 = $this->deckofcard($deck);
        $n1 = 13;
        $k = 0;
        for ($i = 0; $i < 13; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $a[$k] = $n1;
                $k++;
            }
            $n1--;
        }
        //print_r($a);
        //print_r($deck);
        $k1 = 0;
        while ($k1 < 4) {
            $l = 0;
            $p1->sortarray = array();
            $k = $i + 1;
            $j = $k1;
            echo "sorted cards of " . $k1 + 1 . " player\n";
            while ($j < 52) {
                if ($l < 9) {
                    $p1->sortarray[$l] = $a1[$j];
                    $l++;
                }
                $j = $j + 4;
            }
            for ($i = 0; $i < sizeof($p1->sortarray); $i++) {
                $n = sizeof($p1->sortarray) - 1;
                for ($j = 0; $j < $n - $i; $j++) {
                    $l1 = $p1->sortarray[$j];
                    $l2 = $p1->sortarray[$j + 1];
                    $l3 = $this->search($deck, $l1);
                    $l4 = $this->search($deck, $l2);
                    $l5 = $this->get($a, $l3);
                    $l6 = $this->get($a, $l4);
                    if ($l5 > $l6) {
                        $k = $p1->sortarray[$j];
                        $p1->sortarray[$j] = $p1->sortarray[$j + 1];
                        $p1->sortarray[$j + 1] = $k;
                    }
                }
            }
            $k1++;
            for ($j = 0; $j < sizeof($p1->sortarray); $j++) {
                $sort[$k1 - 1][$j] = $p1->sortarray[$j];
            }
        }
        return $sort;
    }
    public function displayinventory()
    {
        $filecontent = file_get_contents("inventory.json");
        $someObject = json_decode($filecontent);
        print_r($someObject);
        echo $someObject[0]->Price;
        $someArray = json_decode($filecontent, true);
        print_r($someArray);
        $n = sizeof($someArray);

        $sum = 0;
        for ($i = 0; $i < $n; $i++) {
            $name = $someArray[$i]["name"];
            $price = $someArray[$i]["Price"];
            $weight = $someArray[$i]["Weight"];
            echo "Name of invenvorty is " . $name .
                " and the total quantity in stock is" . $weight .
                "kg and the price of per kg is Rs" . $price . "\n";
            $r = $price * $weight;
            $sum = $sum + $r;
        }
        echo "Total inventory cost is Rs" . $sum . "\n";
    }
    public function deckofcard1($deck)
    {
        $a1 = array(array(), array());
        $a = $deck;
        for ($i = 0; $i < sizeof($deck); $i++) {
            $r = rand(0, 51);
            $temp = $a[$r];
            $a[$r] = $a[$i];
            $a[$i] = $temp;
        }
        $n1 = 0;
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $a1[$i][$j] = $a[$n1];
                $n1++;
            }
        }
        return $a1;
    }
}

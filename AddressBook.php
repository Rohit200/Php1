<?php
include 'Utility.php';
include 'Linkedlist.php';

 function createAccount()
{
    $u1=new Utility();
    echo "Enter your locality name \n";
    $str=$u1->getString();
    $str=strtolower($str);
    $str=ucfirst($str);
    if(is_numeric($str)!=1)
   {
       $str=$str.".json";
       if(file_exists($str)!=1)
       {
    echo "Enter the First name \n";
    $fname=$u1->getString();
    echo "Enter the last name \n";
    $lname=$u1->getString();
    echo "Enter the mobile number \n";
    $mobile=$u1->getString();
    echo "Enter the address \n";
    echo "Enter the Street number \n";
    $n=$u1->getString();
    echo "Enter the Street name \n";
    $sname=$u1->getString();
    echo "Enter the district name \n";
    $dname=$u1->getString();
    echo "Enter the State name \n";
    $stname=$u1->getString();
    echo "Enter the Zip code \n";
    $zipno=$u1->getString();
    echo "Enter your Aadhar number \n";
    $idno=$u1->getString();
    $txt = '[ {"First name":"' . $fname.'","Last name":"' . $lname .'","Mobile number":' . $mobile .
         ',"Street number":' . $n .',"Street name":"' . $sname .'","District name":"' . $dname . 
         '","State name":"' . $stname . '","Zip code":' . $zipno .',"Aadhar number":' . $idno .     '}]';

         $myfile=fopen($str,"w");
         fwrite($myfile,$txt);
         fclose($myfile);
    }
    else{
        $filecontent=file_get_contents($str);
        $json=json_decode($filecontent,true);
        echo "Enter your Aadhar number \n";
        $idno=$u1->getString();
        $i=0;
        while($i<sizeof($json))
        {
          if($json[$i]['Aadhar number']==$idno)
          {
              break;
          }
          $i++;
        }
        if($i>=sizeof($json))
        {
        echo "Enter the First name \n";
        $fname=$u1->getString();
        echo "Enter the last name \n";
        $lname=$u1->getString();
        echo "Enter the mobile number \n";
        $mobile=$u1->getString();
        echo "Enter the address \n";
        echo "Enter the Street number \n";
        $n=$u1->getString();
        echo "Enter the Street name \n";
        $sname=$u1->getString();
        echo "Enter the district name \n";
        $dname=$u1->getString();
        echo "Enter the State name \n";
        $stname=$u1->getString();
        echo "Enter the Zip code \n";
        $zipno=$u1->getString();
                            $AdditionalArray = array(
                                'First name' => $fname,
                                'Last name' => $lname,
                                'Mobile numberer' => $mobile,
                                'Street number' => $n,
                                'Street name' => $sname,
                                'District name'=>$dname,
                                'State name'=>$stname,
                                'Zip code'=>$zipno,
                                'Aadhar number'=>$idno
                            );
                            $data_results = file_get_contents($str);

                            $tempArray = json_decode($data_results);
                            //append additional json to json file
                            $tempArray[] = $AdditionalArray;
                            $jsonData = json_encode($tempArray);

                            file_put_contents($str, $jsonData);
                        }
                        else
                        echo "Your address already present \n";
    }
}
    else
    echo "Enter correct locality name \n";
}
 function update()
 {
    $u1=new Utility();
     echo "Enter your Locality name \n";
     $str=$u1->getString();
     $str=strtolower($str);
     $str=ucfirst($str);
     $str=$str.".json";
     echo "Enter your Aadhar number \n";
        $idno=$u1->getString();
     $filecontent=file_get_contents($str);
     $json=json_decode($filecontent,true);
     $i=0;
     while($i<sizeof($json))
     {
         if($json[$i]['Aadhar number']==$idno)
         {
             break;
         }
         $i++;
     }
     if($i<sizeof($json))
     {
     echo "Select the option to update the information \n";
     echo "1 for First name \n
     2 for Last name \n
     3 for Mobile number \n
     4 for Street number \n
     5 for Street name \n
     6 for District name \n
     7 for State name \n
     8 for Zip code \n";
     $u1=new Utility();
     $n=$u1->getString();
     if(filter_var($n,FILTER_VALIDATE_INT))
     {
      switch($n)
      {
          case 1:echo "Enter the updated first name \n";
              $txt=$u1->getString();
              $json[$i]['First name']=$txt;
                  break;
          case 2:echo "Enter the last name to update information \n";
                 $txt=$u1->getString();
                $json[$i]['Last name']=$txt;
                break;
          case 3:echo "Enter the update mobile number \n";
                  $txt=$u1->getString();  
                $json[$i]['Mobile number']=$txt;
                  
                break;
          case 4: echo "Enter the updated street number \n";
                  $txt=$u1->getString();
                  $json[$i]['Street number']=$txt;
                   break;
          case 5: echo "Enter the updated Street name \n";
                   $txt=$u1->getString();
                   $json[$i]['Street name']=$txt;
                    break;
          case 6:echo "Enter the updated District name \n";
                 $txt=$u1->getString();
                 $json[$i]['District name']=$txt;
                 break;
          case 7:echo "Enter the updated State name \n";
                 $txt=$u1->getString();
                 $json[$i]['State name']=$txt;
                 break;
          case 8:echo "Enter the updated Zip code \n";
                $txt=$u1->getString();
                $json[$i]['Zip code']=$txt;
                  break;
      }
      $newJsonString = json_encode($json);
      file_put_contents($str, $newJsonString);
                                    
     }
     else
     echo "Please enter correct option \n";
    }
    else
    echo "please create account \n";

 }
 function view()
 {
     $u1=new Utility();
     echo "Enter your Locality name \n";
     $str=$u1->getString();
     $str=strtolower($str);
     $str=ucfirst($str);
     echo "Enter your Aadhar number \n";
     $idno=$u1->getString();
     $str=$str.".json";
     $filecontent=file_get_contents($str);
     $json=json_decode($filecontent,true);
     $i=0;
     while($i<sizeof($json))
     {
         if($json[$i]['Aadhar number']==$idno)
         {
     echo "First name :".$json[$i]['First name']."\n".
     "Last name :".$json[$i]['Last name']."\n".
     "Mobile number :".$json[$i]['Mobile number']."\n".
     "Street number :".$json[$i]['Street number']."\n".
     "Street name :".$json[$i]['Street name']."\n".
     "District name :".$json[$i]['District name']."\n".
     "State name :".$json[$i]['State name']."\n".
     "Zip code :".$json[$i]['Zip code']."\n".
     "Aadhar number :".$json[$i]['Aadhar number']."\n";
     break;
         }
         $i++;
     }
     if($i>=sizeof($json))
     echo "Sorry you have to create account \n";
 }
 function delete()
 {
    $u1=new Utility();
    echo "Enter your Locality name \n";
    $str=$u1->getString();
    $str=strtolower($str);
    $str=ucfirst($str);
    $str=$str.".json";
    echo "Enter your Aadhar number \n";
       $idno=$u1->getString();
    $filecontent=file_get_contents($str);
    $json=json_decode($filecontent,true);
    $i=0;
    while($i<sizeof($json))
    {
        if($json[$i]['Aadhar number']==$idno)
        {
            break;
        }
        $i++;
    }
    if($i<sizeof($json))
    {
    echo "Select the option to update the information \n";
    echo "1 for First name \n
    2 for Last name \n
    3 for Mobile number \n
    4 for Street number \n
    5 for Street name \n
    6 for District name \n
    7 for State name \n
    8 for Zip code \n";
    $u1=new Utility();
    $n=$u1->getString();
    if(filter_var($n,FILTER_VALIDATE_INT))
    {
     switch($n)
     {
         case 1:
             $json[$i]['First name']=Null;
                 break;
         case 2:echo 
               $json[$i]['Last name']=Null;
               break;
         case 3:echo   
               $json[0]['Mobile number']=Null;
                 
               break;
         case 4: 
                 $json[0]['Street number']=Null;
                  break;
         case 5: 
                  $json[0]['Street name']=Null;
                   break;
         case 6:
                $json[0]['District name']=Null;
                break;
         case 7:
                $json[0]['State name']=Null;
                break;
         case 8:
               $json[0]['Zip code']=Null;
                 break;
     }
     $newJsonString = json_encode($json);
     file_put_contents($str, $newJsonString);
                                   
    }
    else
    echo "Enter the correct option \n";
}
else
echo "please create account \n";

 }
 
function stringsort($str,$str1)
{
    $a1=array();
    $filecontent=file_get_contents($str);
    $json1=json_decode($filecontent);
    for($i=0;$i<sizeof($json1);$i++)
    {
        $a1[$i]=$json1[$i];
    
    }
  $i=0;
  $json1=json_decode($filecontent,true);
  while($i<sizeof($json1)-1)
  {
      if(strcmp($json1[$i][$str1],$json1[$i+1][$str1])>0)
      {
          $temp=$a1[$i];
          $a1[$i]=$a1[$i+1];
          $a1[$i+1]=$temp;
      }
      $i++;
  }
  print_r($a1);
}
function integersort($str,$str1)
{
    $a1=array();
    $filecontent=file_get_contents($str);
    $json1=json_decode($filecontent);
    for($i=0;$i<sizeof($json1);$i++)
    {
        $a1[$i]=$json1[$i];
    
    }
  $i=0;
  $json1=json_decode($filecontent,true);
  while($i<sizeof($json1)-1)
  {
      if($json1[$i][$str1]>$json1[$i+1][$str1])
      {
          $temp=$a1[$i];
          $a1[$i]=$a1[$i+1];
          $a1[$i+1]=$temp;
      }
      $i++;
  }
  print_r($a1);
}
function sorting()
{
    $u1=new Utility();
    echo "Enter your Locality name \n";
    $str=$u1->getString();
    $str=strtolower($str);
    $str=ucfirst($str);
    $str=$str.".json";
    echo "Enter your Aadhar number \n";
       $idno=$u1->getString();
    $filecontent=file_get_contents($str);
    $json=json_decode($filecontent,true);
    $i=0;
    while($i<sizeof($json))
    {
        if($json[$i]['Aadhar number']==$idno)
        {
            break;
        }
        $i++;
    }
    if($i<sizeof($json))
    {
    echo "Select the option to update the information \n";
    echo "1 for First name \n
    2 for Last name \n
    3 for Mobile number \n
    4 for Street number \n
    5 for Street name \n
    6 for District name \n
    7 for State name \n
    8 for Zip code \n";
    $u1=new Utility();
    $n=$u1->getString();
    if(filter_var($n,FILTER_VALIDATE_INT))
    {
     switch($n)
     {
         case 1:stringsort($str,"First name");
                break;
         case 2:stringsort($str,"Last name");
               break;
         case 3:integersort($str,"Mobile number");
                 break;
         case 4: integersort($str,"Street number");
                 break;
         case 5: stringsort($str,"Street name");
                  break;
         case 6:stringsort($str,"District name");
                   break;
         case 7:stringsort($str,"State name");
                 break;
         case 8:integersort($str,"Zip code");
                break;
     }
    }
}
}

?>
<?php
include 'Utility.php';
include 'Linkedlist.php';

 function createAccount($str)
{
    
    $u1=new Utility();
    echo "Enter the First name \n";
    $fname=$u1->getString();
    if(is_numeric($fname))
    {
        $fname=$fname;
    }
    echo "Enter the last name \n";
    $lname=$u1->getString();
    if(is_numeric($fname))
    {
        $lname=$lname;
    }
    echo "Enter the mobile number \n";
    $mobile=$u1->getString();
    if(filter_var($mobile,FILTER_VALIDATE_INT))
    {
       $mobile=$mobile;
    }
    echo "Enter the address \n";
    echo "Enter the Street number \n";
    $n=$u1->getString();
    if(filter_var($n,FILTER_VALIDATE_INT))
    {
        $s=$n;
    }
    echo "Enter the Street name \n";
    $sname=$u1->getString();
    if(is_numeric($n)==1)
    {
        $sname=$sname;
    }
    echo "Enter the district name \n";
    $dname=$u1->getString();
    if(is_numeric($n)!=1)
    {
        $dname=$dname;
    }
    echo "Enter the State name \n";
    $stname=$u1->getString();
    if(is_numeric($n)!=1)
    {
        $stname=$stname;
    }
    echo "Enter the Zip code \n";
    $zipno=$u1->getString();
    if(filter_var($zipno,FILTER_VALIDATE_INT))
    {
        $zipno=$zipno;
    }
    $txt = '[ {"First name":"' . $fname.'","Last name":"' . $lname .'","Mobile number":' . $mobile .
         ',"Street number":' . $n .',"Street name":"' . $sname .'","District name":"' . $dname . 
         '","State name":"' . $stname . '","Zip code":' . $zipno .     '}]';
         $str=$fname.".json";
         $myfile=fopen($str,"w");
         fwrite($myfile,$txt);
         fclose($myfile);
}
 function update()
 {
    $u1=new Utility();
     echo "Enter your first name \n";
     $fname=$u1->getString();
     $l1=new LinkedList();
     $fname=$fname.".json";
     $filecontent=file_get_contents($fname);
     $json=json_decode($filecontent,true);
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
          case 1:echo "Sorry we don't allow to change the first name.
          File is created with this name \n";
                  break;
          case 2:echo "Enter the last name to update information \n";
                 $txt=$u1->getString();
                $json[0]['Last name']=$txt;
                break;
          case 3:echo "Enter the update mobile number \n";
                  $txt=$u1->getString();  
                $json[0]['Mobile number']=$txt;
                  
                break;
          case 4: echo "Enter the updated street number \n";
                  $txt=$u1->getString();
                  $json[0]['Street number']=$txt;
                   break;
          case 5: echo "Enter the updated Street name \n";
                   $txt=$u1->getString();
                   $json[0]['Street name']=$txt;
                    break;
          case 6:echo "Enter the updated District name \n";
                 $txt=$u1->getString();
                 $json[0]['District name']=$txt;
                 break;
          case 7:echo "Enter the updated State name \n";
                 $txt=$u1->getString();
                 $json[0]['State name']=$txt;
                 break;
          case 8:echo "Enter the updated Zip code \n";
                $txt=$u1->getString();
                $json[0]['Zip code']=$txt;
                  break;
      }
      $newJsonString = json_encode($json);
      file_put_contents($fname, $newJsonString);
                                    
     }
     else
     echo "Enter the correct option \n";

 }
 function view()
 {
     $u1=new Utility();
     echo "Enter your first name \n";
     $str=$u1->getString();
     $str=$str.".json";
     $filecontent=file_get_contents($str);
     $json=json_decode($filecontent,true);
     echo "First name :".$json[0]['First name']."\n".
     "Last name :".$json[0]['Last name']."\n".
     "Mobile number :".$json[0]['Mobile number']."\n".
     "Street number :".$json[0]['Street number']."\n".
     "Street name :".$json[0]['Street name']."\n".
     "District name :".$json[0]['District name']."\n".
     "State name :".$json[0]['State name']."\n".
     "Zip code :".$json[0]['Zip code']."\n";
 }
 function delete()
 {
    $u1=new Utility();
    echo "Enter your first name \n";
    $fname=$u1->getString();
    $l1=new LinkedList();
    $fname=$fname.".json";
    $filecontent=file_get_contents($fname);
    $json=json_decode($filecontent,true);
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
         case 1:echo "Sorry we don't allow to change the first name.
         File is created with this name \n";
                 break;
         case 2:echo "Enter the last name to update information \n";
                $txt=$u1->getString();
               $json[0]['Last name']=$txt;
               break;
         case 3:echo "Enter the update mobile number \n";
                 $txt=$u1->getString();  
               $json[0]['Mobile number']=$txt;
                 
               break;
         case 4: echo "Enter the updated street number \n";
                 $txt=$u1->getString();
                 $json[0]['Street number']=$txt;
                  break;
         case 5: echo "Enter the updated Street name \n";
                  $txt=$u1->getString();
                  $json[0]['Street name']=$txt;
                   break;
         case 6:echo "Enter the updated District name \n";
                $txt=$u1->getString();
                $json[0]['District name']=$txt;
                break;
         case 7:echo "Enter the updated State name \n";
                $txt=$u1->getString();
                $json[0]['State name']=$txt;
                break;
         case 8:echo "Enter the updated Zip code \n";
               $txt=$u1->getString();
               $json[0]['Zip code']=$txt;
                 break;
     }
     $newJsonString = json_encode($json);
     file_put_contents($fname, $newJsonString);
                                   
    }
    else
    echo "Enter the correct option \n";

 }
?>
<?php

$fname=$_POST['FirstName'];
$lname=$_POST['LastName'];
$address=$_POST['Address'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pincode'];
$mob=$_POST['Mobile'];
$pass=$_POST['Password'];
$mail=$_POST['Email'];
$user=$_POST['User'];

if(!empty($fname)&&!empty($lname)&&!empty($address)&&!empty($city)&&!empty($state)&&!empty($pin)&&!empty($mob)&&!empty($pass)&&!empty($mail)&&!empty($user)&&$state!='Invalid'&&$city!='Invalid')
{
    require_once '../db/db_func.php';
    //None Of The Value Is Empty
    $st=0;
    if(valueExists($mob,'mobile_no'))
    {
        $status="Mobile Number Already Registered";
        $st=1;
    }
    else if(valueExists($mail,'email'))
    {
        $status="Email Adress Already Registered";
        $st=1;
    }
    else if(valueExists($user,'username'))
    {
        $status="User Name Already Registered";
        $st=1;
    }
    if($st==0)
    {
        $status=insertValues($fname,$lname,$mail,$address,$city,$state,$pin,$user,$pass,$mob);
        echo "$status,$mail";
    }
    else
    {
        echo "1,$status";
    }
}

?>
<?php

require_once '../db/db_func.php';

$db_link=Connect_DB();

$msg=null;

$query="";

if(isset($_GET['mob']))
{	
    //mobile no query
    $id='Mobile_err';
    $msg="Mobile Number Already Exists";
	$val=$_GET['mob'];
	$query="SELECT `id` FROM `users` WHERE `mobile_no` = '$val'";
}
else if(isset($_GET['username']))
{	
    //username query
	$id='User_err';
	$msg="Username Already Exists";
	$val=$_GET['username'];
	$query="SELECT `id` FROM `users` WHERE `username` = '$val'";
}
else if(isset($_GET['email']))
{
    //email query
	$id='Email_err';
    $msg="Email Id Already Exists";
	$val=$_GET['email'];
	$query="SELECT `id` FROM `users` WHERE `email` = '$val'";
}

//executing the query
if(!empty($val))
{
    if($query_run=mysqli_query($db_link,$query))
    {
        $num=mysqli_num_rows($query_run);
        if($num!=0)
        {
            //Data already present
            $val="1,$id,$msg";
        }
        else
        {
            $val="0,null";
        }
        if(!empty($val))
        {
            echo $val;
        }
    }
    
    else
    {
        echo mysqli_error($db_link);
    }
}

mysqli_close($db_link);

?>
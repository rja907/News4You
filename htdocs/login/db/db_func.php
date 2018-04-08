<?php

require_once 'db_config.php';

function ValidateUser($mail,$pass)
{
    $query="SELECT `id`,`active_status` FROM `users` WHERE `email` = '$mail'";
    
    $db_link=Connect_DB();
    $status=2;
    if($query_run=mysqli_query($db_link,$query))
    {
        if(mysqli_num_rows($query_run)==0)
        {
            //No Records Found For The Current User Found
            echo "<script>document.getElementById('email_err').innerHTML='Unknown User'</script>";
        }
        else if(mysqli_num_rows($query_run)==1)
        {
            //Record Found With The Email address now fetch the primary key for that
            $row=mysqli_fetch_assoc($query_run);
            $password=getValue($row['id'],'password',$db_link);
            if($password==md5($pass))
            {
                //User has Been Successfully Validated
                $status=getValue($row['id'],'active_status',$db_link);
            }
            else
            {
                //Invalid Password
                echo "<script>document.getElementById('err_pwd').innerHTML='Invalid Password'</script>";
            }
        }
        else
        {
            //This condition will arise when the uniqueness of the email gets violated
            //Write the appropriate error in the log file so that the admin can check and
			//report for that, though this case is never goin to occur as the database is designed in that way only
			echo "<p><b style='color: red'>User not validated...try again</b></p>";
			exit;
        }
    }
    mysqli_close($db_link);
    return $status;
}

function getValue($key,$value,$db_link)
{
    $query="SELECT `$value` FROM `users` WHERE `id` = $key";
    if($query_run=mysqli_query($db_link,$query))
    {
        $row=mysqli_fetch_assoc($query_run);
        return $row[$value];
    }
}

function insertValues($fname,$lname,$email,$add,$city,$state,$pin,$uname,$pass,$mob)
{
    $pass=md5($pass);
    $status=1;
    $time=date("Y-m-d H:i:s");
    $time=md5($time);

    $query="INSERT INTO `telecoma_webportal`.`users` (`id`, `fname`, `lname`, `email`, `address`, `city`, `state`, `pincode`, `username`, `password`, `mobile_no`,`auth_key`) VALUES (NULL, '$fname', '$lname', '$email', '$add', '$city', '$state', '$pin', '$uname', '$pass', '$mob','$time')";
    
    $db_link=Connect_DB();
    
    $add=mysqli_real_escape_string($db_link,$add);
    
    if($query_run=mysqli_query($db_link,$query))
    {
        //Values Inserted Successfully send him/her an acknowledgement mail to activate his/her account
        $status=sendActivationMail($email,$time); //When Sending The Main For The First Time
    }
    else
    {
        $status=mysqli_error($db_link);
        //Recored An Error Log Here, and Inform The Admin about this issue
    }
    mysqli_close($db_link);
    return $status;
}

function valueExists($value,$type)
{
    $db_link=Connect_DB();
    $query="SELECT `id` FROM `users` WHERE $type = '$value'";
    if($query_run=mysqli_query($db_link,$query))
    {
        if(mysqli_num_rows($query_run)==0)
        {
            return false;
        }
        else
        {
            return true;
        }
        
    mysqli_close($db_link);
    }
}


function sendActivationMail($email,$key)
{
    $url= 'http://'.$_SERVER['HTTP_HOST'];
    $sub="Regarding Your $url Account Activation";
    $adres="$url/activateUser.php?authkey=".md5($email).$key.md5(strrev($email))."&email=".$email;
    $msg="To Activate Your Your Account Please Click On The Following Link : 
    
    
    $adres
    
    
    If You Have Any Problem Copy The Link Into Your Broswer's Address Bar";
    
    if(mail($email,$sub,$msg))
    {
        return 1;
    }
                                                                     
}

function createLog($type,$message)
{
    $today=date("m.d.y");
    $file_name="../logs/$type_$today.log";   
    $file=fopen($file_name,"a+");
    $time=date("F j, Y, g:i a");
    $message=$message." @ ".$time."\n";
    fwrite($file,$message);
    fclose($file);
}

function sanitize($value)
{
    $db_link=Connect_DB();
    $value=mysqli_real_escape_string($db_link,$value);
    mysqli_close($db_link);
    return $value;
}

function valueExistsApi($email,$source)
{
	$db_link=Connect_DB();
	$status=0;
	$query="SELECT `id` FROM `api_login` WHERE `email` = '$email' AND `source` = '$source'";
	if($query_run=mysqli_query($db_link,$query))
	{
		if(mysqli_num_rows($query_run)!=0)
			$status=1;
	}
	mysqli_close($db_link);
	return $status;
}

function valueInsertApi($name,$email,$source)
{
	$db_link=Connect_DB();
	$query="INSERT INTO `api_login` (`name`,`email`,`source`) VALUES ('$name','$email','$source')";
	if($query_run=mysqli_query($db_link,$query))
	{
		//Query Has Been Executed Successfully
	}
	mysqli_close($db_link);
}

?>
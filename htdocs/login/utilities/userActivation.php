<?php

if(isset($_GET['authkey'])&&isset($_GET['email']))
{
    require_once 'db/db_func.php';
    
    $authkey=$_GET['authkey'];

    $email=$_GET['email'];

    $authkey=substr($authkey,32,-32);
    
    if(!empty($authkey)&&!empty($email))
    {
        $db_link=Connect_DB();
        
        $query="SELECT `id`,`active_status`,`auth_key` FROM `users` WHERE `email` = '$email'";

        if($query_run=mysqli_query($db_link,$query))
        {
            $row=mysqli_num_rows($query_run);
            if($row==1)
            {
                $vals=mysqli_fetch_assoc($query_run);
                if($vals['active_status']==0)
                {
                    $auth_key=$vals['auth_key'];
                    if($auth_key==$authkey)
                    {
                        //Key Matched
                        $query="UPDATE `telecoma_webportal`.`users` SET `active_status` = '1' WHERE `users`.`id` = '".$vals['id']."'";
                        if(mysqli_query($db_link,$query))
                        {
                            //Account Has Been Successfully Activated
                            session_start();
                            $_SESSION['user']=$email;
                            echo "Verification Successful, Redirecting........";
                            echo "<script>setTimeout(function(){window.location='http://telecomacademy.co.in'},1000);</script>";
                        }
                    }
                }
                else
                {
                    echo "You Have Already Activated Your Account";
                }
            }
        }
        
        else
        {
            echo mysqli_error($db_link);
        }
        mysqli_close($db_link);
    }
}

else
{
    echo "Some One Is Trying Playing Arouund";
}

?>

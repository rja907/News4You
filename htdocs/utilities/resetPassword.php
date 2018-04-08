<?php
if(isset($_GET['authkey']) && isset($_GET['email']))
{
require_once 'db/db_func.php';

$authkey=$_GET['authkey'];

$authkey=substr($authkey,0,32);

$db_link=Connect_DB();

$query="SELECT `id`,`email`,`status` FROM `resetpassword` WHERE `key` = '$authkey'";

if($query_run=mysqli_query($db_link,$query))
{
    if(mysqli_num_rows($query_run)!=0)
    {
        while($row=mysqli_fetch_assoc($query_run))
        {
            if($row['status']==0)
            {
                session_start();
                $_SESSION['email']=$row['email'];
                break;
            }
        }
        if(!isset($_SESSION['email']))
        {
            $url='http://'.$_SERVER['HTTP_HOST'];
            echo "<script>window.location='$url'</script>";
        }
        else
        {    
        require_once 'updatePassword.php';
        }
    }
    else
    {
        $url='http://'.$_SERVER['HTTP_HOST'];
        echo "<script>window.location='$url'</script>";
    }
}

mysqli_close($db_link);
}
else
{
    $url='http://'.$_SERVER['HTTP_HOST'];
    echo "<script>window.location='$url'</script>";
}


?>
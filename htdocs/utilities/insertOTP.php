<?php

if(isset($_GET['otp'])&&isset($_GET['mob']))
{
    require_once '../db/db_func.php';
    $otp=$_GET['otp'];
    $mob=$_GET['mob'];
    echo "<script>alert($mob)</script>";
    $db_link=Connect_DB();
    $query="INSERT INTO `otpreg` VALUES (null,'$mob','$otp','0')";
    if(mysqli_query($db_link,$query))
    {
        echo 1;
    }
    else
    {
        echo mysqli_error($db_link);
    }
    mysqli_close($db_link);
}

else if(isset($_GET['uopt'])&&isset($_GET['mob']))
{
    require_once '../db/db_func.php';
    $uotp=$_GET['otp'];
    $mob=$_GET['mob'];
    $db_link=Connect_DB();
    $query="SELECT `otp` FROM `otpreg` WHERE `mob` = '$mob'";
    if($query_run=mysqli_query($db_link,$query))
    {
        if(mysqli_num_rows($query_run)==1)
        {
            $row=mysqli_fetch_assoc($query_run);
            $db_otp=$row['otp'];
            if($db_otp==$utop)
            {
                echo '1';
            }
        }
        else
        {
            echo "No Users Found";
        }
    }
}

?>
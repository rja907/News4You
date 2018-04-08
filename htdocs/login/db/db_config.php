<?php

function Connect_DB()
{
    $db_host="localhost";
    //$db_user="myversal_login";
    $db_user="root";
    //$db_password="login12#$";
    $db_password="";
    $db_name="news_aggregator";
    if(@$db_link=mysqli_connect($db_host,$db_user,$db_password,$db_name))
    {
        //Connected Successfully;
        return $db_link;
    }

    else
    {
        die("Connection Error");
    }

}

?>
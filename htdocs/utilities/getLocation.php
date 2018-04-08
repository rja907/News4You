<?php
$filename="zip_codes.csv"; //zipcode csv file(must reside in same folder)
$status=0;
if(isset($_GET['pc']))
{
    $s=$_GET['pc'];
    $f = fopen($filename, "r");
    while ($row = fgetcsv($f))
    {

        if ($row[0] == $s) //0 mean number of column of zipcode
        {
            $status=1;
            $val= "0,$row[1]&$row[2]";
            break;
        }
    }

    if($status==0)
    {
        $val= "1,Invalid&Invalid";
    }
    echo $val;
    fclose($f);
}

?>
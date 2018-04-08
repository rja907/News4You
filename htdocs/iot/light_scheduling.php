<?php
require_once 'db/db_config';
$db_link=Connect_DB();
$query="SELECT FROM traffic_density order by time limit 4";
      $count=0;
      if($query_run=mysqli_query($db_link,$query))
      {
        while($row=mysqli_fetch_assoc($query_run)){
        	$nid=$row['nid'];
          	$cid=$row['cid'];
          	$td=$row['trafficdensity'];
			$arr=array();
			$arr["td"]=td$;

          	
          }
          if()
          echo $arr;
                    

      }

?>
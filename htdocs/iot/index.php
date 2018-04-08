<?php
  require_once 'db/db_config.php';
  $db_link=Connect_DB();

?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Display Panel</title>
        <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    	<div style="width:10%;margin:0 auto;"><p style="font-weight: bold">Input DataSet</p></div>
		 <?php
      
      {
      $query="SELECT * FROM traffic_density";
      if($query_run=mysqli_query($db_link,$query))
      {
        while($row=mysqli_fetch_assoc($query_run)){
          $nid=$row['nid'];
          $cid=$row['cid'];
          $td=$row['trafficdensity'];
          $time=$row['time'];
          echo "<table class='login_table'>";
          echo "<tr>
                <td>Node Number:$nid</td>
                <td>$nid</td>
                </tr>
                <tr>
                <td>Camera id:</td>
                <td>$cid</td>
                </tr>
                <tr>
                <td>Recorded Traffic density:</td>
                <td>$td</td>
                </tr>
                <tr>
                <td>TimeStamp:</td>
                <td> $time</td>
                </tr>";
          

          }       
      }
      
      {
        echo "<div style='width:10%;margin:0 auto;'><p style='font-weight: bold; '><br><br><br><br>Output Data</p></div>";
        $query="SELECT * FROM allotted_time where time=(SELECT MAX(time from 'allotted_time')";
      if($query_run=mysqli_query($db_link,$query))
        {
            while($row=mysqli_fetch_assoc($query_run)){
                   $nid=$row['nid'];
                   $lid=$row['lid'];
                   $at=$row['at'];
                   $time=$time['time'];
                   echo "<table class='login_table'>";
                    echo "<tr><p style='font-weight:bold'>Allotted Time output</p></tr>
                    <td>Node Number:</td>
                    <td>$nid</td>
                    </tr>
                    <tr>
                    <td>Signal Trigger Green to Red lane number:</td>
                    <td>$lid</td>
                    </tr>
                    <tr>
                    <td>Allotted time for green signal:</td>
                    <td>$at</td>
                    </tr>
                    <tr>
                    <td>TimeStamp:</td>
                    <td> strtotime($time)</td>
                    </tr>";   
                  }
        }
      }
      }
       $address = '127.0.0.1';
	  $port = 6789;
	  // Create a TCP Stream socket
      $sock = socket_create(AF_INET, SOCK_STREAM, 0); // 0 for  SQL_TCP
      // Bind the socket to an address/port
      socket_bind($sock, 0, $port) or die('Could not bind to address');  //0 for localhost
      // Start listening for connections
      socket_listen($sock);
      //loop and listen
      while (true) {
      /* Accept incoming  requests and handle them as child processes */
      $client =  socket_accept($sock);
      // Read the input  from the client – 1024000 bytes
      $input =  socket_read($client, 1024000);
      // Strip all white  spaces from input
      $output =  ereg_replace("[ \t\n\r]","",$input)."\0";
      $message=explode('=',$output);
      }
      ?>
	
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
  </body>
</html>

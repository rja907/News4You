    <?php
      require_once 'db/db_config.php';
      $db_link=Connect_DB();
      if(isset($_POST['submit']))
      {
      $dropdown=$_POST['dropdown'];
      if($dropdown=='i'){
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
                <td> strtotime($time)</td>
                </tr>";
          

          }       
      }
      else
      {
        $query="SELECT * FROM allotted_time where time=(SELECT MAX(time) from allotted_time";
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
      }
      ?>
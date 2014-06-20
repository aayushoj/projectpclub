<script>
  var id;
  function deleteshubh(a)
   { 
      id=a;
       $('#tutorial').modal('show');
   }
  function deletetut(){
    $.post('../deltut.php',{ id :id} );
    setTimeout(function(){window.open("<?php echo base_url();?>site/tutorial","_self");},100);
    
  } 
  function hidemodel()
  {
     $('#tutorial').modal('hide');
  }
</script>


<div class="ui column divided grid" style="margin:20px 10px;">
  <div class="row">
    <div class="one wide column">
      <div id="twitter"><a class="twitter-timeline" data-chrome=" noscrollbar" height="400px" width="300px" 
          href="https://twitter.com/Shubhamj13Jain/lists/pclub" data-widget-id="472778407084699648"></a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
      if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>

      <div class="table" style="width:300px; margin: 20px;">
      <table class="ui inverted table segment">
        <thead >
          <tr >
            <th colspan="3" style="text-align:center;color:#A52A2A;">Codechef Rankings</th>
          </tr>
          <tr id="table_head">
            <th>IITK Rank</th>
          <th>Username</th>
          <th>Country Rank</th>
        </tr></thead>
        <tbody>
            <?php
            for($i=1;$i<11;$i++){
              echo "<tr>";
              echo "<td>";
              echo $i;
              echo "</td>";
              $this->db->where('id', $i);
              $person = $this->db->get('codechef_top_rankers');
              $row=$person->row();
              echo "<td>";
              $url='http://www.codechef.com/users/'.$row->username;
              echo '<a href=' . $url . '>';
              echo $row->username;
              echo "</a>";
              echo "</td>";
              echo "<td>";
              echo $row->rank;
              echo "</td>";
              echo"</tr>";
            }
            ?>
        </tbody>
      </table>
      </div>
    </div>


    <div class="six wide column">
      <div style="padding:20px" >
        <?php 
        $dba=mysqli_connect('localhost','root','shubh','pclub_data')
        or die('Error connecting to MYSQL server.');
        $query="SELECT * FROM tutorial ORDER BY `id` DESC";
        $result=mysqli_query($dba,$query);
        while($row=mysqli_fetch_array($result)){
          echo "<div class='ui red message'>";
          echo "<div class='header'>";
          echo $row['title'];
          echo "</div>";
          echo "<p>" . $row['body'] . "</p>";
          $base= base_url()."file/";
         // echo $base.$row['filename'];
          echo '<a href="'.base_url().'file/'.rawurlencode($row['filename']).'" target="_blank">';
          echo $row['filename'];
          echo '</a>';
          $tutid=$row['id'];
          if($this->session->userdata('admin')){
             echo '<i class="trash icon link" title="Delete." style="float:right;" onclick="deleteshubh('.$tutid.');"></i>';
          }
          echo "</div>";
        }
        ?>
      </div>
    </div>


    <div class="one wide column" style="margin:30px;">
      <div class="ui small feed segment" style="background-color:#7FFFD4 height:100px;opacity:0.6;">
          <h4 class="ui header">Announcements</h4>
          <div class="event">
            <?php
              $dbc=mysqli_connect('localhost','root','shubh','pclub_data')
                or die('Error connecting to MYSQL server.');
              $query=" SELECT * FROM events ORDER BY `date` DESC";
              $query1="SELECT CURDATE()";
              $result1=mysqli_query($dbc,$query1);
              $result=mysqli_query($dbc,$query);
              $row=mysqli_fetch_array($result1);
              $date =  $row["CURDATE()"];
              while($row=mysqli_fetch_array($result)){
                if($row['date']>= $date){
                  echo"<h4 style='font-family:cursive;'>" . $row['name'] . "</h4>";
                  echo "<p>" . $row['venue'] ." ". $row['date'] . " " . $row['time'] . "</p>";
                  echo $row['about'];
                  echo"<br>";
                }
                else{
                  break;
                }
              }
            ?>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="ui basic modal" id="tutorial">
  <i class="massive trash icon" style="margin-left:200px;float:left;"></i>
  <p style="font-family:cursive;margin-left:400px;">Do you want to delete this tutorial ?</p>
  <br><br><br><br><br>
  <form action='site/home_tab' method='post'>
  <div class="ui buttons" style="margin-left:400px;float:left;">
  <div class="ui positive button" id="yes" onClick="deletetut()">Yes</div>
  <div class="or"></div>
  <div class="ui button" id="no" onClick="hidemodel()">No</div>
</div>
</form>
</div>
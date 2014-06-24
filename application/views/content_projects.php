<script>
  var id1;
  function deleteshubh_pro(a)
   { 
      id1=a;
       $('#delete_pro').modal('show');
   }
    function deletepro()
    {
      $.post('../delpro.php',{ id :id1} );
      setTimeout(function(){window.open("<?php echo base_url();?>site/projects","_self");},70);
      
    } 
    function hidemodel_pro()
    {
       $('#delete_pro').modal('hide');
    }
</script>

<div id="tutorial"style="margin-top:50px; margin-left:50px;">
<?php
if ( $this->session->userdata('is_logged_in'))
{
    $u=base_url();
echo'<a class="ui black button" href='.$u.'site/addpro'.'>';
echo 'Add PROJECT';echo'</a>';
}
?>

</div>
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
      <div style="padding:20px;" >
        <?php 
        $dba=mysqli_connect('localhost','root','shubh','pclub_data')
        or die('Error connecting to MYSQL server.');
        $query="SELECT * FROM project ORDER BY `id` DESC";
        $result=mysqli_query($dba,$query);
        
  
        while($row=mysqli_fetch_array($result)){
          echo '<div class="ui message" style="padding:30px;opacity:0.8;background-color:#C8C8C8;" id="project">';
        echo  '<div class="header" style="color:#000000;">';
        echo  $row['title'] ;
        echo '</div>';

        echo '<br>';
        echo '<div style="margin:10px;color:#000000;">';
        echo '<b>Description:</b>';
        echo  $row['description'];
              echo '</div>';
        if($row['wiki']!='')
        {
          echo '<div style="margin:10px;color:#000000;">';
          echo '<b>Wiki Link:</b>';
          echo '<a href='.$row['wiki'].'>';
          echo $row['wiki'];
          echo '</a>';
          echo "<br>";
                echo '</div>';
      }
      if($row['github']!='')
      {
        echo '<div style="margin:10px;color:#000000;">';
        echo '<b>Github Link:</b>';
        echo '<a href='.$row['github'].'>';
          echo $row['github'];
          echo '</a>';
          echo "<br>";
                echo '</div>';
      }
      if($row['project_status']!=''){
        echo '<div style="margin:10px;color:#000000;">';
        echo '<b>Project Status:</b>';
          echo $row['project_status'];
          echo "<br>";
                echo '</div>';
      }

        echo '<div style="margin:10px;color:#000000;">';
        echo '<b>Documentation:</b>';
        $base= base_url()."project/";
        echo '<a href='.$base.$row['filename'].'>';
        echo $row['filename'];
        echo '</a>';
        echo "<br>";
        echo '</div>';
        if($row['members']!=''){
          echo '<div style="margin:10px;color:#000000;">';
          echo '<b>Members:</b>';
            echo $row['members'];
            echo "<br>";
          echo '</div>';
        }
        if($this->session->userdata('username')==$row['username'] || $this->session->userdata('admin')){
          echo '<i class="trash icon link" title="Delete." style="float:right;" onclick="deleteshubh_pro('.$row['id'].');"></i>';
        }
        echo '</div>';
      }
        ?>

      </div>
    </div>


    <div class="one wide column" style="margin:30px;">
      <div style= "padding:20px;">
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
</div>



<div class="ui basic modal" id="delete_pro">
  <i class="massive trash icon" style="margin-left:200px;float:left;"></i>
  <p style="font-family:cursive;margin-left:400px;">Do you want to delete this tutorial ?</p>
  <br><br><br><br><br>
  <form action='site/home_tab' method='post'>
  <div class="ui buttons" style="margin-left:400px;float:left;">
  <div class="ui positive button" id="yes" onClick="deletepro()">Yes</div>
  <div class="or"></div>
  <div class="ui button" id="no" onClick="hidemodel_pro()">No</div>
</div>
</form>
</div>
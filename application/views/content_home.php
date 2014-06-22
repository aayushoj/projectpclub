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
        <div style="opacity:0.6;padding:20px;background-color:#C0C0C0;border-radius:30px;" id="mainbody">
          <p>
          <b><u>Programming Club</u></b>, also known as <b><u>P-Club</u></b>, is one of the most important part of 
            SnT council, IIT Kanpur. P-Club organizes regular lectures and competitions so 
            as to encourage people towards programming. If you are interested in Programming, this is a right place to learn and
            explore yourself. P-Club team is not just bounded by lectures and cpmpetions only. This club is much more.
            P-Club team is always ready to help people. You can ask your doubts on our <a href="http://localhost/website_new/forum"> 
            forum </a> and even post them on our <a href="https://www.facebook.com/groups/pclubiitk/">facebook group</a>
            any time.You can learn various programming fundas with fun, really too much of fun. Join us and enjoy with P-Club.
          </p>
          </div>
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
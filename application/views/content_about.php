
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
    	for($i=1;$i<6;$i++){
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
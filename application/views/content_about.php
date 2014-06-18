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
			<div class="team" style="background-color:rgba(0,0,0,0.71) ; border-radius:20px;opacity:1.0;">
				<div style="padding:20px" >
					<p style="font-size:20px;">Current</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Proneet Verma</li>
			            <li>Akshay Aggarwal</li>
			            <li>Triveni Mahata</li>
			            <li>Abhilash Kumar</li>
			        </ul>
			        <p><strong>PG Mentors</strong></p>
			        <ul>
			        </ul>

					<p style="font-size:20px;">2013-2014</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Shivanshu Agrawal</li>
			            <li>Ankush Sachdeva</li>
			            <li>Praveen Dhinwa</li>
			        </ul>

			        <p><strong>PG Mentors</strong></p>
			        <ul>
			            <li>Vikraman Choudhary</li>
			            <li>Vinkal Vishnoi</li>
			        </ul>

			    <!--     <p><strong>Secretaries</strong></p> -->
			        <p style="font-size:20px;">2012-2013</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Anshu Avinash</li>
			            <li>Rabi Shankar Guha</li>
			            <li>Mridul Verma</li>
			        </ul>
			        <p><strong>PG Mentors</strong></p>
			        <ul>
			            <li>Abhimanyu M A</li>
			            <li>Rizwan Hudda</li>
			        </ul>


			        <p style="font-size:20px;">2011-2012</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Adarsh J</li>
			            <li>Ankesh Kumar Singh</li>
			            <li>Ankit Mahato</li>
			        </ul>
			        <p><strong>Secretaries</strong></p>
			        <ul>
			            <li>Vinit Kataria</li>
			            <li>Mridul Verma</li>
			            <li>Shikhar Sharma</li>
			            <li>Rahul Arora</li>
			            <li>Rohit Gupta</li>
			            <li>Anshu Avinash</li>
			            <li>Priyanshu Ranjit</li>
			            <li>Ashita Prasad</li>
			        </ul>

			        <p style="font-size:20px;">2010-2011&nbsp;</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Utkarsh Lath</li>
			            <li>Shitikanth</li>
			            <li>Rahul Varma</li>
			        </ul>

			        <p><strong>Secretaries</strong></p>
			        <ul>
			            <li>Shubham Tulsiani</li>
			            <li>Pankaj More</li>
			            <li>Atul Agrawal</li>
			            <li>Ankit Mahato</li>
			            <li>Ankesh Kumar Singh</li>
			            <li>Deepa Sahchari</li>
			            <li>Pratik Moona</li>
			        </ul>

			        <p style="font-size:20px;">2009-2010</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Abhilash Jindal&nbsp;</li>
			            <li>Diptarka Chakravarty&nbsp;</li>
			        </ul>

			        <p style="font-size:20px;">2008-2009&nbsp;</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Ashish Kumar Agarwal&nbsp;</li>
			        </ul>
			        <p>&nbsp;</p>


			        <p style="font-size:20px;">2007-2008&nbsp;</p>
			        <p><strong>Coordinators</strong></p>
			        <ul>
			            <li>Ashish Bhatia</li>
			            <li>Ashok Chhilar</li>
			            <li>Kush Sharma</li>
			        </ul><p>&nbsp;</p>
			    </div>
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
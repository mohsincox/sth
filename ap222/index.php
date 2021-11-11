<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Agent Performence222</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
  	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
  	<style>.asteriskField{color: red;}</style>
	 <script>
		$( function() {
			// $( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true });
			// $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			// $( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true });
			// $( "#datepicker1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
			$( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
			$( "#datepicker" ).datepicker( "setDate", "0" );
			$( "#datepicker1" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: "yy-mm-dd" });
			$( "#datepicker1" ).datepicker( "setDate", "0" );
		} );
	 </script>
  	
</head>

<body>
<?php
	include_once("db_connection_asterisk.php");	
?>
	<div class="container-fluid">
		<div class="col-sm-offset-0 col-sm-12">
		  	<div class="panel panel-primary">
			    <div class="panel-heading text-center">
			    	<b><i style="font-size: 18px;">Date wise Agent Performance Report</i></b>
			    </div>
			    <div class="panel-body">
			    	<div class="row">
				    	<div class="col-sm-12">
					    	<center>
								<form class="form-inline" method="post" action="">
									<div class="form-group">
									  <label class="control-label requiredField" for="date">
										Start Date
										<span class="asteriskField">
										  *
										</span>
									  </label>
									  <div class="input-group">
										<input class="form-control" id="datepicker" name="start_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
									  </div>
								  	</div>
								  	<div class="form-group">
									  <label class="control-label requiredField" for="date">
										End Date
										<span class="asteriskField">
										  *
										</span>
									  </label>
									  <div class="input-group">
										<input class="form-control" id="datepicker1" name="end_date" placeholder="YYYY-MM-DD" type="text" required="" autocomplete="off" />
									  </div>
								  	</div>

					              	<div class="form-group">
					                	<button class="btn btn-primary " name="submit" type="submit">View</button>
					              	</div>
								</form>
							</center>
						</div>
					</div>

					<div class="row">
				    	<div class="col-sm-12">
							<?php
          						if(isset($_POST["submit"]))
          						{
          							$startDate = $_POST['start_date'];
          							$startDateTime = $startDate . ' 00:00:00';
          							$endDate = $_POST['end_date'];
          							$endDateTime = $endDate . ' 23:59:59';
            						echo "<h4 style='margin-bottom: 0px;'><center><span class='img-thumbnail bg-primary'>Start Date: <b>".$_POST['start_date']."</b>; End Date: <b>".$_POST['end_date']."</b></span></center></h4>";

                        		$sql = "SELECT user, SUM(status IS NOT NULL) as total_calls, SUM(pause_sec) as pause, SUM(wait_sec) as wait, SUM(talk_sec) as talk, AVG(talk_sec) as avgtalk, SUM(dispo_sec) as dispo, SUM(dead_sec) as dead, campaign_id, user_group,
                        		SUM(case when sub_status = 'LOGIN' then pause_sec end) as LOGIN, 
                        		SUM(case when sub_status = 'Prayer' then pause_sec end) as Prayer, 
                        		SUM(case when sub_status = 'Lunch' then pause_sec end) as Lunch, 
                        		SUM(case when sub_status = 'Tea' then pause_sec end) as Tea, 
                        		SUM(case when sub_status = 'Emerge' then pause_sec end) as Emerge, 
                        		SUM(case when sub_status = 'Meet' then pause_sec end) as Meet, 
                        		SUM(case when sub_status = 'Trning' then pause_sec end) as Trning
                        		FROM `vicidial_agent_log` WHERE event_time BETWEEN '$startDateTime' AND '$endDateTime' GROUP BY user";
                                    $result = mysqli_query($connAsterisk, $sql);
        					?>
        				</div>
					</div>

			        <div class="row">
			          	<div class="col-sm-12">
			          		<div class="table-responsive">
					            <table class="table table-striped table-bordered table-hover" id="example">
					              	<thead>
					                	<tr class="success">
					                  		<th>SL</th>
					                  		<th>Agent</th>
					                  		<th>Calls</th>
					                  		<th>Total Time</th>
					                 		<th style="color: red">Pause</th>
					                 		<th style="color: Green">Wait</th>
					                 		<th style="color: Green">Talk</th>
					                 		<th style="color: Green">Average Talk</th>
					                 		<th style="color: Green">Dispo</th>
					                 		<th style="color: Green">Dead</th>
					                 		<th style="color: #eb5b5e">Login</th>
					                 		<th style="color: #eb5b5e">Prayer</th>
					                 		<th style="color: #eb5b5e">Lunch</th>
					                 		<th style="color: #eb5b5e">Tea</th>
					                 		<th style="color: #eb5b5e">Emerge</th>
					                 		<th style="color: #eb5b5e">Meet</th>
					                 		<th style="color: #eb5b5e">Trning</th>
					                	</tr>
					              	</thead>
					              	<tbody>
					              		<?php
					              			$i = 0;
					              			if (mysqli_num_rows($result) > 0) {
    
    											while($row = mysqli_fetch_assoc($result)) {
    												$totalTime = $row["pause"] + $row["wait"] + $row["talk"] + $row["dispo"] + $row["dead"];

    												$totalInit = $totalTime;
													$totalHours = floor($totalInit / 3600);
													$totalMinutes = floor(($totalInit / 60) % 60);
													$totalSeconds = $totalInit % 60;
													//echo "$totalHours:$totalMinutes:$totalSeconds";

													$pauseInit = $row["pause"];
													$pauseHours = floor($pauseInit / 3600);
													$pauseMinutes = floor(($pauseInit / 60) % 60);
													$pauseSeconds = $pauseInit % 60;
													//echo "$pauseHours:$pauseMinutes:$pauseSeconds";

													$waitInit = $row["wait"];
													$waitHours = floor($waitInit / 3600);
													$waitMinutes = floor(($waitInit / 60) % 60);
													$waitSeconds = $waitInit % 60;
													//echo "$waitHours:$waitMinutes:$waitSeconds";

													$talkInit = $row["talk"];
													$talkHours = floor($talkInit / 3600);
													$talkMinutes = floor(($talkInit / 60) % 60);
													$talkSeconds = $talkInit % 60;
													//echo "$talkHours:$talkMinutes:$talkSeconds";

													$talkavg = $row["avgtalk"];
													$avgtalkHours = floor($talkavg / 3600);
													$avgtalkMinutes = floor(($talkavg / 60) % 60);
													$avgtalkSeconds = $talkavg % 60;
													//echo "$talkHours:$talkMinutes:$talkSeconds";

													$dispoInit = $row["dispo"];
													$dispoHours = floor($dispoInit / 3600);
													$dispoMinutes = floor(($dispoInit / 60) % 60);
													$dispoSeconds = $dispoInit % 60;
													//echo "$dispoHours:$dispoMinutes:$dispoSeconds";

													$deadInit = $row["dead"];
													$deadHours = floor($deadInit / 3600);
													$deadMinutes = floor(($deadInit / 60) % 60);
													$deadSeconds = $deadInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$LOGINInit = $row["LOGIN"];
													$LOGINHours = floor($LOGINInit / 3600);
													$LOGINMinutes = floor(($LOGINInit / 60) % 60);
													$LOGINSeconds = $LOGINInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$PrayerInit = $row["Prayer"];
													$PrayerHours = floor($PrayerInit / 3600);
													$PrayerMinutes = floor(($PrayerInit / 60) % 60);
													$PrayerSeconds = $PrayerInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$LunchInit = $row["Lunch"];
													$LunchHours = floor($LunchInit / 3600);
													$LunchMinutes = floor(($LunchInit / 60) % 60);
													$LunchSeconds = $LunchInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$TeaInit = $row["Tea"];
													$TeaHours = floor($TeaInit / 3600);
													$TeaMinutes = floor(($TeaInit / 60) % 60);
													$TeaSeconds = $TeaInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$EmergeInit = $row["Emerge"];
													$EmergeHours = floor($EmergeInit / 3600);
													$EmergeMinutes = floor(($EmergeInit / 60) % 60);
													$EmergeSeconds = $EmergeInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$MeetInit = $row["Meet"];
													$MeetHours = floor($MeetInit / 3600);
													$MeetMinutes = floor(($MeetInit / 60) % 60);
													$MeetSeconds = $MeetInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";

													$TrningInit = $row["Trning"];
													$TrningHours = floor($TrningInit / 3600);
													$TrningMinutes = floor(($TrningInit / 60) % 60);
													$TrningSeconds = $TrningInit % 60;
													//echo "$deadHours:$deadMinutes:$deadSeconds";
       									?>
       		 							<tr>
				                          	<td><?php echo ++$i; ?></td>
				                          	<td class="text-capitalize"><?php echo $row["user"]; ?></td>
				                          	<td><?php echo $row["total_calls"]; ?></td>
				                          	<td><?php echo "$totalHours:$totalMinutes:$totalSeconds"; ?></td>
				                          	<td><?php echo "$pauseHours:$pauseMinutes:$pauseSeconds"; ?></td>
				                          	<td><?php echo "$waitHours:$waitMinutes:$waitSeconds"; ?></td>
				                          	<td><?php echo "$talkHours:$talkMinutes:$talkSeconds"; ?></td>
				                          	<td><?php echo "$avgtalkHours:$avgtalkMinutes:$avgtalkSeconds"; ?></td>
				                          	<td><?php echo "$dispoHours:$dispoMinutes:$dispoSeconds"; ?></td>
				                          	<td><?php echo "$deadHours:$deadMinutes:$deadSeconds"; ?></td>
				                          	<td><?php echo "$LOGINHours:$LOGINMinutes:$LOGINSeconds"; ?></td>
				                          	<td><?php echo "$PrayerHours:$PrayerMinutes:$PrayerSeconds"; ?></td>
				                          	<td><?php echo "$LunchHours:$LunchMinutes:$LunchSeconds"; ?></td>
				                          	<td><?php echo "$TeaHours:$TeaMinutes:$TeaSeconds"; ?></td>
				                          	<td><?php echo "$EmergeHours:$EmergeMinutes:$EmergeSeconds"; ?></td>
				                          	<td><?php echo "$MeetHours:$MeetMinutes:$MeetSeconds"; ?></td>
				                          	<td><?php echo "$TrningHours:$TrningMinutes:$TrningSeconds"; ?></td>
				                          	
				                        </tr>

<?php
                                        $total_calls+=$row["total_calls"];
                                        $totaltime+=$totalTime;         
                                        $totaltme = $totaltime;
                                        $totalHours = floor($totaltme / 3600);
                                        $totalMinutes = floor(($totaltme / 60) % 60);
                                        $totalSeconds = $totaltme % 60;
                                                                        
                                        $pausetme+=$row["pause"];
                                        $totalpse = $pausetme;
                                        $pseHours = floor($pausetme / 3600);
                                        $pseMinutes = floor(($pausetme / 60) % 60);
                                        $pseSeconds = $pausetme % 60;
                                                                        
                                        $waittme += $row["wait"];
                                        $totalwait = $waittme;
                                        $wtHours = floor($waittme / 3600);
                                        $wtMinutes = floor(($waittme / 60) % 60);
                                        $wtSeconds = $waittme % 60;
                                                                        
                                        $talktme += $row["talk"];
                                        $totaltalk = $talktme;
                                        $tkHours = floor($talktme / 3600);
                                        $tkMinutes = floor(($talktme / 60) % 60);
                                        $tkSeconds = $talktme % 60;
                                                                        
                                        $avrgtk += $row["talk"];
                                        $totalavrg = $avrgtk/$total_calls;
                                        $tkavrgHours = floor($totalavrg / 3600);
                                        $tkavrgMinutes = floor(($totalavrg / 60) % 60);
                                        $tkavrgSeconds = $totalavrg % 60;
                                                                        
                                        $totaldispo += $row["dispo"];
                                        $dispotime = $totaldispo;
                                        $disHours = floor($totaldispo / 3600);
                                        $disavrgMinutes = floor(($totaldispo / 60) % 60);
                                        $disavrgSeconds = $totaldispo % 60;
                                                                        
                                        $totaldead += $row["dead"];
                                        $ttldeadtme = $totaldead;
                                        $ttldeadHours = floor($totaldead / 3600);
                                        $ttldeadMinutes = floor(($totaldead / 60) % 60);
                                        $ttldeadSeconds = $totaldead % 60;

                                        $totalLOGIN += $row["LOGIN"];
                                        $ttlLOGINtme = $totalLOGIN;
                                        $ttlLOGINHours = floor($totalLOGIN / 3600);
                                        $ttlLOGINMinutes = floor(($totalLOGIN / 60) % 60);
                                        $ttlLOGINSeconds = $totalLOGIN % 60;

                                        $totalPrayer += $row["Prayer"];
                                        $ttlPrayertme = $totalPrayer;
                                        $ttlPrayerHours = floor($totalPrayer / 3600);
                                        $ttlPrayerMinutes = floor(($totalPrayer / 60) % 60);
                                        $ttlPrayerSeconds = $totalPrayer % 60;

                                        $totalLunch += $row["Lunch"];
                                        $ttlLunchtme = $totalLunch;
                                        $ttlLunchHours = floor($totalLunch / 3600);
                                        $ttlLunchMinutes = floor(($totalLunch / 60) % 60);
                                        $ttlLunchSeconds = $totalLunch % 60;

                                        $totalTea += $row["Tea"];
                                        $ttlTeatme = $totalTea;
                                        $ttlTeaHours = floor($totalTea / 3600);
                                        $ttlTeaMinutes = floor(($totalTea / 60) % 60);
                                        $ttlTeaSeconds = $totalTea % 60;

                                        $totalEmerge += $row["Emerge"];
                                        $ttlEmergetme = $totalEmerge;
                                        $ttlEmergeHours = floor($totalEmerge / 3600);
                                        $ttlEmergeMinutes = floor(($totalEmerge / 60) % 60);
                                        $ttlEmergeSeconds = $totalEmerge % 60;

                                        $totalMeet += $row["Meet"];
                                        $ttlMeettme = $totalMeet;
                                        $ttlMeetHours = floor($totalMeet / 3600);
                                        $ttlMeetMinutes = floor(($totalMeet / 60) % 60);
                                        $ttlMeetSeconds = $totalMeet % 60;

                                        $totalTrning += $row["Trning"];
                                        $ttlTrningtme = $totalTrning;
                                        $ttlTrningHours = floor($totalTrning / 3600);
                                        $ttlTrningMinutes = floor(($totalTrning / 60) % 60);
                                        $ttlTrningSeconds = $totalTrning % 60;
                                                                        
   												}
//                                                                                                echo $total_calls;
                                                                                                ?>
                                <tr>
                                    <td></td>
                                    <td colspan="1"><b style="color: blue">Total : </b></td>
                                    <td><?php echo $total_calls; ?></td>
                                    <td><?php echo "$totalHours:$totalMinutes:$totalSeconds"; ?></td>
                                    <td><?php echo "$pseHours:$pseMinutes:$pseSeconds"; ?></td>
                                    <td><?php echo "$wtHours:$wtMinutes:$wtSeconds"; ?></td>
                                    <td><?php echo "$tkHours:$tkMinutes:$tkSeconds"; ?></td>
                                    <td><?php echo "$tkavrgHours:$tkavrgMinutes:$tkavrgSeconds"; ?></td>
                                    <td><?php echo "$disHours:$disavrgMinutes:$disavrgSeconds"; ?></td>
                                    <td><?php echo "$ttldeadHours:$ttldeadMinutes:$ttldeadSeconds"; ?></td>
                                    <td><?php echo "$ttlLOGINHours:$ttlLOGINMinutes:$ttlLOGINSeconds"; ?></td>
                                    <td><?php echo "$ttlPrayerHours:$ttlPrayerMinutes:$ttlPrayerSeconds"; ?></td>
                                    <td><?php echo "$ttlLunchHours:$ttlLunchMinutes:$ttlLunchSeconds"; ?></td>
                                    <td><?php echo "$ttlTeaHours:$ttlTeaMinutes:$ttlTeaSeconds"; ?></td>
                                    <td><?php echo "$ttlEmergeHours:$ttlEmergeMinutes:$ttlEmergeSeconds"; ?></td>
                                    <td><?php echo "$ttlMeetHours:$ttlMeetMinutes:$ttlMeetSeconds"; ?></td>
                                    <td><?php echo "$ttlTrningHours:$ttlTrningMinutes:$ttlTrningSeconds"; ?></td>
                                </tr>
                                    <?php  
											} else {
    											echo "<h4><center><span class='img-thumbnail bg-danger'>There is no data in between <b>".$_POST['start_date']."</b> & <b>".$_POST['end_date']."</b></span></center></h4>";
											}
											mysqli_close($connAsterisk);
					              		?> 
					              	</tbody>
					            </table>
			        		</div>
			          	</div>
			        </div>




			       <!--  <div style="float:right;">
                    <a href="excel.php?idate=<?php print $startDateTime;?>&edate=<?php print $endDateTime;?>">                 
                     <button class="btn btn-success " name="submit" type="submit">Export to Excel</button>
                    </a>
                    </div> -->






			        <?php
			    		}
			        ?>
			    </div>

			  	</div>	
	  	</div>	


	  				  				  
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable( {
		        dom: 'Bfrtip',
		        buttons: [
		            'excel'
		        ]
		    } );
		} );
	</script>
</body>
</html>

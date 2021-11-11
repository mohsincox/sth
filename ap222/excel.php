<?php


$Vux0pnrxwwoc = "localhost";		
$Vg15gd34rj3e = "intrade_apu";				 
$Vig3xellb3a5 = "Q04+o%?(!!f^";				
$Vwkkxvyng1jx = "asterisk";				
$Va4oj4v3npog = "vicidial_agent_log";				



$Vb0canwjclar = $_GET['idate'];
$Vpp0r3pliqnc = $_GET['edate'];
$startDateTime = $Vb0canwjclar . ' 00:00:00';
$endDateTime = $Vpp0r3pliqnc . ' 23:59:59';




//$Voxzv1p3efdn = "SELECT * FROM `vicidial_did_log` WHERE caller_id_number NOT IN (select phone_number from vicidial_closer_log WHERE (call_date >='$Vb0canwjclar 00:00:01' AND call_date <='$Vpp0r3pliqnc 23:59:59'))AND (call_date >='$Vb0canwjclar 00:00:01' AND call_date <='$Vpp0r3pliqnc 23:59:59') AND did_route !='F_EXTEN' GROUP BY caller_id_number";
//$Voxzv1p3efdn = "SELECT caller_id_number,call_date FROM vicidial_did_log "
//               . "WHERE NOT EXISTS  (SELECT * FROM vicidial_closer_log WHERE vicidial_did_log.uniqueid=vicidial_closer_log.uniqueid)"
//               . "AND vicidial_did_log.call_date >='$Vb0canwjclar 00:00:01' AND vicidial_did_log.call_date <='$Vpp0r3pliqnc 23:59:59'";


//$Voxzv1p3efdn = "SELECT `caller_code`,`start_time`,`end_time`,`length_in_sec` FROM call_log WHERE NOT EXISTS (SELECT * FROM vicidial_closer_log "
//        . "WHERE call_log.uniqueid=vicidial_closer_log.uniqueid)"
//        . "AND call_log.start_time >='$Vb0canwjclar 00:00:01' AND call_log.start_time <='$Vpp0r3pliqnc 23:59:59' AND `channel_group`='DID_INBOUND'";


$Voxzv1p3efdn = "SELECT user, COUNT(agent_log_id) as total_calls, SUM(pause_sec) as pause, SUM(wait_sec) as wait, SUM(talk_sec) as talk, SUM(dispo_sec) as dispo, SUM(dead_sec) as dead, campaign_id, user_group FROM `vicidial_agent_log` WHERE status IS NOT NULL AND event_time BETWEEN '$startDateTime' AND '$endDateTime' GROUP BY user";

//echo $Voxzv1p3efdn;

$Vf1vc4bezqch = 1;


$Vo1sjsoh1zpn = date('l jS \ F Y h:i:s A');

$Vsintyhtjeom = "\t\t\t\t\t\t--- iDialer Report ---  ".""."\n\t\t\t\t\t\tSheba XYZ\n\t\t\t\t\tCustomer Relationship Department\n\n\t\t\t\t\t".$Vo1sjsoh1zpn."\n\n";


$Vpna11bvmts3 = @mysql_connect($Vux0pnrxwwoc, $Vg15gd34rj3e, $Vig3xellb3a5)
	or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());

$Vocjxley2t25 = @mysql_select_db($Vwkkxvyng1jx, $Vpna11bvmts3)
	or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());


mysql_query("SET CHARACTER SET utf8");
mysql_query("SET SESSION collation_connection =utf8_general_ci"); 
$Vbng1enkfqd4 = @mysql_query($Voxzv1p3efdn,$Vpna11bvmts3)
	or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());



if (isset($Vmiflyyi3i55) && ($Vmiflyyi3i55==1))
{
	$Vdmckrhyrjlr = "msword";
	$Vh2d0jhi411j = "doc";
}else {
	$Vdmckrhyrjlr = "vnd.ms-excel";
	$Vh2d0jhi411j = "xls";
}


header("Content-Type: application/$Vdmckrhyrjlr");
header("Content-Disposition: attachment; filename=Date Wise Agent Performance Report.$Vh2d0jhi411j");
header("Pragma: no-cache");
header("Expires: 0");



if (isset($Vmiflyyi3i55) && ($Vmiflyyi3i55==1)) 
{
	
	
	if ($Vf1vc4bezqch == 1)
	{
		echo("$Vsintyhtjeom\n\n");
	}
	
	$Vtox4kx2o00e = "\n"; 

	while($Vi5wljxsz2dr = mysql_fetch_row($Vbng1enkfqd4))
	{
		
		$V5e4r0kundip = "";
		for($Vt3psruod0pi=0; $Vt3psruod0pi<mysql_num_fields($Vbng1enkfqd4);$Vt3psruod0pi++)
		{
		
		$V3gz2ixh3hg3 = mysql_field_name($Vbng1enkfqd4,$Vt3psruod0pi);
		
		$V5e4r0kundip .= "$V3gz2ixh3hg3:\t";
			if(!isset($Vi5wljxsz2dr[$Vt3psruod0pi])) {
				$V5e4r0kundip .= "NULL".$Vtox4kx2o00e;
				}
			elseif ($Vi5wljxsz2dr[$Vt3psruod0pi] != "") {
				$V5e4r0kundip .= "$Vi5wljxsz2dr[$Vt3psruod0pi]".$Vtox4kx2o00e;
				}
			else {
				$V5e4r0kundip .= "".$Vtox4kx2o00e;
				}
		}
		$V5e4r0kundip = str_replace($Vtox4kx2o00e."$", "", $V5e4r0kundip);
		$V5e4r0kundip .= "\t";
		print(trim($V5e4r0kundip));
		
		
		print "\n----------------------------------------------------\n";
	}
}else{
	
	
	if ($Vf1vc4bezqch == 1)
	{
		echo("$Vsintyhtjeom\n");
	}
	
	$Vtox4kx2o00e = "\t"; 

	
	for ($Vexxv5dcu44b = 0; $Vexxv5dcu44b < mysql_num_fields($Vbng1enkfqd4); $Vexxv5dcu44b++)
	{
		echo mysql_field_name($Vbng1enkfqd4,$Vexxv5dcu44b) . "\t";
	}
	print("\n");
	

	
	while($Vi5wljxsz2dr = mysql_fetch_row($Vbng1enkfqd4))
	{
		
		$V5e4r0kundip = "";
		for($Vt3psruod0pi=0; $Vt3psruod0pi<mysql_num_fields($Vbng1enkfqd4);$Vt3psruod0pi++)
		{
			if(!isset($Vi5wljxsz2dr[$Vt3psruod0pi]))
				$V5e4r0kundip .= "NULL".$Vtox4kx2o00e;
			elseif ($Vi5wljxsz2dr[$Vt3psruod0pi] != "")
				$V5e4r0kundip .= "$Vi5wljxsz2dr[$Vt3psruod0pi]".$Vtox4kx2o00e;
			else
				$V5e4r0kundip .= "".$Vtox4kx2o00e;
		}
		$V5e4r0kundip = str_replace($Vtox4kx2o00e."$", "", $V5e4r0kundip);
		
		
		
		$V5e4r0kundip = preg_replace("/\r\n|\n\r|\n|\r/", " ", $V5e4r0kundip);
		$V5e4r0kundip .= "\t";
		print(trim($V5e4r0kundip));
		print "\n";
	}
}

?>


<?php  ?>
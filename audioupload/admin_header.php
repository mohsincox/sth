<?php
# admin_header.php - VICIDIAL administration header
#
# Copyright (C) 2018  Matt Florell <vicidial@gmail.com>    LICENSE: AGPLv2
# 

# CHANGES
# 90310-0709 - First Build
# 90508-0542 - Added Call Menu option, changed script to use long PHP tags
# 90514-0605 - Added audio prompt selection functions
# 90530-1206 - Changed List Mix to allow for 40 mixes and a default populate option
# 90531-2339 - Added Dynamic options for Call Menu
# 90612-0852 - Changed relative links
# 90635-0943 - Added javascript for dynamic menus in In-Groups
# 90627-0548 - Added no-agent-no-queue options
# 90628-1016 - Added Text-to-speech options
# 90830-2213 - Added Music On Hold options
# 90904-1534 - Added launch_moh_chooser
# 90916-2334 - Added Voicemail options
# 91223-1030 - Added VIDPROMPT options for in-group routing in Call Menus
# 100311-2210 - Added callcard_enabled Admin element
# 100428-1039 - Added custom fields display
# 100507-1339 - Added copy carrier submenu
# 100616-2350 - Added VIDPROMPT call menu options
# 100728-0904 - Changed Lead Loader link to the new 3rd gen lead loader
# 100802-2127 - Changed Admin to point to links page instead of Phones listings
# 100831-2255 - Added password strength checking function
# 100914-1311 - Removed other links for reports-only users
# 101022-1323 - Added IGU_selectall function
# 101107-1133 - Added auto-refresh code
# 110215-1720 - Added the Add a new lead link
# 110322-1228 - Added user ID logged in as next to Logout link
# 110624-1439 - Added Screen Labels sub-section to Admin
# 110831-2048 - Added AC-CID to campaign submenu
# 110922-1707 - Added RA-EXTEN to campaign submenu
# 111015-2305 - Added Contacts menu to Admin
# 111106-0939 - Changes for user group restrictions
# 111116-0208 - Added ALT and ADDR3 in-group handle methods
# 120402-2134 - Changed lead loader link to fourth gen
# 121116-1412 - Added QC functionality
# 121123-0911 - Added Call Times Holidays Inbound functionality
# 121214-2238 - Added email menus
# 130221-1830 - Added Level 8 disable add option
# 130610-1040 - Finalized changing of all ereg instances to preg
# 130615-2314 - Changed Reports only and QC only headers
# 130824-2324 - Changed to mysqli PHP functions
# 140126-1022 - Added VMAIL_NO_INST option
# 140706-0828 - Incorporated QC includes into code
# 141001-2200 - Finalized adding QXZ translation to all admin files
# 141128-1009 - Added code for languages section
# 141230-0927 - Changed single-quote QXZ arguments to double-quotes
# 150227-1614 - Formatting issue #831
# 150307-0915 - Fixes for QXZ
# 150806-1023 - Added code for Admin -> Settings Containers
# 150808-2043 - Added compatibility for custom fields data option
# 151020-0654 - Added Status Groups
# 151203-1922 - Fix for javascript timezone issues in editing of timeclock entries
# 151212-0858 - Added Chat link at top of page
# 160312-1656 - Added FORM_selectall javascript, also used it to replace IGU_selectall
# 160325-1428 - Changed layout of sidebar links
# 160327-0146 - Changes to design
# 160328-1930 - Fixed display bugs
# 160330-1600 - Redesign of Admin sub-menu and added icons
# 160404-0934 - design changes
# 160429-1014 - Added admin_row_click option
# 160507-2324 - Added screen colors section
# 160611-2229 - Added style for diff on admin changes
# 160617-1426 - Added link from screen colors to system settings screen color settings
# 161101-2129 - Added user_new_lead_limit Users subhead
# 161103-2136 - Added agent_soundboards option
# 170113-1633 - Added dynamic call menu in-group option DYNAMIC_INGROUP_VAR for use with cm_phonesearch.agi
# 170304-1354 - Added Automated Reports section to Admin
# 170409-0757 - Added IP Lists
# 170623-2113 - Changed password strength parameters
# 170821-2010 - Fix for issue #1036
# 180213-1657 - Added CID Groups
# 180512-1105 - Changed to dynamic DB help
# 180614-2200 - Modified audio chooser window to appear at height where mouse was clicked in JS functions
# 180618-2300 - Modified calls to audio file chooser function
# 180716-2120 - Fix for audio chooser bug on call menu screen
#

$stmt="SELECT admin_home_url,enable_tts_integration,callcard_enabled,custom_fields_enabled,allow_emails,level_8_disable_add,allow_chats,enable_languages,admin_row_click,admin_screen_colors,user_new_lead_limit,user_territories_active,qc_features_active,agent_soundboards,enable_drop_lists,allow_ip_lists from system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$admin_home_url_LU =		$row[0];
$SSenable_tts_integration = $row[1];
$SScallcard_enabled =		$row[2];
$SScustom_fields_enabled =	$row[3];
$SSemail_enabled =			$row[4];
$SSlevel_8_disable_add =	$row[5];
$SSchat_enabled =			$row[6];
$SSenable_languages =		$row[7];
$SSadmin_row_click =		$row[8];
$SSadmin_screen_colors =	$row[9];
$SSuser_new_lead_limit =	$row[10];
$SSuser_territories_active = $row[11];
$SSqc_features_active =		$row[12];
$SSagent_soundboards =		$row[13];
$SSenable_drop_lists =		$row[14];
$SSallow_ip_lists =			$row[15];

$SSmenu_background='FFFFFF';
$SSframe_background='FFFFFF';
$SSstd_row1_background='7FFFD4';
$SSstd_row2_background='B9CBFD';
$SSstd_row3_background='8EBCFD';
$SSstd_row4_background='B6D3FC';
$SSstd_row5_background='A3C3D6';
$SSalt_row1_background='BDFFBD';
$SSalt_row2_background='99FF99';
$SSalt_row3_background='CCFFCC';

if ($SSadmin_screen_colors != 'default')
	{
	$stmt = "SELECT menu_background,frame_background,std_row1_background,std_row2_background,std_row3_background,std_row4_background,std_row5_background,alt_row1_background,alt_row2_background,alt_row3_background,web_logo FROM vicidial_screen_colors where colors_id='$SSadmin_screen_colors';";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "$stmt\n";}
	$colors_ct = mysqli_num_rows($rslt);
	if ($colors_ct > 0)
		{
		$row=mysqli_fetch_row($rslt);
		$SSmenu_background =		$row[0];
		$SSframe_background =		$row[1];
		$SSstd_row1_background =	$row[2];
		$SSstd_row2_background =	$row[3];
		$SSstd_row3_background =	$row[4];
		$SSstd_row4_background =	$row[5];
		$SSstd_row5_background =	$row[6];
		$SSalt_row1_background =	$row[7];
		$SSalt_row2_background =	$row[8];
		$SSalt_row3_background =	$row[9];
		$SSweb_logo =				$row[10];
		}
	}
$Mhead_color =	$SSstd_row5_background;
$Mmain_bgcolor = $SSmenu_background;
$Mhead_color =	$SSstd_row5_background;

$selected_logo = "./images/vicidial_admin_web_logo.png";
$selected_small_logo = "./images/vicidial_admin_web_logo.png";
$logo_new=0;
$logo_old=0;
$logo_small_old=0;
if (file_exists('./images/vicidial_admin_web_logo.png')) {$logo_new++;}
if (file_exists('vicidial_admin_web_logo_small.gif')) {$logo_small_old++;}
if (file_exists('vicidial_admin_web_logo.gif')) {$logo_old++;}
if ($SSweb_logo=='default_new')
	{
	$selected_logo = "./images/vicidial_admin_web_logo.png";
	$selected_small_logo = "./images/vicidial_admin_web_logo.png";
	}
if ( ($SSweb_logo=='default_old') and ($logo_old > 0) )
	{
	$selected_logo = "./vicidial_admin_web_logo.gif";
	$selected_small_logo = "./vicidial_admin_web_logo_small.gif";
	}
if ( ($SSweb_logo!='default_new') and ($SSweb_logo!='default_old') )
	{
	if (file_exists("./images/vicidial_admin_web_logo$SSweb_logo")) 
		{
		$selected_logo = "./images/vicidial_admin_web_logo$SSweb_logo";
		$selected_small_logo = "./images/vicidial_admin_web_logo$SSweb_logo";
		}
	}


##### BEGIN populate dynamic header content #####
if ($hh=='users') 
	{
	$users_hh="CLASS=\"head_style_selected\""; $users_fc="$users_font"; $users_bold="$header_selected_bold";
	$users_icon="<img src=\"images/icon_black_users.png\" border=0 alt=\"Users\" width=14 height=14 valign=middle>";
	}
else 
	{
	$users_hh="CLASS=\"head_style\""; $users_fc='WHITE'; $users_bold="$header_nonselected_bold";
	$users_icon="<img src=\"images/icon_users.png\" border=0 alt=\"Users\" width=14 height=14 valign=middle>";
	}
if ($hh=='campaigns') 
	{
	$campaigns_hh="CLASS=\"head_style_selected\""; $campaigns_fc="$campaigns_font"; $campaigns_bold="$header_selected_bold";
	$campaigns_icon="<img src=\"images/icon_black_campaigns.png\" border=0 alt=\"Campaigns\" width=14 height=14 valign=middle>";
	}
else 
	{
	$campaigns_hh="CLASS=\"head_style\""; $campaigns_fc='WHITE'; $campaigns_bold="$header_nonselected_bold";
	$campaigns_icon="<img src=\"images/icon_campaigns.png\" border=0 alt=\"Campaigns\" width=14 height=14 valign=middle>";
	}
if ($hh=='lists') 
	{
	$lists_hh="CLASS=\"head_style_selected\""; $lists_fc="$lists_font"; $lists_bold="$header_selected_bold";
	$lists_icon="<img src=\"images/icon_black_lists.png\" border=0 alt=\"Lists\" width=14 height=14 valign=middle>";
	}
else 
	{
	$lists_hh="CLASS=\"head_style\""; $lists_fc='WHITE'; $lists_bold="$header_nonselected_bold";
	$lists_icon="<img src=\"images/icon_lists.png\" border=0 alt=\"Lists\" width=14 height=14 valign=middle>";
	}
if ($hh=='ingroups') 
	{
	$ingroups_hh="CLASS=\"head_style_selected\""; $ingroups_fc="$ingroups_font"; $ingroups_bold="$header_selected_bold";
	$inbound_icon="<img src=\"images/icon_black_inbound.png\" border=0 alt=\"Inbound\" width=14 height=14 valign=middle>";
	}
else 
	{
	$ingroups_hh="CLASS=\"head_style\""; $ingroups_fc='WHITE'; $ingroups_bold="$header_nonselected_bold";
	$inbound_icon="<img src=\"images/icon_inbound.png\" border=0 alt=\"Inbound\" width=14 height=14 valign=middle>";
	}
if ($hh=='remoteagent') 
	{
	$remoteagent_hh="CLASS=\"head_style_selected\""; $remoteagent_fc="$remoteagent_font"; $remoteagent_bold="$header_selected_bold";
	$remoteagents_icon="<img src=\"images/icon_black_remoteagents.png\" border=0 alt=\"Remote Agents\" width=14 height=14 valign=middle>";
	}
else 
	{
	$remoteagent_hh="CLASS=\"head_style\""; $remoteagent_fc='WHITE'; $remoteagent_bold="$header_nonselected_bold";
	$remoteagents_icon="<img src=\"images/icon_remoteagents.png\" border=0 alt=\"Remote Agents\" width=14 height=14 valign=middle>";
	}
if ($hh=='usergroups') 
	{
	$usergroups_hh="CLASS=\"head_style_selected\""; $usergroups_fc="$usergroups_font"; $usergroups_bold="$header_selected_bold";
	$usergroups_icon="<img src=\"images/icon_black_usergroups.png\" border=0 alt=\"User Groups\" width=14 height=14 valign=middle>";
	}
else 
	{
	$usergroups_hh="CLASS=\"head_style\""; $usergroups_fc='WHITE'; $usergroups_bold="$header_nonselected_bold";
	$usergroups_icon="<img src=\"images/icon_usergroups.png\" border=0 alt=\"User Groups\" width=14 height=14 valign=middle>";
	}
if ($hh=='scripts') 
	{
	$scripts_hh="CLASS=\"head_style_selected\""; $scripts_fc="$scripts_font"; $scripts_bold="$header_selected_bold";
	$scripts_icon="<img src=\"images/icon_black_scripts.png\" border=0 alt=\"Scripts\" width=14 height=14 valign=middle>";
	}
else 
	{
	$scripts_hh="CLASS=\"head_style\""; $scripts_fc='WHITE'; $scripts_bold="$header_nonselected_bold";
	$scripts_icon="<img src=\"images/icon_scripts.png\" border=0 alt=\"Scripts\" width=14 height=14 valign=middle>";
	}
if ($hh=='filters') 
	{
	$filters_hh="CLASS=\"head_style_selected\""; $filters_fc="$filters_font"; $filters_bold="$header_selected_bold";
	$filters_icon="<img src=\"images/icon_black_filters.png\" border=0 alt=\"Filters\" width=14 height=14 valign=middle>";
	}
else 
	{
	$filters_hh="CLASS=\"head_style\""; $filters_fc='WHITE'; $filters_bold="$header_nonselected_bold";
	$filters_icon="<img src=\"images/icon_filters.png\" border=0 alt=\"Filters\" width=14 height=14 valign=middle>";
	}
if ($hh=='admin') 
	{
	$admin_hh="CLASS=\"head_style_selected\""; $admin_fc="$admin_font"; $admin_bold="$header_selected_bold";
	$admin_icon="<img src=\"images/icon_black_admin.png\" border=0 alt=\"Admin\" width=14 height=14 valign=middle>";
	}
else 
	{
	$admin_hh="CLASS=\"head_style\""; $admin_fc='WHITE'; $admin_bold="$header_nonselected_bold";
	$admin_icon="<img src=\"images/icon_admin.png\" border=0 alt=\"Admin\" width=14 height=14 valign=middle>";
	}
if ($hh=='reports') 
	{
	$reports_hh="CLASS=\"head_style_selected\""; $reports_fc="$reports_font"; $reports_bold="$header_selected_bold";
	$reports_icon="<img src=\"images/icon_black_reports.png\" border=0 alt=\"Reports\" width=14 height=14 valign=middle>";
	}
else 
	{
	$reports_hh="CLASS=\"head_style\""; $reports_fc='WHITE'; $reports_bold="$header_nonselected_bold";
	$reports_icon="<img src=\"images/icon_reports.png\" border=0 alt=\"Reports\" width=14 height=14 valign=middle>";
	}
if ($hh=='qc')
	{
	$qc_hh="CLASS=\"head_style_selected\""; $qc_fc="$qc_font"; $qc_bold="$header_selected_bold";
	$qc_icon="<img src=\"images/icon_black_qc.png\" border=0 alt=\"Quality Control\" width=14 height=14 valign=middle>";
	}
else 
	{
	$qc_hh="CLASS=\"head_style\""; $qc_fc='WHITE'; $qc_bold="$header_nonselected_bold";
	$qc_icon="<img src=\"images/icon_qc.png\" border=0 alt=\"Quality Control\" width=14 height=14 valign=middle>";
	}
##### END populate dynamic header content #####



######################### SMALL HTML HEADER BEGIN #######################################
if($short_header)
	{
	?>
	<TABLE CELLPADDING=0 CELLSPACING=0 BGCOLOR=#<?php echo "$SSmenu_background" ?>><TR>
	<TD><A HREF="./admin.php"><IMG SRC="<?php echo $selected_small_logo; ?>" WIDTH=71 HEIGHT=22 BORDER=0 ALT="System logo"></A> &nbsp; </TD>
	<?php 
	if ( ($reports_only_user < 1) and ($qc_only_user < 1) )
		{
	?>
	<TD> &nbsp; <A HREF="admin.php?ADD=999999" ALT="Reports" STYLE="text-decoration:none;"><?php echo $reports_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Reports"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=0A" ALT="Users" STYLE="text-decoration:none;"><?php echo $users_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Users"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=10" ALT="Campaigns" STYLE="text-decoration:none;"><?php echo $campaigns_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Campaigns"); ?></B></FONT></A> &nbsp; </TD>
	<?php
	if (($SSqc_features_active=='1') && ($qc_auth=='1')) 
		{
		?>
		<TD> &nbsp; <A HREF="admin.php?ADD=100000000000000" ALT="Quality Control" STYLE="text-decoration:none;"><?php echo $qc_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Quality Control"); ?></B></FONT></A> &nbsp; </TD>
		<?php
		}
	?>
	<TD> &nbsp; <A HREF="admin.php?ADD=100" ALT="Lists" STYLE="text-decoration:none;"><?php echo $lists_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Lists"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=1000000" ALT="Scripts" STYLE="text-decoration:none;"><?php echo $scripts_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Scripts"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=10000000" ALT="Filters" STYLE="text-decoration:none;"><?php echo $filters_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Filters"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=1000" ALT="Inbound" STYLE="text-decoration:none;"><?php echo $inbound_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Inbound"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=100000" ALT="User Groups" STYLE="text-decoration:none;"><?php echo $usergroups_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("User Groups"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=10000" ALT="Remote Agents" STYLE="text-decoration:none;"><?php echo $remoteagents_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Remote Agents"); ?></B></FONT></A> &nbsp; </TD>
	<TD> &nbsp; <A HREF="admin.php?ADD=999998" ALT="Admin" STYLE="text-decoration:none;"><?php echo $admin_icon ?> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Admin"); ?></B></FONT></A> &nbsp; </TD>
	<?php 
		}
	else 
		{ 
		?>
		<TD width=600> &nbsp; &nbsp; </TD>
		<?php
		if ($reports_only_user > 0)
			{
			?>
			<TD> &nbsp; <A HREF="admin.php?ADD=999999" ALT="Reports"><FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Reports"); ?></B></A> &nbsp; </TD>
			<?php
			}
		else
			{
			if (($SSqc_features_active=='1') && ($qc_auth=='1')) 
				{
				?>
				<TD> &nbsp; <A HREF="admin.php?ADD=100000000000000" ALT="Quality Control"><FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo _QXZ("Quality Control"); ?></B></FONT></A> &nbsp; </TD>
				<?php
				}
			}
		}
	?>
	</TR>
	</TABLE>
	<?php
	}
######################### SMALL HTML HEADER END #######################################


######################### FULL HTML HEADER BEGIN #######################################
else
{
if ($no_title < 1) {echo "</title>\n";}
echo "<script language=\"Javascript\">\n";
echo "var field_name = '';\n";
echo "var user = '$PHP_AUTH_USER';\n";
echo "var epoch = '" . date("U") . "';\n";

if ($TCedit_javascript > 0)
	{
	 ?>

	function run_submit()
		{
		calculate_hours();
		var go_submit = document.getElementById("go_submit");
		if (go_submit.disabled == false)
			{
			document.edit_log.submit();
			}
		}

	// Calculate login time
	function calculate_hours() 
		{
		var now_epoch = '<?php echo $StarTtimE ?>';
		var local_gmt_sec = '<?php echo $local_gmt_sec ?>';
		var local_gmt_sec = (local_gmt_sec * 1);
		var i=0;
		var total_percent=0;
		var SPANlogin_time = document.getElementById("LOGINlogin_time");
		var LI_date = document.getElementById("LOGINbegin_date");
		var LO_date = document.getElementById("LOGOUTbegin_date");
		var LI_datetime = LI_date.value;
		var LO_datetime = LO_date.value;
		var LI_datetime_array=LI_datetime.split(" ");
		var LI_date_array=LI_datetime_array[0].split("-");
		var LI_time_array=LI_datetime_array[1].split(":");
		var LO_datetime_array=LO_datetime.split(" ");
		var LO_date_array=LO_datetime_array[0].split("-");
		var LO_time_array=LO_datetime_array[1].split(":");

		// Calculate milliseconds since 1970 for each date string and find diff
		var LI_date_epoch = Date.UTC(LI_date_array[0], (LI_date_array[1]-1), LI_date_array[2], LI_time_array[0], LI_time_array[1], LI_time_array[2]);
		var LO_date_epoch = Date.UTC(LO_date_array[0], (LO_date_array[1]-1), LO_date_array[2], LO_time_array[0], LO_time_array[1], LO_time_array[2]);
		var temp_LI_epoch = ( (LI_date_epoch / 1000 ) + local_gmt_sec);
		var temp_LO_epoch = ( (LO_date_epoch / 1000 ) + local_gmt_sec);
		var epoch_diff = (temp_LO_epoch - temp_LI_epoch);
		var temp_diff = epoch_diff;

		document.getElementById("login_time").innerHTML = "ERROR, Please check date fields";

	//	document.getElementById("login_time").innerHTML = LI_date_epoch + '|' + temp_LI_epoch + '|' + LO_date_epoch + '|' + temp_LO_epoch + '|' + (Date.UTC(LI_date_array[0], LI_date_array[1], LI_date_array[2]) / 1000) + '|' + (Date.UTC(LO_date_array[0], LO_date_array[1], LO_date_array[2]) / 1000) + "\n diff " +  epoch_diff + "\n LI " +  temp_LI_epoch + "\n LO " +  temp_LO_epoch + "\n Now " +  now_epoch + "\n local" + local_gmt_sec;

		var go_submit = document.getElementById("go_submit");
		go_submit.disabled = true;
		// length is a positive number and no more than 24 hours, datetime is earlier than right now
		if ( (epoch_diff < 86401) && (epoch_diff > 0) && (temp_LI_epoch < now_epoch) && (temp_LO_epoch < now_epoch) )
			{
			go_submit.disabled = false;

			hours = Math.floor(temp_diff / (60 * 60)); 
			temp_diff -= hours * (60 * 60);

			mins = Math.floor(temp_diff / 60); 
			temp_diff -= mins * 60;
			if (mins < 10) {mins = "0" + mins;}

			secs = Math.floor(temp_diff); 
			temp_diff -= secs;

			document.getElementById("login_time").innerHTML = hours + ":" + mins;

			var form_LI_epoch = document.getElementById("LOGINepoch");
			var form_LO_epoch = document.getElementById("LOGOUTepoch");
			form_LI_epoch.value = temp_LI_epoch;
			form_LO_epoch.value = temp_LO_epoch;
			}
		}



	<?php
	}
######################
# ADD=31 or 34 and SUB=29 for list mixes
######################
if ( ( ($ADD==34) or ($ADD==31) or ($ADD==49) ) and ($SUB==29) and ($LOGmodify_campaigns==1) and ( (preg_match("/$campaign_id/i", $LOGallowed_campaigns)) or (preg_match("/ALL\-CAMPAIGNS/i",$LOGallowed_campaigns)) ) ) 
	{

	?>
	// List Mix status add and remove
	function mod_mix_status(stage,vcl_id,entry) 
		{
		if (stage=="ALL")
			{
			var count=0;
			var ROnew_statuses = document.getElementById("ROstatus_X_" + vcl_id);

			while (count < entry)
				{
				var old_statuses = document.getElementById("status_" + count + "_" + vcl_id);
				var ROold_statuses = document.getElementById("ROstatus_" + count + "_" + vcl_id);

				old_statuses.value = ROnew_statuses.value;
				ROold_statuses.value = ROnew_statuses.value;
				count++;
				}
			}
		else
			{
			if (stage=="EMPTY")
				{
				var count=0;
				var ROnew_statuses = document.getElementById("ROstatus_X_" + vcl_id);

				while (count < entry)
					{
					var old_statuses = document.getElementById("status_" + count + "_" + vcl_id);
					var ROold_statuses = document.getElementById("ROstatus_" + count + "_" + vcl_id);
					
					if (ROold_statuses.value.length < 3)
						{
						old_statuses.value = ROnew_statuses.value;
						ROold_statuses.value = ROnew_statuses.value;
						}
					count++;
					}
				}

			else
				{
				var mod_status = document.getElementById("dial_status_" + entry + "_" + vcl_id);
				if (mod_status.value.length < 1)
					{
					alert("You must select a status first");
					}
				else
					{
					var old_statuses = document.getElementById("status_" + entry + "_" + vcl_id);
					var ROold_statuses = document.getElementById("ROstatus_" + entry + "_" + vcl_id);
					var MODstatus = new RegExp(" " + mod_status.value + " ","g");
					if (stage=="ADD")
						{
						if (old_statuses.value.match(MODstatus))
							{
							alert("The status " + mod_status.value + " is already present");
							}
						else
							{
							var new_statuses = " " + mod_status.value + "" + old_statuses.value;
							old_statuses.value = new_statuses;
							ROold_statuses.value = new_statuses;
							mod_status.value = "";
							}
						}
					if (stage=="REMOVE")
						{
						var MODstatus = new RegExp(" " + mod_status.value + " ","g");
						old_statuses.value = old_statuses.value.replace(MODstatus, " ");
						ROold_statuses.value = ROold_statuses.value.replace(MODstatus, " ");
						}
					}
				}
			}
		}

	// List Mix percent difference calculation and warning message
	function mod_mix_percent(vcl_id,entries) 
		{
		var i=0;
		var total_percent=0;
		var percent_diff='';
		while(i < entries)
			{
			var mod_percent_field = document.getElementById("percentage_" + i + "_" + vcl_id);
			temp_percent = mod_percent_field.value * 1;
			total_percent = (total_percent + temp_percent);
			i++;
			}

		var mod_diff_percent = document.getElementById("PCT_DIFF_" + vcl_id);
		percent_diff = (total_percent - 100);
		if (percent_diff > 0)
			{
			percent_diff = '+' + percent_diff;
			}
		var mix_list_submit = document.getElementById("submit_" + vcl_id);
		if ( (percent_diff > 0) || (percent_diff < 0) )
			{
			mix_list_submit.disabled = true;
			document.getElementById("ERROR_" + vcl_id).innerHTML = "<font color=red><B>The Difference % must be 0</B></font>";
			}
		else
			{
			mix_list_submit.disabled = false;
			document.getElementById("ERROR_" + vcl_id).innerHTML = "";
			}

		mod_diff_percent.value = percent_diff;
		}

	function submit_mix(vcl_id,entries) 
		{
		var h=1;
		var j=1;
		var list_mix_container='';
		var mod_list_mix_container_field = document.getElementById("list_mix_container_" + vcl_id);
		while(h < 41)
			{
			var i=0;
			while(i < entries)
				{
				var mod_list_id_field = document.getElementById("list_id_" + i + "_" + vcl_id);
				var mod_priority_field = document.getElementById("priority_" + i + "_" + vcl_id);
				var mod_percent_field = document.getElementById("percentage_" + i + "_" + vcl_id);
				var mod_statuses_field = document.getElementById("status_" + i + "_" + vcl_id);
				if (mod_priority_field.value==h)
					{
					list_mix_container = list_mix_container + mod_list_id_field.value + "|" + j + "|" + mod_percent_field.value + "|" + mod_statuses_field.value + "|:";
					j++;
					}
				i++;
				}
			h++;
			}
		mod_list_mix_container_field.value = list_mix_container;
		var form_to_submit = document.getElementById("" + vcl_id);
		form_to_submit.submit();
		}
	<?php
	}
	?>
	var weak = new Image();
	weak.src = "images/weak.png";
	var medium = new Image();
	medium.src = "images/medium.png";
	var strong = new Image();
	strong.src = "images/strong.png";

	function pwdChanged(pwd_field_str, pwd_img_str) 
		{
		var pwd_field = document.getElementById(pwd_field_str);
		var pwd_img = document.getElementById(pwd_img_str);

	//	var strong_regex = new RegExp( "^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])", "g" );
	//	var medium_regex = new RegExp( "^(?=.{6,})(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9]))).*$", "g" );
		var strong_regex = new RegExp( "^(?=.{20,})(?=.*[a-zA-Z])(?=.*[0-9])", "g" );
		var medium_regex = new RegExp( "^(?=.{10,})(?=.*[a-zA-Z])(?=.*[0-9])", "g" );

		if (strong_regex.test(pwd_field.value) ) 
			{
			if (pwd_img.src != strong.src)
				{pwd_img.src = strong.src;}
			} 
		else if (medium_regex.test( pwd_field.value) ) 
			{
			if (pwd_img.src != medium.src) 
				{pwd_img.src = medium.src;}
			}
		else 
			{
			if (pwd_img.src != weak.src) 
				{pwd_img.src = weak.src;}
			}
		}

	function openNewWindow(url) 
		{
		window.open (url,"",'width=620,height=300,scrollbars=yes,menubar=yes,address=yes');
		}
	function scriptInsertField() 
		{
		openField = '--A--';
		closeField = '--B--';
		var textBox = document.scriptForm.script_text;
		var scriptIndex = document.getElementById("selectedField").selectedIndex;
		var insValue =  document.getElementById('selectedField').options[scriptIndex].value;
		if (document.selection) 
			{
			//IE
			textBox = document.scriptForm.script_text;
			insValue = document.scriptForm.selectedField.options[document.scriptForm.selectedField.selectedIndex].text;
			textBox.focus();
			sel = document.selection.createRange();
			sel.text = openField + insValue + closeField;
			} 
		else if (textBox.selectionStart || textBox.selectionStart == 0) 
			{
			//Mozilla
			var startPos = textBox.selectionStart;
			var endPos = textBox.selectionEnd;
			textBox.value = textBox.value.substring(0, startPos)
			+ openField + insValue + closeField
			+ textBox.value.substring(endPos, textBox.value.length);
			}
		else 
			{
			textBox.value += openField + insValue + closeField;
			}
		}

	<?php

#### Javascript for auto-generate of user ID Button
if ( ($SSadmin_modify_refresh > 1) and (preg_match("/^3|^4/",$ADD)) )
	{
	?>
	var ar_seconds=<?php echo "$SSadmin_modify_refresh;"; ?>

	function modify_refresh_display()
		{
		if (ar_seconds > 0)
			{
			ar_seconds = (ar_seconds - 1);
			document.getElementById("refresh_countdown").innerHTML = "<font color=black> screen refresh in: " + ar_seconds + " seconds</font>";
			setTimeout("modify_refresh_display()",1000);
			}
		}

	<?php
	}

#### BEGIN Javascript for auto-generate of user ID Button
if ( ($ADD==1) or ($ADD=="1A") )
	{
	?>

	function user_auto()
		{
		var user_toggle = document.getElementById("user_toggle");
		var user_field = document.getElementById("user");
		if (user_toggle.value < 1)
			{
			user_field.value = 'AUTOGENERATEZZZ';
			user_field.disabled = true;
			user_toggle.value = 1;
			}
		else
			{
			user_field.value = '';
			user_field.disabled = false;
			user_toggle.value = 0;
			}
		}

	function user_submit()
		{
		var user_field = document.getElementById("user");
		user_field.disabled = false;
		document.userform.submit();
		}

	<?php
	}
#### END Javascript for auto-generate of user ID Button

else
	{
	echo "	var pass = '$PHP_AUTH_PW';\n";
	?>

	mouseY=0;
	function getMousePos(event) {
		mouseY=event.pageY;
	}
	document.addEventListener("click", getMousePos);

	function launch_chooser(fieldname,stage)
		{

		var h = window.innerHeight;		
		var vposition=mouseY;

		var audiolistURL = "./non_agent_api.php";
		var audiolistQuery = "source=admin&function=sounds_list&user=" + user + "&pass=" + pass + "&format=selectframe&stage=" + stage + "&comments=" + fieldname;
		var Iframe_content = '<IFRAME SRC="' + audiolistURL + '?' + audiolistQuery + '"  style="width:740;height:440;background-color:white;" scrolling="NO" frameborder="0" allowtransparency="true" id="audio_chooser_frame' + epoch + '" name="audio_chooser_frame" width="740" height="460" STYLE="z-index:2"> </IFRAME>';

		document.getElementById("audio_chooser_span").style.position = "absolute";
		document.getElementById("audio_chooser_span").style.left = "433px";
		document.getElementById("audio_chooser_span").style.top = "133px";
		document.getElementById("audio_chooser_span").style.visibility = 'visible';
		document.getElementById("audio_chooser_span").innerHTML = Iframe_content;
		}

	function launch_moh_chooser(fieldname,stage)
		{

		var h = window.innerHeight;		
		var vposition=mouseY;

		var audiolistURL = "./non_agent_api.php";
		var audiolistQuery = "source=admin&function=moh_list&user=" + user + "&pass=" + pass + "&format=selectframe&stage=" + stage + "&comments=" + fieldname;
		var Iframe_content = '<IFRAME SRC="' + audiolistURL + '?' + audiolistQuery + '"  style="width:740;height:440;background-color:white;" scrolling="NO" frameborder="0" allowtransparency="true" id="audio_chooser_frame' + epoch + '" name="audio_chooser_frame" width="740" height="460" STYLE="z-index:2"> </IFRAME>';

		document.getElementById("audio_chooser_span").style.position = "absolute";
		document.getElementById("audio_chooser_span").style.left = "433px";
		document.getElementById("audio_chooser_span").style.top = "133px";
		document.getElementById("audio_chooser_span").style.visibility = 'visible';
		document.getElementById("audio_chooser_span").innerHTML = Iframe_content;
		}

	function launch_vm_chooser(fieldname,stage)
		{

		var h = window.innerHeight;		
		var vposition=mouseY;

		var audiolistURL = "./non_agent_api.php";
		var audiolistQuery = "source=admin&function=vm_list&user=" + user + "&pass=" + pass + "&format=selectframe&stage=" + stage + "&comments=" + fieldname;
		var Iframe_content = '<IFRAME SRC="' + audiolistURL + '?' + audiolistQuery + '"  style="width:740;height:440;background-color:white;" scrolling="NO" frameborder="0" allowtransparency="true" id="audio_chooser_frame' + epoch + '" name="audio_chooser_frame" width="740" height="460" STYLE="z-index:2"> </IFRAME>';

		document.getElementById("audio_chooser_span").style.position = "absolute";
		document.getElementById("audio_chooser_span").style.left = "433px";
		document.getElementById("audio_chooser_span").style.top = "133px";
		document.getElementById("audio_chooser_span").style.visibility = 'visible';
		document.getElementById("audio_chooser_span").innerHTML = Iframe_content;
		}

	function close_chooser()
		{
		document.getElementById("audio_chooser_span").style.visibility = 'hidden';
		document.getElementById("audio_chooser_span").innerHTML = '';
		}


	function user_submit()
		{
		var user_field = document.getElementById("user");
		user_field.disabled = false;
		document.userform.submit();
		}

	<?php
	}

### Javascript for shift end-time calculation and display
if ( ($ADD==131111111) or ($ADD==331111111) or ($ADD==431111111) )
	{
	?>
	function shift_time()
		{
		var start_time = document.getElementById("shift_start_time");
		var end_time = document.getElementById("shift_end_time");
		var length = document.getElementById("shift_length");

		var st_value = start_time.value;
		var et_value = end_time.value;
		while (st_value.length < 4) {st_value = "0" + st_value;}
		while (et_value.length < 4) {et_value = "0" + et_value;}
		var st_hour=st_value.substring(0,2);
		var st_min=st_value.substring(2,4);
		var et_hour=et_value.substring(0,2);
		var et_min=et_value.substring(2,4);
		if (st_hour > 23) {st_hour = 23;}
		if (et_hour > 23) {et_hour = 23;}
		if (st_min > 59) {st_min = 59;}
		if (et_min > 59) {et_min = 59;}
		start_time.value = st_hour + "" + st_min;
		end_time.value = et_hour + "" + et_min;

		var start_time_hour=start_time.value.substring(0,2);
		var start_time_min=start_time.value.substring(2,4);
		var end_time_hour=end_time.value.substring(0,2);
		var end_time_min=end_time.value.substring(2,4);
		start_time_hour=(start_time_hour * 1);
		start_time_min=(start_time_min * 1);
		end_time_hour=(end_time_hour * 1);
		end_time_min=(end_time_min * 1);

		if (start_time.value == end_time.value)
			{
			var shift_length = '24:00';
			}
		else
			{
			if ( (start_time_hour > end_time_hour) || ( (start_time_hour == end_time_hour) && (start_time_min > end_time_min) ) )
				{
				var shift_hour = ( (24 - start_time_hour) + end_time_hour);
				var shift_minute = ( (60 - start_time_min) + end_time_min);
				if (shift_minute >= 60) 
					{
					shift_minute = (shift_minute - 60);
					}
				else
					{
					shift_hour = (shift_hour - 1);
					}
				}
			else
				{
				var shift_hour = (end_time_hour - start_time_hour);
				var shift_minute = (end_time_min - start_time_min);
				}
			if (shift_minute < 0) 
				{
				shift_minute = (shift_minute + 60);
				shift_hour = (shift_hour - 1);
				}

			if (shift_hour < 10) {shift_hour = '0' + shift_hour}
			if (shift_minute < 10) {shift_minute = '0' + shift_minute}
			var shift_length = shift_hour + ':' + shift_minute;
			}
	//	alert(start_time_hour + '|' + start_time_min + '|' + end_time_hour + '|' + end_time_min + '|--|' + shift_hour + ':' + shift_minute + '|' + shift_length + '|');

		length.value = shift_length;
		}

<?php
	}




### Javascript for selecting and deselecting all AC-CIDs and other checkboxes "active" on the modify page
if ( ($ADD==3111) or ($ADD==4111) or ($ADD==5111) or ($ADD==3811) or ($ADD==4811) or ($ADD==5811) or ($ADD==3911) or ($ADD==4911) or ($ADD==5911) or ($ADD==31) or ($ADD==34) or ($ADD==202) or ($ADD==396111111111) or ($ADD==496111111111) )
	{
?>
	function FORM_selectall(temp_count,temp_fields,temp_option,temp_span)
		{
		var fields_array=temp_fields.split('|');
		var inc=0;
		while (temp_count >= inc)
			{
			if (fields_array[inc].length > 0)
				{
				if (temp_option == 'off')
					{document.getElementById(fields_array[inc]).checked=false;}
				else
					{document.getElementById(fields_array[inc]).checked=true;}
				}
			inc++;
			}
		if (temp_option == 'off')
			{
			document.getElementById(temp_span).innerHTML = "<a href=\"#\" onclick=\"FORM_selectall('" + temp_count + "','" + temp_fields + "','on','" + temp_span + "');return false;\"><font size=1><?php echo _QXZ("select all"); ?></font></a>";
			}
		else
			{
			document.getElementById(temp_span).innerHTML = "<a href=\"#\" onclick=\"FORM_selectall('" + temp_count + "','" + temp_fields + "','off','" + temp_span + "');return false;\"><font size=1><?php echo _QXZ("deselect all"); ?></font></a>";
			}
		}

	<?php
	}


$stmt="SELECT menu_id,menu_name from vicidial_call_menu $whereLOGadmin_viewable_groupsSQL order by menu_id limit 10000;";
$rslt=mysql_to_mysqli($stmt, $link);
$menus_to_print = mysqli_num_rows($rslt);
$call_menu_list='';
$i=0;
while ($i < $menus_to_print)
	{
	$row=mysqli_fetch_row($rslt);
	$call_menu_list .= "<option value=\"$row[0]\">$row[0] - $row[1]</option>";
	$i++;
	}

### select list contents generation for dynamic route displays in call menu and in-group screens
if ( ($ADD==3511) or ($ADD==2511) or ($ADD==2611) or ($ADD==4511) or ($ADD==5511) or ($ADD==3111) or ($ADD==2111) or ($ADD==2011) or ($ADD==4111) or ($ADD==5111) )
	{
	$stmt="SELECT did_pattern,did_description,did_route from vicidial_inbound_dids where did_active='Y' $LOGadmin_viewable_groupsSQL order by did_pattern;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$dids_to_print = mysqli_num_rows($rslt);
	$did_list='';
	$i=0;
	while ($i < $dids_to_print)
		{
		$row=mysqli_fetch_row($rslt);
		$did_list .= "<option value=\"$row[0]\">$row[0] - $row[1] - $row[2]</option>";
		$i++;
		}

	$stmt="SELECT group_id,group_name from vicidial_inbound_groups where active='Y' and group_id NOT LIKE \"AGENTDIRECT%\" $LOGadmin_viewable_groupsSQL order by group_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$ingroups_to_print = mysqli_num_rows($rslt);
	$ingroup_list='';
	$i=0;
	while ($i < $ingroups_to_print)
		{
		$row=mysqli_fetch_row($rslt);
		$ingroup_list .= "<option value=\"$row[0]\">$row[0] - $row[1]</option>";
		$i++;
		}

	$stmt="SELECT campaign_id,campaign_name from vicidial_campaigns where active='Y' $LOGallowed_campaignsSQL order by campaign_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$IGcampaigns_to_print = mysqli_num_rows($rslt);
	$IGcampaign_id_list='';
	$i=0;
	while ($i < $IGcampaigns_to_print)
		{
		$row=mysqli_fetch_row($rslt);
		$IGcampaign_id_list .= "<option value=\"$row[0]\">$row[0] - $row[1]</option>";
		$i++;
		}

	$IGhandle_method_list = '<option>CID</option><option>CIDLOOKUP</option><option>CIDLOOKUPRL</option><option>CIDLOOKUPRC</option><option>CIDLOOKUPALT</option><option>CIDLOOKUPRLALT</option><option>CIDLOOKUPRCALT</option><option>CIDLOOKUPADDR3</option><option>CIDLOOKUPRLADDR3</option><option>CIDLOOKUPRCADDR3</option><option>CIDLOOKUPALTADDR3</option><option>CIDLOOKUPRLALTADDR3</option><option>CIDLOOKUPRCALTADDR3</option><option>ANI</option><option>ANILOOKUP</option><option>ANILOOKUPRL</option><option>VIDPROMPT</option><option>VIDPROMPTLOOKUP</option><option>VIDPROMPTLOOKUPRL</option><option>VIDPROMPTLOOKUPRC</option><option>CLOSER</option><option>3DIGITID</option><option>4DIGITID</option><option>5DIGITID</option><option>10DIGITID</option>';

	$IGsearch_method_list = '<option value=\\"LB\\">LB - '._QXZ("Load Balanced").'</option><option value=\\"LO\\">LO - '._QXZ("Load Balanced Overflow").'</option><option value=\\"SO\\">SO - '._QXZ("Server Only").'</option>';

	$stmt="SELECT login,server_ip,extension,dialplan_number from phones where active='Y' $LOGadmin_viewable_groupsSQL order by login,server_ip;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$phones_to_print = mysqli_num_rows($rslt);
	$phone_list='';
	$i=0;
	while ($i < $phones_to_print)
		{
		$row=mysqli_fetch_row($rslt);
		$phone_list .= "<option value=\"$row[0]\">$row[0] - $row[1] - $row[2] - $row[3]</option>";
		$i++;
		}
	}

# dynamic options for options in call_menu screen
if ( ($ADD==3511) or ($ADD==2511) or ($ADD==2611) or ($ADD==4511) or ($ADD==5511) )
	{

	?>
	function call_menu_option(option,route,value,value_context,chooser_height)
		{
		var call_menu_list = '<?php echo $call_menu_list ?>';
		var ingroup_list = '<?php echo $ingroup_list ?>';
		var IGcampaign_id_list = '<?php echo $IGcampaign_id_list ?>';
		var IGhandle_method_list = '<?php echo $IGhandle_method_list ?>';
		var IGsearch_method_list = "<?php echo $IGsearch_method_list ?>";
		var did_list = '<?php echo $did_list ?>';
		var phone_list = '<?php echo $phone_list ?>';
		var selected_value = '';
		var selected_context = '';
		var new_content = '';

		var select_list = document.getElementById("option_route_" + option);
		var selected_route = select_list.value;
		var span_to_update = document.getElementById("option_value_value_context_" + option);

		if (selected_route=='CALLMENU')
			{
			if (route == selected_route)
				{
				selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
				}
			else
				{value='';}
			new_content = '<span name=option_route_link_' + option + ' id=option_route_link_' + option + "><a href=\"./admin.php?ADD=3511&menu_id=" + value + "\"><?php echo _QXZ("Call Menu"); ?>: </a></span><select size=1 name=option_route_value_" + option + " id=option_route_value_" + option + " onChange=\"call_menu_link('" + option + "','CALLMENU');\">" + call_menu_list + "\n" + selected_value + '</select>';
			}
		if (selected_route=='INGROUP')
			{
			if (value_context.length < 10)
				{value_context = 'CID,LB,998,TESTCAMP,1,,,,';}
			var value_context_split =		value_context.split(",");
			var IGhandle_method =			value_context_split[0];
			var IGsearch_method =			value_context_split[1];
			var IGlist_id =					value_context_split[2];
			var IGcampaign_id =				value_context_split[3];
			var IGphone_code =				value_context_split[4];
			var IGvid_enter_filename =		value_context_split[5];
			var IGvid_id_number_filename =	value_context_split[6];
			var IGvid_confirm_filename =	value_context_split[7];
			var IGvid_validate_digits =		value_context_split[8];

			if (route == selected_route)
				{
				selected_value = '<option SELECTED>' + value + '</option>';
				}

			new_content = '<input type=hidden name=option_route_value_context_' + option + ' id=option_route_value_context_' + option + ' value="' + selected_value + '">';
			new_content = new_content + '<span name=option_route_link_' + option + 'id=option_route_link_' + option + '>';
			new_content = new_content + "<a href=\"admin.php?ADD=3111&group_id=" + value + "\"><?php echo _QXZ("In-Group"); ?>:</a> </span>";
			new_content = new_content + '<select size=1 name=option_route_value_' + option + ' id=option_route_value_' + option + ' onChange="call_menu_link("' + option + '","INGROUP");">';
			new_content = new_content + '' + ingroup_list + "\n" + selected_value + '<option>DYNAMIC_INGROUP_VAR</option></select>';
			new_content = new_content + " &nbsp; <?php echo _QXZ("Handle Method"); ?>: <select size=1 name=IGhandle_method_" + option + ' id=IGhandle_method_' + option + '>';
			new_content = new_content + '' + IGhandle_method_list + "\n" + '<option SELECTED>' + IGhandle_method + '</select>';
			new_content = new_content + ' &nbsp; <IMG SRC=\"help.png\" onClick=\"FillAndShowHelpDiv(event, \'call_menu-ingroup_settings\')" WIDTH=20 HEIGHT=20 BORDER=0 ALT="HELP" ALIGN=TOP>';
			new_content = new_content + "<BR><?php echo _QXZ("Search Method"); ?>: <select size=1 name=IGsearch_method_" + option + ' id=IGsearch_method_' + option + '>';
			new_content = new_content + '' + IGsearch_method_list + "\n" + '<option SELECTED>' + IGsearch_method + '</select>';
			new_content = new_content + " &nbsp; <?php echo _QXZ("List ID"); ?>: <input type=text size=5 maxlength=14 name=IGlist_id_" + option + ' id=IGlist_id_' + option + ' value="' + IGlist_id + '">';
			new_content = new_content + "<BR><?php echo _QXZ("Campaign ID"); ?>: <select size=1 name=IGcampaign_id_" + option + ' id=IGcampaign_id_' + option + '>';
			new_content = new_content + '' + IGcampaign_id_list + "\n" + '<option SELECTED>' + IGcampaign_id + '</select>';
			new_content = new_content + " &nbsp; <?php echo _QXZ("Phone Code"); ?>: <input type=text size=5 maxlength=14 name=IGphone_code_" + option + ' id=IGphone_code_' + option + ' value="' + IGphone_code + '">';
			new_content = new_content + "<BR> &nbsp; <?php echo _QXZ("VID Enter Filename"); ?>: <input type=text name=IGvid_enter_filename_" + option + " id=IGvid_enter_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_enter_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_enter_filename_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
			new_content = new_content + "<BR> &nbsp; <?php echo _QXZ("VID ID Number Filename"); ?>: <input type=text name=IGvid_id_number_filename_" + option + " id=IGvid_id_number_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_id_number_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_id_number_filename_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
			new_content = new_content + "<BR> &nbsp; <?php echo _QXZ("VID Confirm Filename"); ?>: <input type=text name=IGvid_confirm_filename_" + option + " id=IGvid_confirm_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_confirm_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_confirm_filename_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
			new_content = new_content + " &nbsp; <?php echo _QXZ("VID Digits"); ?>: <input type=text size=3 maxlength=3 name=IGvid_validate_digits_" + option + ' id=IGvid_validate_digits_' + option + ' value="' + IGvid_validate_digits + '">';
			}
		if (selected_route=='DID')
			{
			if (route == selected_route)
				{
				selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
				}
			else
				{value='';}
			new_content = '<span name=option_route_link_' + option + ' id=option_route_link_' + option + '><a href="admin.php?ADD=3311&did_pattern=' + value + "\"><?php echo _QXZ("DID"); ?>:</a> </span><select size=1 name=option_route_value_" + option + ' id=option_route_value_' + option + " onChange=\"call_menu_link('" + option + "','DID');\">" + did_list + "\n" + selected_value + '</select>';
			}
		if (selected_route=='HANGUP')
			{
			if (route == selected_route)
				{
				selected_value = value;
				}
			else
				{value='vm-goodbye';}
			new_content = "<?php echo _QXZ("Audio File"); ?>: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=40 maxlength=255 value=\"" + selected_value + "\"> <a href=\"javascript:launch_chooser('option_route_value_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
			}
		if (selected_route=='EXTENSION')
			{
			if (route == selected_route)
				{
				selected_value = value;
				selected_context = value_context;
				}
			else
				{value='8304';}
			new_content = "<?php echo _QXZ("Extension"); ?>: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=20 maxlength=255 value=\"" + selected_value + "\"> &nbsp; <?php echo _QXZ("Context"); ?>: <input type=text name=option_route_value_context_" + option + " id=option_route_value_context_" + option + " size=20 maxlength=255 value=\"" + selected_context + "\"> ";
			}
		if (selected_route=='PHONE')
			{
			if (route == selected_route)
				{
				selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
				}
			else
				{value='';}
			new_content = "<?php echo _QXZ("Phone"); ?>: <select size=1 name=option_route_value_" + option + ' id=option_route_value_' + option + '>' + phone_list + "\n" + selected_value + '</select>';
			}
		if ( (selected_route=='VOICEMAIL') || (selected_route=='VMAIL_NO_INST') )
			{
			if (route == selected_route)
				{
				selected_value = value;
				}
			else
				{value='';}
			new_content = "<?php echo _QXZ("Voicemail Box"); ?>: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=12 maxlength=10 value=\"" + selected_value + "\"> <a href=\"javascript:launch_vm_chooser('option_route_value_" + option + "','date');\"><?php echo _QXZ("voicemail chooser"); ?></a>";
			}
		if (selected_route=='AGI')
			{
			if (route == selected_route)
				{
				selected_value = value;
				}
			else
				{value='';}
			new_content = "<?php echo _QXZ("AGI"); ?>: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=80 maxlength=255 value=\"" + selected_value + "\"> ";
			}

		if (new_content.length < 1)
			{new_content = selected_route}

		span_to_update.innerHTML = new_content;
		}

	function call_menu_link(option,route)
		{
		var selected_value = '';
		var new_content = '';

		var select_list = document.getElementById("option_route_value_" + option);
		var selected_value = select_list.value;
		var span_to_update = document.getElementById("option_route_link_" + option);

		if (route=='CALLMENU')
			{
			new_content = "<a href=\"admin.php?ADD=3511&menu_id=" + selected_value + "\"><?php echo _QXZ("Call Menu"); ?>:</a>";
			}
		if (route=='INGROUP')
			{
			new_content = "<a href=\"admin.php?ADD=3111&group_id=" + selected_value + "\"><?php echo _QXZ("In-Group"); ?>:</a>";
			}
		if (route=='DID')
			{
			new_content = "<a href=\"admin.php?ADD=3311&did_pattern=" + selected_value + "\"><?php echo _QXZ("DID"); ?>:</a>";
			}

		if (new_content.length < 1)
			{new_content = selected_route}

		span_to_update.innerHTML = new_content;
		}

	<?php
	}

### Javascript for dynamic in-group option value entries
if ( ($ADD==2811) or ($ADD==3811) or ($ADD==3111) or ($ADD==2111) or ($ADD==2011) or ($ADD==4111) or ($ADD==5111) )
	{

	?>
	function dynamic_call_action(option,route,value,chooser_height)
		{
		var call_menu_list = '<?php echo $call_menu_list ?>';
		var ingroup_list = '<?php echo $ingroup_list ?>';
		var IGcampaign_id_list = '<?php echo $IGcampaign_id_list ?>';
		var IGhandle_method_list = '<?php echo $IGhandle_method_list ?>';
		var IGsearch_method_list = "<?php echo $IGsearch_method_list ?>";
		var did_list = '<?php echo $did_list ?>';
		var selected_value = '';
		var selected_context = '';
		var new_content = '';

		var select_list = document.getElementById(option + "");
		var selected_route = select_list.value;
		var span_to_update = document.getElementById(option + "_value_span");

		if (selected_route=='CALLMENU')
			{
			if (route == selected_route)
				{
				selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
				}
			else
				{value = '';}
			new_content = '<span name=' + option + '_value_link id=' + option + '_value_link><a href="./admin.php?ADD=3511&menu_id=' + value + "\"><?php echo _QXZ("Call Menu"); ?>: </a></span><select size=1 name=" + option + '_value id=' + option + "_value onChange=\"dynamic_call_action_link('" + option + "','CALLMENU');\">" + call_menu_list + "\n" + selected_value + '</select>';
			}
		if (selected_route=='INGROUP')
			{
			if ( (route != selected_route) || (value.length < 10) )
				{value = 'SALESLINE,CID,LB,998,TESTCAMP,1,,,,';}
			var value_split = value.split(",");
			var IGgroup_id =				value_split[0];
			var IGhandle_method =			value_split[1];
			var IGsearch_method =			value_split[2];
			var IGlist_id =					value_split[3];
			var IGcampaign_id =				value_split[4];
			var IGphone_code =				value_split[5];
			var IGvid_enter_filename =		value_split[6];
			var IGvid_id_number_filename =	value_split[7];
			var IGvid_confirm_filename =	value_split[8];
			var IGvid_validate_digits =		value_split[9];

			if (route == selected_route)
				{
				selected_value = '<option SELECTED>' + IGgroup_id + '</option>';
				}

			new_content = new_content + '<span name=' + option + '_value_link id=' + option + '_value_link><a href="admin.php?ADD=3111&group_id=' + IGgroup_id + "\"><?php echo _QXZ("In-Group"); ?>:</a> </span> ";
			new_content = new_content + '<select size=1 name=IGgroup_id_' + option + ' id=IGgroup_id_' + option + " onChange=\"dynamic_call_action_link('IGgroup_id_" + option + "','INGROUP');\">";
			new_content = new_content + '' + ingroup_list + "\n" + selected_value + '</select>';
			new_content = new_content + " &nbsp; <?php echo _QXZ("Handle Method"); ?>: <select size=1 name=IGhandle_method_" + option + ' id=IGhandle_method_' + option + '>';
			new_content = new_content + '' + IGhandle_method_list + "\n" + '<option SELECTED>' + IGhandle_method + '</select>';
			new_content = new_content + "<BR><?php echo _QXZ("Search Method"); ?>: <select size=1 name=IGsearch_method_" + option + ' id=IGsearch_method_' + option + '>';
			new_content = new_content + '' + IGsearch_method_list + "\n" + '<option SELECTED>' + IGsearch_method + '</select>';
			new_content = new_content + " &nbsp; <?php echo _QXZ("List ID"); ?>: <input type=text size=5 maxlength=14 name=IGlist_id_" + option + ' id=IGlist_id_' + option + ' value="' + IGlist_id + '">';
			new_content = new_content + "<BR><?php echo _QXZ("Campaign ID"); ?>: <select size=1 name=IGcampaign_id_" + option + ' id=IGcampaign_id_' + option + '>';
			new_content = new_content + '' + IGcampaign_id_list + "\n" + '<option SELECTED>' + IGcampaign_id + '</select>';
			new_content = new_content + " &nbsp; <?php echo _QXZ("Phone Code"); ?>: <input type=text size=5 maxlength=14 name=IGphone_code_" + option + ' id=IGphone_code_' + option + ' value="' + IGphone_code + '">';
		//	new_content = new_content + "<BR> &nbsp; <?php echo _QXZ("VID Enter Filename"); ?>: <input type=text name=IGvid_enter_filename_" + option + " id=IGvid_enter_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_enter_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_enter_filename_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
		//	new_content = new_content + "<BR> &nbsp; <?php echo _QXZ("VID ID Number Filename"); ?>: <input type=text name=IGvid_id_number_filename_" + option + " id=IGvid_id_number_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_id_number_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_id_number_filename_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
		//	new_content = new_content + "<BR> &nbsp; <?php echo _QXZ("VID Confirm Filename"); ?>: <input type=text name=IGvid_confirm_filename_" + option + " id=IGvid_confirm_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_confirm_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_confirm_filename_" + option + "','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
		//	new_content = new_content + ' &nbsp; <?php echo _QXZ("VID Digits"); ?>: <input type=text size=3 maxlength=3 name=IGvid_validate_digits_' + option + ' id=IGvid_validate_digits_' + option + ' value="' + IGvid_validate_digits + '">';

			}
		if (selected_route=='DID')
			{
			if (route == selected_route)
				{
				selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
				}
			else
				{value = '';}
			new_content = '<span name=' + option + '_value_link id=' + option + '_value_link><a href="admin.php?ADD=3311&did_pattern=' + value + "\"><?php echo _QXZ("DID"); ?>:</a> </span><select size=1 name=" + option + '_value id=' + option + "_value onChange=\"dynamic_call_action_link('" + option + "','DID');\">" + did_list + "\n" + selected_value + '</select>';
			}
		if (selected_route=='MESSAGE')
			{
			if (route == selected_route)
				{
				selected_value = value;
				}
			else
				{value = 'nbdy-avail-to-take-call|vm-goodbye';}
			new_content = "<?php echo _QXZ("Audio File"); ?>: <input type=text name=" + option + "_value id=" + option + "_value size=40 maxlength=255 value=\"" + value + "\"> <a href=\"javascript:launch_chooser('" + option + "_value','date');\"><?php echo _QXZ("audio chooser"); ?></a>";
			}
		if (selected_route=='EXTENSION')
			{
			if ( (route != selected_route) || (value.length < 3) )
				{value = '8304,default';}
			var value_split = value.split(",");
			var EXextension =	value_split[0];
			var EXcontext =		value_split[1];

			new_content = "<?php echo _QXZ("Extension"); ?>: <input type=text name=EXextension_" + option + " id=EXextension_" + option + " size=20 maxlength=255 value=\"" + EXextension + "\"> &nbsp; <?php echo _QXZ("Context"); ?>: <input type=text name=EXcontext_" + option + " id=EXcontext_" + option + " size=20 maxlength=255 value=\"" + EXcontext + "\"> ";
			}
		if ( (selected_route=='VOICEMAIL') || (selected_route=='VMAIL_NO_INST') )
			{
			if (route == selected_route)
				{
				selected_value = value;
				}
			else
				{value = '101';}
			new_content = "<?php echo _QXZ("Voicemail Box"); ?>: <input type=text name=" + option + "_value id=" + option + "_value size=12 maxlength=10 value=\"" + value + "\"> <a href=\"javascript:launch_vm_chooser('" + option + "_value','date');\"><?php echo _QXZ("voicemail chooser"); ?></a>";
			}

		if (new_content.length < 1)
			{new_content = selected_route}

		span_to_update.innerHTML = new_content;
		}

	function dynamic_call_action_link(field,route)
		{
		var selected_value = '';
		var new_content = '';

		if ( (route=='CALLMENU') || (route=='DID') )
			{var select_list = document.getElementById(field + "_value");}
		if (route=='INGROUP')
			{
			var select_list = document.getElementById(field + "");
			field = field.replace(/IGgroup_id_/, "");
			}
		var selected_value = select_list.value;
		var span_to_update = document.getElementById(field + "_value_link");

		if (route=='CALLMENU')
			{
			new_content = '<a href="admin.php?ADD=3511&menu_id=' + selected_value + "\"><?php echo _QXZ("Call Menu"); ?>:</a>";
			}
		if (route=='INGROUP')
			{
			new_content = '<a href="admin.php?ADD=3111&group_id=' + selected_value + "\"><?php echo _QXZ("In-Group"); ?>:</a>";
			}
		if (route=='DID')
			{
			new_content = '<a href="admin.php?ADD=3311&did_pattern=' + selected_value + "\"><?php echo _QXZ("DID"); ?>:</a>";
			}

		if (new_content.length < 1)
			{new_content = selected_route}

		span_to_update.innerHTML = new_content;
		}

	<?php
	}
echo "</script>\n";

##### BEGIN - bar chart CSS style #####
?>

<style type="text/css">
<!--


<?php

if ($ADD == '730000000000000')
{
?>

.diff table{
margin          : 1px 1px 1px 1px;
border-collapse : collapse;
border-spacing  : 0;
}

.diff td{
vertical-align : top;
font-family    : monospace;
font-size      : 9;
}
.diff span{
display:block;
min-height:1pm;
margin-top:-1px;
padding:1px 1px 1px 1px;
}

* html .diff span{
height:1px;
}

.diff span:first-child{
margin-top:1px;
}

.diffDeleted span{
border:1px solid rgb(255,51,0);
background:rgb(255,173,153);
}

.diffInserted span{
border:1px solid rgb(51,204,51);
background:rgb(102,255,51);
}

<?php
}
?>

.auraltext
	{
	position: absolute;
	font-size: 0;
	left: -1000px;
	}
.chart_td
	{background-image: url(images/gridline58.gif); background-repeat: repeat-x; background-position: left top; border-left: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5; padding:0; border-bottom: 1px solid #e5e5e5; background-color:transparent;}

.head_style
	{
	background-color: <?php echo $Mmain_bgcolor ?>;
	}
.head_style:hover{background-color: #262626;}

.head_style_selected
	{
	background-color: <?php echo $Mhead_color ?>;
	}
.head_style_selected:hover{background-color: <?php echo $Mhead_color ?>;}

.subhead_style
	{
	background-color: <?php echo $Msubhead_color ?>;
	}
.subhead_style:hover{background-color: white;}

.subhead_style_selected
	{
	background-color: <?php echo $Mselected_color ?>;
	}
.subhead_style_selected:hover{background-color: <?php echo $Mselected_color ?>;}

.adminmenu_style_selected
	{
	background-color: white;
	}
.adminmenu_style_selected:hover{background-color: #E6E6E6;}

.records_list_x
	{
	background-color: #<?php echo $SSstd_row2_background ?>;
	}
.records_list_x:hover{background-color: #E6E6E6;}

.records_list_y
	{
	background-color: #<?php echo $SSstd_row1_background ?>;
	}
.records_list_y:hover{background-color: #E6E6E6;}


.horiz_line
	{
	height: 0px;
	margin: 0px;
	border-bottom: 1px solid #E6E6E6;
	font-size: 1px;
	}
.horiz_line_grey
	{
	height: 0px;
	margin: 0px;
	border-bottom: 1px solid #9E9E9E;
	font-size: 1px;
	}

.sub_sub_head_links
	{
	font-family:HELVETICA;
	font-size:11;
	color:BLACK;
	{

-->

</style>

<?php
##### END - bar chart CSS style #####

echo "</head>\n";
if ( ($SSadmin_modify_refresh > 1) and (preg_match("/^3|^4/",$ADD)) )
	{
	echo "<BODY BGCOLOR=white marginheight=0 marginwidth=0 leftmargin=0 topmargin=0 onLoad=\"modify_refresh_display();\">\n";
	}
else
	{
	echo "<BODY BGCOLOR=white marginheight=0 marginwidth=0 leftmargin=0 topmargin=0>\n";
	}
	
echo "<!-- INTERNATIONALIZATION-LINKS-PLACEHOLDER-VICIDIAL -->\n";


if ($header_font_size < 4) {$header_font_size='12';}
if ($subheader_font_size < 4) {$subheader_font_size='11';}
if ($subcamp_font_size < 4) {$subcamp_font_size='11';}



?>
<CENTER>

<TABLE BGCOLOR=white cellpadding=0 cellspacing=0>


<span style="position:absolute;left:300px;top:30px;z-index:1;visibility:hidden;" id="audio_chooser_span">

</span>

<TABLE BGCOLOR=#<?php echo $SSframe_background ?> cellpadding=2 cellspacing=0 WIDTH=<?php echo $page_width ?> HEIGHT=15>
<TR BGCOLOR=#<?php echo "$SSmenu_background" ?>><TD ALIGN=LEFT BGCOLOR=#<?php echo "$SSmenu_background" ?>><FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><a href="<?php echo "index.php" ?>" STYLE="text-decoration:none;"><FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=1><?php echo _QXZ("AUDIO STORE"); ?></a> |  |  | <a href="<?php echo $ADMIN ?>?force_logout=1" STYLE="text-decoration:none;"><FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=1><?php echo _QXZ("Logout"); ?></a> <FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=1><?php // echo $PHP_AUTH_USER ?></FONT>

<?php
if ($SSenable_languages == '1')
	{
	echo " | <a href=\"$ADMIN?ADD=999989\" STYLE=\"text-decoration:none;\"><FONT FACE=\"ARIAL,HELVETICA\" COLOR=WHITE SIZE=1>"._QXZ("Change language")."</a>";
	}
?>

</TD><TD ALIGN=RIGHT><FONT FACE="ARIAL,HELVETICA" COLOR=WHITE SIZE=2><B><?php echo date("l F j, Y G:i:s A") ?> &nbsp; </B></TD></TR>

<TR BGCOLOR=#<?php echo "$SSmenu_background" ?>>







</TR>
	<?php
	if ( (strlen($list_sh) > 25) and (strlen($campaigns_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $subcamp_color ?>><TD ALIGN=LEFT COLSPAN=2><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=10"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Campaigns"); ?> </a> &nbsp; &nbsp; |<?php if ($add_copy_disabled < 1) { ?>
&nbsp; &nbsp; <a href="<?php echo $ADMIN ?>?ADD=11"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Campaign"); ?> </a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="<?php echo $ADMIN ?>?ADD=12"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Copy Campaign"); ?> </a> &nbsp; &nbsp; |<?php } ?> &nbsp; &nbsp; <a href="./AST_timeonVDADallSUMMARY.php"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Real-Time Campaigns Summary"); ?> </a></TD></TR>
		<?php }
	if ( (strlen($droplist_sh) > 25) and ($SSenable_drop_lists > 0) ) { 
		?>
	<TR BGCOLOR=<?php echo $subcamp_color ?>><TD ALIGN=LEFT COLSPAN=2><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=130"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Drop Lists"); ?> </a> &nbsp; &nbsp; |<?php if ($add_copy_disabled < 1) { ?>
&nbsp; &nbsp; <a href="<?php echo $ADMIN ?>?ADD=131"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Drop List"); ?> </a><?php } ?></TD></TR>
		<?php }
	if (strlen($times_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $times_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=100000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Call Times"); ?> </a> &nbsp;|<?php if ($add_copy_disabled < 1) { ?>
 <a href="<?php echo $ADMIN ?>?ADD=111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Call Time"); ?> </a> &nbsp;|<?php } ?> <a href="<?php echo $ADMIN ?>?ADD=1000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show State Call Times"); ?> </a> &nbsp;|<?php if ($add_copy_disabled < 1) { ?> <a href="<?php echo $ADMIN ?>?ADD=1111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New State Call Time"); ?> </a> &nbsp;|<?php } ?> <a href="<?php echo $ADMIN ?>?ADD=1200000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Holidays"); ?> </a> &nbsp;|<?php if ($add_copy_disabled < 1) { ?> <a href="<?php echo $ADMIN ?>?ADD=1211111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add Holiday"); ?> </a><?php } ?></TD></TR>
		<?php } 
	if (strlen($shifts_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $shifts_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=130000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Shifts"); ?> </a> &nbsp;|<?php if ($add_copy_disabled < 1) { ?> <a href="<?php echo $ADMIN ?>?ADD=131111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Shift"); ?> </a><?php } ?></TD></TR>
		<?php } 
	if (strlen($phones_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $phones_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=10000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Phones"); ?> </a>&nbsp;|<?php if ($add_copy_disabled < 1) { ?>&nbsp;<a href="<?php echo $ADMIN ?>?ADD=11111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Phone"); ?> </a>&nbsp;|<?php } ?>&nbsp;<a href="<?php echo $ADMIN ?>?ADD=12000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Phone Alias List"); ?> </a>&nbsp;|<?php if ($add_copy_disabled < 1) { ?>&nbsp;<a href="<?php echo $ADMIN ?>?ADD=12111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Phone Alias"); ?> </a>&nbsp;|<?php } ?>&nbsp;<a href="<?php echo $ADMIN ?>?ADD=13000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Group Alias List"); ?> </a>&nbsp;|<?php if ($add_copy_disabled < 1) { ?>&nbsp;<a href="<?php echo $ADMIN ?>?ADD=13111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Group Alias"); ?> </a><?php } ?></TD></TR>
		<?php }
	if (strlen($conference_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $conference_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=1000000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Conferences"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=1111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Conference"); ?> </a> &nbsp; |<?php } ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=10000000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show VICIDIAL Conferences"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=11111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New VICIDIAL Conference"); ?> </a><?php } ?></TD></TR>
		<?php }
	if ( (strlen($server_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $server_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=100000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Servers"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Server"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($templates_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $templates_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=130000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Templates"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=131111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Template"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($carriers_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $carriers_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=140000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Carriers"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=141111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Carrier"); ?> </a> &nbsp; | &nbsp; <a href="<?php echo $ADMIN ?>?ADD=140111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Copy A Carrier"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($emails_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $emails_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="admin_email_accounts.php"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Email Accounts"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="admin_email_accounts.php?eact=ADD"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Account"); ?> </a> &nbsp; | &nbsp; <a href="admin_email_accounts.php?eact=COPY"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Copy An Account"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($tts_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $tts_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=150000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show TTS Entries"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=151111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New TTS Entry"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($cc_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $cc_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="callcard_admin.php"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("CallCard Summary"); ?> </a> &nbsp; | &nbsp; <a href="callcard_admin.php?action=CALLCARD_RUNS"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Runs"); ?> </a> &nbsp; | &nbsp; <a href="callcard_admin.php?action=CALLCARD_BATCHES"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Batches"); ?> </a> &nbsp; | &nbsp; <a href="callcard_admin.php?action=SEARCH"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("CallCard Search"); ?> </a> &nbsp; | &nbsp; <a href="callcard_report_export.php"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("CallCard Log Export"); ?> </a> &nbsp; | &nbsp; <a href="callcard_admin.php?action=GENERATE"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("CallCard Generate New Numbers"); ?> </a></TD></TR>
	<?php }
	if ( (strlen($moh_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $moh_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=160000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show MOH Entries"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=161111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New MOH Entry"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($languages_sh) > 25) and (strlen($admin_hh) > 25) and ($SSenable_languages > 0) ) { 
		?>
	<TR BGCOLOR=<?php echo $languages_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="admin_languages.php?ADD=163000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Languages"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="admin_languages.php?ADD=163111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Language"); ?></FONT></a> &nbsp; | &nbsp; <a href="admin_languages.php?ADD=163211111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Copy A Languages Entry"); ?></FONT></a> &nbsp; | &nbsp; <a href="admin_languages.php?ADD=163311111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Import Phrases"); ?></FONT></a> &nbsp; | &nbsp; <a href="admin_languages.php?ADD=163411111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Export Phrases"); ?></FONT></a> &nbsp; <?php } ?></TD></TR>
	<?php }
	if ( (preg_match("/soundboard/",$SSactive_modules) ) or ($SSagent_soundboards > 0) )
		{
	if ( (strlen($soundboard_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $soundboard_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="admin_soundboard.php?ADD=162000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Soundboard Entries"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="admin_soundboard.php?ADD=162111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Soundboard Entry"); ?></FONT></a> &nbsp; | &nbsp; <a href="admin_soundboard.php?ADD=162211111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Copy A Soundboard Entry"); ?></FONT></a> &nbsp; <?php } ?></TD></TR>
	<?php
		}
	}
	if ( (strlen($vm_sh) > 25) and (strlen($admin_hh) > 25) ) { 
		?>
	<TR BGCOLOR=<?php echo $vm_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=170000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Show Voicemail Entries"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=171111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A New Voicemail Entry"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($settings_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $settings_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=311111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("System Settings"); ?> </a></TD></TR>
	<?php }
	if (strlen($label_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $label_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=180000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Screen Labels"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=181111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A Screen Label"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($colors_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $colors_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=182000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Screen Colors"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=182111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A Screen Colors"); ?> </a><?php } ?> &nbsp; | &nbsp; <a href="<?php echo $ADMIN ?>?ADD=311111111111111#screen_colors"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Change Active Screen Colors"); ?> </a></TD></TR>
	<?php }
	if (strlen($cts_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $cts_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=190000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Contacts"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=191111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A Contact"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($sc_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $sc_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=192000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Settings Containers"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=192111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A Settings Container"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($ar_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $ar_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=194000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Automated Reports"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=194111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add An Automated Report"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($il_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $il_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=195000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("IP Lists"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=195111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add An IP List"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($sg_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $sg_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=193000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Status Groups"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=193111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A Status Group"); ?> </a><?php } ?></TD></TR>
	<?php }
	if (strlen($cg_sh) > 25) { 
		?>
	<TR BGCOLOR=<?php echo $sg_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=196000000000"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("CID Groups"); ?> </a> &nbsp; |<?php if ($add_copy_disabled < 1) { ?> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=196111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Add A CID Group"); ?> </a><?php } ?></TD></TR>
	<?php }
	if ( (strlen($status_sh) > 25) and (!preg_match('/campaign|user/i',$hh) ) ) { 
		?>
	<TR BGCOLOR=<?php echo $status_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="<?php echo $ADMIN ?>?ADD=321111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("System Statuses"); ?> </a> &nbsp; | &nbsp; <a href="<?php echo $ADMIN ?>?ADD=331111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("Status Categories"); ?> </a> &nbsp; | &nbsp; <a href="<?php echo $ADMIN ?>?ADD=341111111111111"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"> <?php echo _QXZ("QC Status Codes"); ?> </a></TD></TR>
	<?php }

	if ( ($ADD=='3') or ($ADD=='3') ) { 
		?>
	<TR BGCOLOR=<?php echo $users_color ?>><TD ALIGN=LEFT COLSPAN=2> &nbsp; <a href="./user_stats.php?user=<?php echo $user ?>" STYLE="text-decoration:none;"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"><?php echo _QXZ("User Stats"); ?> </a> &nbsp; | &nbsp; <a href="./user_status.php?user=<?php echo $user ?>" STYLE="text-decoration:none;"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"><?php echo _QXZ("User Status"); ?> </a> &nbsp; | &nbsp; <a href="./AST_agent_time_sheet.php?agent=<?php echo $user ?>" STYLE="text-decoration:none;"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"><?php echo _QXZ("Time Sheet"); ?> </a> &nbsp; | &nbsp; <a href="./AST_agent_days_detail.php?user=<?php echo $user ?>" STYLE="text-decoration:none;"><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;color:BLACK;"><?php echo _QXZ("Days Status"); ?> </a></TD></TR>
	<?php }

	
if (strlen($reports_hh) > 25) { 
	?>
<TR BGCOLOR=<?php echo $reports_color ?>><TD ALIGN=LEFT COLSPAN=2><FONT STYLE="font-family:HELVETICA;font-size:<?php echo $subcamp_font_size ?>;"><B> &nbsp; </B></TD></TR>
<?php } ?>


<TR><TD ALIGN=LEFT COLSPAN=2 HEIGHT=2 BGCOLOR=#<?php echo "$SSmenu_background" ?>></TD></TR>
<TR><TD ALIGN=LEFT COLSPAN=2>
<?php 
######################### FULL HTML HEADER END #######################################
}

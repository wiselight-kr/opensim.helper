<?php
//
//
//

require_once('../include/config.php');
require_once('../include/opensim.mysql.php');

$LOGIN_SCREEN_CONTENT = "hero hero";

$BOX_TITLE		= _MD_XPNSM_LGSN_BOX_TTL;
$BOX_COLOR		= "green";
$BOX_INFOTEXT	= "BOX_INFOTEXT";

$DB_STATUS_TTL	  = _MD_XPNSM_DB_STATUS;
$ONLINE  		  = _MD_XPNSM_ONLINE_TTL;
$OFFLINE 		  = _MD_XPNSM_OFFLINE_TTL;
$TOTAL_USER_TTL   = _MD_XPNSM_TOTAL_USERS;
$TOTAL_REGION_TTL = _MD_XPNSM_TOTAL_REGIONS;
$LAST_USERS_TTL   = _MD_XPNSM_VISITORS_LAST30DAYS;
$ONLINE_TTL 	  = _MD_XPNSM_ONLINE_NOW;


$status = opensim_check_db();

$GRID_STATUS	  = $status['grid_status'];
$NOW_ONLINE 	  = $status['now_online'];
$LASTMONTH_ONLINE = $status['lastmonth_online'];
$USER_COUNT 	  = $status['user_count'];
$REGION_COUNT 	  = $status['region_count'];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<title>Login Screen for OpenSim</title>
<link  href="loginscreen/style.css" type=text/css rel=stylesheet />
<script src="loginscreen/resize.js" type=text/javascript></script>
<script src="loginscreen/imageswitch.js" type=text/javascript></script>
<script src="loginscreen/need_new_version.js" type=text/javascript></script>

<script>
	$(document).ready(function(){

	bgImgRotate();
	if ( document.getElementById('update_box') && (os != "" || channel != "" || version != "") )
	{
		var DLurl = get_url(os, channel, version);
		var version_info = $.ajax({ url: DLurl, async: false }).responseText.split("||");
		var DLurlString = "<a href='"+version_info[1]+"' target='_blank'>"+"Download Version "+version_info[0]+"</a>";
		var releaseNotesLink = "<a href='"+getReleaseNotesUrl(channel, version_info[0])+"' target='_blank'>"+"Read the release notes</a>";

		if(versionIsNewer(version_info[0], version) && (version_info[2]==true))
		{
			$.ajax({
				url: "/app/login/_includes/update_available_box.php?lang=en-US",
				cache: false,
				success: function(html){
					$("#update_box").append(html);
					$("#url").append(DLurlString);
					$("#release_notes").append(releaseNotesLink);
				}
			});
		}
		else if(versionIsNewer(version_info[0], version) && (version_info[2]==false))
		{
			$.ajax({
				url: "/app/login/_includes/update_required_box.php?lang=en-US",
				cache: false,
				success: function(html){
					$("#update_box").append(html);
					$("#url").append(DLurlString);
					$("#release_notes").append(releaseNotesLink);
				}
			});
		}
		else
		{
			$("#update_box").load("/app/login/_includes/blog_statusblog.php");
		}
	}

	$("#blog_box").show();
});
</script>

<div id=top_image>
  <img height=139 src="images/login_screens/logo.png" width=307 />
</div>
<div id=bottom_left>
  <?php include("loginscreen/special.php"); ?>
  <br />
  <div id=regionbox>
    <?php  include("loginscreen/region_box.php"); ?>
  </div>
</div>

<img id=mainImage src="images/login_screens/spacer.gif" /> 

<div id=bottom>
  <div id=news>
    <?php include("loginscreen/news.php"); ?>
  </div>
</div>

<div id=topright>
  <br />
  <div id="updatebox"></div>
  <br />
  <br />
  <div id=gridstatus>
    <?php include("loginscreen/gridstatus.php"); ?>
  </div>
  <br />
  <div id=Infobox>
    <?php 
      if ($BOX_INFOTEXT!="") {
        include("loginscreen/box_color.php"); 
      }
    ?>
  </div>
</div>

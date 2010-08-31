<?php
//
//
//

require_once('../include/config.php');
require_once('../include/opensim.mysql.php');


//$DbLink = new DB;

//$DbLink->query("SELECT gridstatus,active,color,title,message  FROM ".C_INFOWINDOW_TBL." ");
//list($GRIDSTATUS,$INFOBOX,$BOXCOLOR,$BOX_TITLE,$BOX_INFOTEXT) = $DbLink->next_record();
$GRIDSTATUS = "GRIDSTATUS";
$INFOBOX="1";
$BOXCOLOR="green";
$BOX_TITLE="BOX_TITLE";
$BOX_INFOTEXT="BOX_INFOTEXT";


// Doing it the same as the Who's Online now part
//$DbLink = new DB;
//$DbLink->query("SELECT UUID, currentRegion FROM ".C_AGENTS_TBL." where agentOnline = 1 AND ". 
//				"logintime < (UNIX_TIMESTAMP(FROM_UNIXTIME(UNIX_TIMESTAMP(now())))) AND ".
//				"logoutTime < (UNIX_TIMESTAMP(FROM_UNIXTIME(UNIX_TIMESTAMP(now())))) ".
//				"ORDER BY logintime DESC");
$NOWONLINE = 0;
//while(list($UUID,$regionUUID) = $DbLink->next_record())
//{
	// Let's get the user info
	//$DbLink2 = new DB;
	//$DbLink2->query("SELECT username, lastname from ".C_USERS_TBL." where UUID = '".$UUID."'");
	//list($firstname, $lastname) = $DbLink2->next_record();
	//$username = $firstname." ".$lastname;
	$username = "Fumi Hax";
	// Let's get the region information
	//$DbLink3 = new DB;
	//$DbLink3->query("SELECT regionName from ".C_REGIONS_TBL." where UUID = '".$regionUUID."'");
	//list($region) = $DbLink3->next_record();
	$region = "AAAAAAAAAAAAAAA";
	//if ($region != "")
	//{
	//$NOWONLINE = $NOWONLINE + 1;
	$NOWONLINE = 10;
	//}
//}

//$DbLink->query("SELECT count(*) FROM ".C_AGENTS_TBL." where logintime > UNIX_TIMESTAMP(FROM_UNIXTIME(UNIX_TIMESTAMP(now()) - 2419200))");
//list($LASTMONTHONLINE) = $DbLink->next_record();
$LASTMONTHONLINE = "LASTMONTHONLINE";
 
//$DbLink->query("SELECT count(*) FROM ".C_USERS_TBL."");
//list($USERCOUNT) = $DbLink->next_record();
$USERCOUNT = "USERCOUNT";

//$DbLink->query("SELECT count(*) FROM ".C_REGIONS_TBL."");
//list($REGIONSCOUNT) = $DbLink->next_record();
$REGIONSCOUNT = "REGIONSCOUNT";
		
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<title><?php echo SYSNAME?> Login</title>
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
      if(($INFOBOX=="1")&&($BOXCOLOR=="white")){
        include("loginscreen/box_white.php"); 
      }else if(($INFOBOX=="1")&&($BOXCOLOR=="green")){
        include("loginscreen/box_green.php"); 
      }else if(($INFOBOX=="1")&&($BOXCOLOR=="yellow")){
        include("loginscreen/box_yellow.php"); 
      }else if(($INFOBOX=="1")&&($BOXCOLOR=="red")){
        include("loginscreen/box_red.php"); 
      }
    ?>
  </div>
</div>

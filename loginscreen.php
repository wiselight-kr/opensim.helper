<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">

<head>
<title>Login Screen for OpenSim</title>
<link  href="loginscreen/style.css" type=text/css rel=stylesheet />
<link  href="loginscreen/info_alert_box.css" type=text/css rel=stylesheet />
<script src="loginscreen/resize.js" type=text/javascript></script>
<script src="loginscreen/imageswitch.js" type=text/javascript></script>
</head>

<body bgcolor=#000000>
<script>
	$(document).ready(function(){
		bgImgRotate();
	});
</script>

<div id=top_image>
  <img height=139 src="images/login_screens/logo.png" width=307 />
</div>

<div id=bottom_left>
  <?php include("loginscreen/special.php"); ?>
  <br />
  <div id=regionbox>
    <?php include("loginscreen/region_box.php"); ?>
  </div>
</div>

<img id=mainImage src="images/login_screens/spacer.gif" /> 

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
        include("loginscreen/color_box.php"); 
      }
    ?>
  </div>
</div>
</body>

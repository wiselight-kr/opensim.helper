<?php
require_once(realpath(dirname(__FILE__).'/../../../config.php'));
require_once(realpath(dirname(__FILE__).'/../include/config.php'));

if (!defined('CMS_MODULE_PATH')) exit();
require_once(CMS_MODULE_PATH.'/include/modlos.func.php');


$BOX_COLOR        = "red";
$BOX_INFOTEXT     = "BOX_INFOTEXT<br /> sssss<br /><br /><br /><br />SSSSSSSSSS<br/>ssssssssss<br />ssssssssss";


//include('./loginscreen.php');

?>
<head>
<link  href="loginscreen/style.css" type=text/css rel=stylesheet />
</head>

<body>
  <div id=Infobox>
    <?php 
      include("loginscreen/box_color.php"); 
    ?>
  </div>
</body>

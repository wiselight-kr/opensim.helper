<?php
//
//
//

require_once(realpath(dirname(__FILE__).'/../include/env_interface.php'));

$LOGIN_SCREEN_CONTENT = "XXX";

$BOX_TITLE		  = "AAAAAAAAAAA";
$BOX_COLOR		  = "BBBBBBBBBBB";
$BOX_INFOTEXT	  = "CCCCCCCCCCC";

$GRID_NAME		  = "X Grid";
$REGION_TTL		  = "ZZZZ";

$DB_STATUS_TTL	  = "DB_STATUS_TTL";
$ONLINE  		  = "ONLIN";
$OFFLINE 		  = "OFFLINE";
$TOTAL_USER_TTL   = "TOTAL_USER_TTL";
$TOTAL_REGION_TTL = "TOTAL_REGION_TTL";
$LAST_USERS_TTL   = "LAST_USERS_TT";
$ONLINE_TTL 	  = "ONLINE_TT";


$status = opensim_check_db();

$GRID_STATUS	  = $status['grid_status'];
$NOW_ONLINE 	  = $status['now_online'];
$LASTMONTH_ONLINE = $status['lastmonth_online'];
$USER_COUNT 	  = $status['user_count'];
$REGION_COUNT 	  = $status['region_count'];

header('pragma: no-cache');
include('./loginscreen.php');

?>

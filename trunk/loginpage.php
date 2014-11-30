<?php
//
//
//

require_once(realpath(dirname(__FILE__).'/../../../mainfile.php'));
require_once(realpath(dirname(__FILE__).'/../include/env_interface.php'));


$root = & XCube_Root::getSingleton();
$LOGIN_SCREEN_CONTENT = $root->mContext->mModuleConfig['loginscreen_content'];

$alert = xoopensim_get_loginscreen_alert();
$BOX_TITLE		  = $alert['title'];
$BOX_COLOR		  = $alert['borderColor'];
$BOX_INFOTEXT	  = $alert['information'];

$GRID_NAME		  = $root->mContext->mModuleConfig['grid_name'];
$REGION_TTL		  = _MD_XPNSM_REGION;

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

header('pragma: no-cache');
include('./loginscreen.php');

?>

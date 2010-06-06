<?php
/*
 * Copyright (c) 2007, 2008 Contributors, http://opensimulator.org/
 * See CONTRIBUTORS for a full list of copyright holders.
 *
 * See LICENSE for the full licensing terms of this file.
 *
*/

//This looks like its lifted from http://www.weberdev.com/get_example-4372.html  
//I'd contact the original developer for licensing info, but his website is broken.

//
// Modified by Fumi.Iseki for CMS/LMS '10 3/29
//                                    '10 5/24
//


// for TEST
if (!defined('OPENSIM_DB_HOST')) {
	exit();
	//define('OPENSIM_DB_HOST',  '202.26.159.xxx');
	//define('OPENSIM_DB_NAME',  'opensim_xxxx');
	//define('OPENSIM_DB_USER',  'opensim_xxxx');
	//define('OPENSIM_DB_PASS',  'opensim_xxxx');
}



class DB
{
	var $Host 	  = OPENSIM_DB_HOST;	// Hostname of our MySQL server
	var $Database = OPENSIM_DB_NAME;	// Logical database name on that server
	var $User 	  = OPENSIM_DB_USER;	// Database user
	var $Password = OPENSIM_DB_PASS;	// Database user's password
	var $Link_ID  = null;				// Result of mysql_connect()
	var $Query_ID = null;				// Result of most recent mysql_query()
	var $Record	  = array();			// Current mysql_fetch_array()-result
	var $Row;							// Current row number
	var $Errno    = 0;					// Error state of query
	var $Error    = '';

	var $Timeout;						// not implement yet



	function DB($connect=false, $timeout=60)
	{
		//$this->Host 	= OPENSIM_DB_HOST;	
		//$this->Database = OPENSIM_DB_NAME;	
		//$this->User 	= OPENSIM_DB_USER;	
		//$this->Password = OPENSIM_DB_PASS;	

		$this->Timeout = $timeout;
		//ini_set('mysql.connect_timeout', $timeout);

		if ($connect) $this->connect();
	}



	function halt($msg)
	{
		echo "</td></tr></table><b>Database error:</b> $msg<br />\n";
		echo "<b>MySQL error</b>: $this->Errno ($this->Error)<br />\n";
		die('Session halted.');
	}



	function set_DB($dbhost, $dbname, $dbuser, $dbpass)
	{
		$this->Host 	= $dbhost;	
		$this->Database = $dbname;	
		$this->User 	= $dbuser;	
		$this->Password = $dbpass;	
	}



	function connect()
	{
		if ($this->Link_ID==null) {
			$this->Link_ID = mysql_connect($this->Host, $this->User, $this->Password);
			if (!$this->Link_ID) {
				//$this->halt('Link_ID == false, connect failed');
				$this->Errno = 999;
				return;
			}

			//if (_CHARSET=='UTF-8') mysql_set_charset('utf8'); 
			mysql_set_charset('utf8'); 
			$SelectResult = mysql_select_db($this->Database, $this->Link_ID);
			if (!$SelectResult) {
				$this->Errno = mysql_errno($this->Link_ID);
				$this->Error = mysql_error($this->Link_ID);
				$this->Link_ID = null;
				$this->halt('cannot select database <i>'.$this->Database.'</i>');
			}
		}
	}



 	function escape($String)
 	{
		$this->connect();
 		return mysql_real_escape_string($String);
 	}



	function query($Query_String)
	{
		$this->connect();
		if ($this->Errno!=0) return 0;

		$this->Query_ID = mysql_query($Query_String, $this->Link_ID);
		$this->Row = 0;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		if (!$this->Query_ID) {
			$this->halt('Invalid SQL: '.$Query_String);
		}
		return $this->Query_ID;
	}



	function next_record()
	{
		$this->Record = @mysql_fetch_array($this->Query_ID);
		$this->Row += 1;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$stat = is_array($this->Record);
		if (!$stat) {
			@mysql_free_result($this->Query_ID);
			$this->Query_ID = null;
		}
		return $this->Record;
	}



	function num_rows()
	{
		return mysql_num_rows($this->Query_ID);
	}



	function affected_rows()
	{
		return mysql_affected_rows($this->Link_ID);
	}



	function optimize($tbl_name)
	{
		$this->connect();
		if ($this->Errno!=0) return;

		$this->Query_ID = @mysql_query('OPTIMIZE TABLE '.$tbl_name, $this->Link_ID);
	}



	function clean_results()
	{
		if ($this->Query_ID!=null) {
			mysql_freeresult($this->Query_ID);
			$this->Query_ID = null;
		}
	}



	function close()
	{
	/*
		if ($this->Link_ID) {
			mysql_close($this->Link_ID);
			$this->Link_ID = null;
		}
	*/
	}



	function exist_table($table)
	{
		$ret = false;

		$this->query('SHOW TABLES');
		if ($this->Errno==0) {
			while (list($db_tbl) = $this->next_record()) {
				if ($db_tbl==$table) {
					$ret = true;
					break;
				}
			}
		}

		/*
		$this->connect();
		if ($this->Errno!=0) return false;

		$tl = mysql_list_tables($this->Database, $this->Link_ID);
		while($row=mysql_fetch_row($tl)) {
			if (in_array($table, $row)) {
				$ret = true;
				break;
			}
		}*/

		return $ret;
	}



	function exist_field($table, $field)
	{
		$ret1 = false;
		$ret2 = false;

		$this->query('SHOW TABLES');
		if ($this->Errno==0) {
			while (list($db_tbl) = $this->next_record()) {
				if ($db_tbl==$table) {
					$ret1 = true;
					break;
				}
			}
		}

		if ($ret1) {
			$this->query('SHOW COLUMNS FROM '.$table);
			if ($this->Errno==0) {
				while (list($db_fld) = $this->next_record()) {
					if ($db_fld==$field) {
						$ret2 = true;
						break;
					}
				}
			}
		}

		return $ret2;
	}




	//
	// Timeout
	//
/*
	function set_default_timeout($tm)
	{
    	ini_set('mysql.connect_timeout', $tm);
		$this->Timeout = $tm;
	}



	function set_temp_timeout($tm)
	{
    	ini_set('mysql.connect_timeout', $tm);
	}



	function reset_timeout()
	{
    	ini_set('mysql.connect_timeout', $this->Timeout);
	}
*/

}

?>

<?php
//			//i-diditech,i-did tech, i-tech, i-didsys,i-digitech, i-didsystems
class mysqliUsed
{
	public $insert_id;
	public $error;
	public $conn;
	
	function __toString()
	{
		return "Error!";
	}
	
	
	function mysqliUsed($host,$user,$pass,$db,$port)
	{
		$conn = mysql_connect("$host:$port","$user",$pass) or die(mysql_error());
		if($db!=NULL)
		{
			mysql_select_db($db,$conn);	
		}
		$this->conn=$conn;
		return $conn;
	}
	
	
	function mysqliConnectToDb($host,$user,$pass,$db,$port)
	{
		$conn = mysql_connect("$host:$port","$user",$pass) or die(mysql_error());
		mysql_select_db($db,$conn);
		$this->conn=$conn;
		return $conn;
	}
	
	function createDB($dbName)
	{
		//create database. If it already exists it should throw an error
		$str='CREATE DATABASE `'.$dbName.'`';
		$sql= mysql_query($str);
	}

	function createDBUser($username, $host, $password, $dbName)
	{
		$str="GRANT ALL PRIVILEGES ON ".$dbName." . * TO '".$username."'@'".$host."' IDENTIFIED BY '".$password."' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";
		$sql= mysql_query($str,$this->conn);
		//$sql=mysql_create_db($dbName, $this->conn);
//		return $sql;
/*User contributed notes:
zubrag (29-Aug-2006 11:03)

mysql_create_db function will not work on cPanel hosting. If you need to create database from your PHP script on cPanel hosted server then you'll need to use cPanel interface. Database creation code would look like (calling cPanel's adddb function): http://USER:PASS@HOST:2082/frontend/SKIN/sql/adddb.html?db=DB
You can download ready-made sample php script from http://www.zubrag.com/scripts/cpanel-database-creator.php

omer (21-Jun-2005 01:42)

for MySQL4.1 lib users;
as noted the function is a no-go for MySQL4.1 libs.  While i do not know the logic behind this i was relieved to see that
mysql_connect ("localhost","$user","$password")
$soru = 'CREATE DATABASE '.$dbname;
mysql_query($soru);
worked just fine...*/

	}
	
	
	
	
	function close()
	{
		mysql_close($this->conn);
	
	}
	
	function query($str, $update=NULL)
	{
		//echo $str;
		$sql = mysql_query($str,$this->conn);
		if($update==NULL)
		{
			@$this->num_rows = mysql_num_rows($sql);
		}
		else
		{
			@$this->affected_rows = mysql_affected_rows($this->conn);
		}
		@$this->error = mysql_error($this->conn);
		if(mysql_insert_id($this->conn))
			$this->insert_id = mysql_insert_id($this->conn);
		if(!$sql)
			return false;
		//return new mysql_result($sql,$this->conn);
		return $sql;
	}
	
	function fetch_assoc_mine($sql)
	{
		return mysql_fetch_assoc($sql);
	}

	
	
	function get_mysql_result($sql)
	{
		return new mysql_result($sql,$this->conn);
	}
	
	function fetch_assoc()
	{
		return mysql_fetch_assoc($this->conn);
	}
	
	function escape_string($str)
	{
		return mysql_escape_string($str);
	}
	
	function real_escape_string($str)
	{
		return mysql_real_escape_string($str);
	}
	
	
	function mysql_table_exists($db, $tableName)
	{
	  $tables = array();
	  $tablesResult = mysql_query("SHOW TABLES FROM $db;", $this->conn);
	  while ($row = mysql_fetch_row($tablesResult)) $tables[] = $row[0];
	   if (!$tablesResult) {
	   }
	  return(in_array($tableName, $tables));
	}
	
	function db_name_exists($db)
	{
		$db_list = mysql_list_dbs($this->conn);
		$i = 0;
		$check=0;
		$cnt = mysql_num_rows($db_list);
		while ($i < $cnt) {
		   $name=mysql_db_name($db_list, $i);
		   if($name==$db)
		   {
		   		$check=1;
		   }
		   $i++;
		}
		
		if($check==0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}


	}
}

class mysql_result extends mysqli
{
	var $num_rows, $affected_rows;
	function mysql_result($link,$conn)
	{
		$this->result=$link;
		@$this->num_rows=mysql_num_rows($link);
		@$this->affected_rows=mysql_affected_rows($conn);
		$this->link=$link;
	}
	
	function fetch_assoc()
	{
		return mysql_fetch_assoc($this->link);
	}
	
	function fetch_object()
	{
		return mysql_fetch_object($this->link);
	}
	
	function data_seek($row)
	{
		return mysql_data_seek($this->link,$row);
	}
	
	
}
?>
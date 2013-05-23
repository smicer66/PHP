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
		$conn = mssql_connect("$host:$port","$user",$pass) or die("Cannot connect to MSSQL Server");
		if($conn!=NULL)
		{
			mssql_select_db($db,$conn);	
		}
		$this->conn=$conn;
		return $conn;
	}
	
	
	function mysqliConnectToDb($host,$user,$pass,$db,$port)
	{
		$conn = mssql_connect("$host:$port","$user",$pass) or die("Cannot connect to MSSQL Server");
		if($conn!=NULL)
		{
			mssql_select_db($db,$conn);	
		}
		$this->conn=$conn;
		return $conn;
	}
	
	
	
	
	
	
	function close()
	{
		mssql_close($this->conn);
	
	}
	
	function query($str)
	{
		//echo $str;
		$sql = mssql_query($str,$this->conn);
		
		@$this->num_rows = mssql_num_rows($sql);
		@$this->affected_rows = mssql_rows_affected($this->conn);
		@$this->error =  "Error Encountered";
		
		$query  = 'select SCOPE_IDENTITY() AS last_insert_id';
        $query_result = mssql_query($query) or die('Query failed: '.$query);
        $query_result    = mssql_fetch_object($query_result);
        mssql_free_result($query_result);
        $this->insert_id=$query_result->last_insert_id;
		
		if(!$sql)
			return false;
		//return new mysql_result($sql,$this->conn);
		return $sql;
	}
	
	function fetch_assoc_mine($sql)
	{
		return mssql_fetch_assoc($sql);
	}

	
	
	function get_mysql_result($sql)
	{
		return new mssql_result($sql,$this->conn);
	}
	
	function fetch_assoc()
	{
		return mssql_fetch_assoc($this->conn);
	}
	
	
}

class mssql_result
{
	var $num_rows, $affected_rows;
	function mssql_result($link,$conn)
	{
		$this->result=$link;
		@$this->num_rows=mssql_num_rows($link);
		@$this->affected_rows=mssql_rows_affected($conn);
		$this->link=$link;
	}
	
	function fetch_assoc()
	{
		return mssql_fetch_assoc($this->link);
	}
	
	function fetch_object()
	{
		return mssql_fetch_object($this->link);
	}
	
	function data_seek($row)
	{
		return mssql_data_seek($this->link,$row);
	}
	
	
}
?>
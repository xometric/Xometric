<?php
class mysqlDB
{
	protected $dbServer;
	protected $dbUsername;
	protected $dbPassword;
	protected $dbName;
	protected $rowsAffected;
	protected $queryCount;
	protected $lastQueryAssoc;
	protected $fieldNames;
	protected $fieldTypes;
	protected $startTime;
	
	function __construct($dbServer, $dbUsername, $dbPassword, $dbName)
	{
		$this->dbServer = $dbServer;
		$this->dbUsername = $dbUsername;
		$this->dbPassword = $dbPassword;
		$this->dbName = $dbName;
		$this->startTime = microtime();
		
		mysql_connect($this->dbServer,$this->dbUsername,$this->dbPassword) or die(mysql_error());
		mysql_select_db($this->dbName) or die(mysql_error());
	}
	
	function query($queryString)
	{
		$result = mysql_query($queryString) or die(mysql_error());
		$this->rowsAffected += mysql_affected_rows();
		$this->queryCount += 1;
		
		return ($result);
	}
	
	function queryAssoc($queryString)
	{
		$result = mysql_query($queryString) or die(mysql_error());
		$this->rowsAffected += mysql_affected_rows();
		$this->queryCount += 1;
		$rowArray = array();
		while ($row = mysql_fetch_assoc($result))
		{
			array_push($rowArray, $row);
		}
		
		$rowArray = array_reverse($rowArray);
		
		$this->lastQueryAssoc = $rowArray;
		
		for ($x = 0; $x < mysql_num_fields($result); $x ++)
		{
			$this->fieldNames[$x] = mysql_field_name($result,$x);
			$this->fieldTypes[$x] = mysql_field_type($result,$x);
		}
		
		if (mysql_num_rows($result) != 0)
		{
			return mysql_num_rows($result);
		} else {
			return false;
		}
	}
	
	function getNextAssocRow()
	{
		if (count($this->lastQueryAssoc) == 0)
		{
			return false;
		} else {
			return(array_pop($this->lastQueryAssoc));
		}
		
	}
	
	function getAffectedRows()
	{
		return $this->rowsAffected;
	}
	
	function getQueryCount()
	{
		return $this->queryCount;
	}
	
	function getFieldNames()
	{
		if (count($this->fieldNames) == 0)
		{
			return false;
		} else {
			return($this->fieldNames);
		}
	}
	
	function getFieldTypes()
	{
		if (count($this->fieldTypes) == 0)
		{
			return false;
		} else {
			return($this->fieldTypes);
		}
	}
	
	function getTimeTaken()
	{
		return number_format(microtime() - $this->startTime,5);
	}
}
?>
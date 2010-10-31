<?php
	//Remove path from name of PHP script
	$scriptName = explode("/",$_SERVER['SCRIPT_NAME']);	$scriptName = $scriptName[count($scriptName) - 1];
	//Remove .php file extension from PHP script
	$scriptName = explode(".", $scriptName); $scriptName = $scriptName[0];
	
	if (file_exists("css/" . $scriptName . ".inc.css"))
	{
		echo "<link rel=\"StyleSheet\" href=\"css/" . $scriptName . ".inc.css\" type=\"text/css\" media=\"screen\" />\n";
	}	
?>
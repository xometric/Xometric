<?php
	//Remove path from name of PHP script
	$scriptName = explode("/",$_SERVER['SCRIPT_NAME']);	$scriptName = $scriptName[count($scriptName) - 1];
	//Remove .php file extension from PHP script
	$scriptName = explode(".", $scriptName); $scriptName = $scriptName[0];
	
	if (file_exists("js/" . $scriptName . ".inc.js"))
	{
		echo "<script type=\"text/javascript\" src=\"js/" . $scriptName . ".inc.js\"></script>\n";
	}
	
?>
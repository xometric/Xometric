<?php
	//All config settings
	require_once("includes/config.php");
	//Any other includes that need to be loaded for every page
	require_once("includes/globalIncludes.php");
	//All classes that are needed
	require_once("includes/classes.php");
	//OPTIONAL:	Create an instance of the mysqlDB class
	//			Uses db settings from config.php
	require_once("includes/initDB.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>Project Template</title>
		<?php
			//CSS SECTION
			//Load in Blueprint CSS
			require_once("includes/_static/blueprintCSS.php");
			//Load main css
			echo "<link rel=\"StyleSheet\" href=\"css/main.css\" type=\"text/css\" media=\"screen\" />\n";
			//Check for CSS files in the /css folder that match the filename of this script
			//CSS files must match the filename with '.inc.css' at the end
			//For example, if the script is named example.php, the CSS file must be called 'example.inc.css'
			require_once("includes/_static/cssInclude.php");
			
			//JAVASCRIPT SECTION
			//Load jQuery
			require_once("includes/_static/includeJQuery.php");
			//Check for JavaScript source files in the /js folder that match the filename of this script
			require_once("includes/_static/jsInclude.php");		
		?>
	</head>
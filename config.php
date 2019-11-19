<?php 
Error_Reporting(E_ALL & ~E_NOTICE); // Report All Errors Except E_NOTICE
function __autoload ($className) { //on call load class name into $class_name 
	$path=str_replace("_", "/", $className); // replace "_" symbol to "/"" - to get file path
	include_once($path .".php"); //load file
}
?>
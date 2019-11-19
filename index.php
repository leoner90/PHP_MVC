<?php
// all page loads go through index.php (HTACCESS)
// DB connect settings in Base/Controller
require_once "./config.php"; //Setup File
$router=new Base_Application; //get file from base folder and create new obj base-Application 
$member=$router->run();//Find controller for current page
$member['init']=0; // to avoid error if empty
foreach ($member as $key => $value){ // get obj with value into member and foreach it as key and value
	$$key = $value; 
}
require_once "./template/header.php"; // Site Header - Static.
// View - Output
$view=$router->getView();
include ($view); 
require_once "./template/footer.php"; // Site Footer - Static.
?>
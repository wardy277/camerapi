<?php
//allow cron through shell to work withough login
if(substr($_SERVER['SHELL'], 0, 4) == '/bin' && !empty($argv)){
	
	//parse argments into $_GET
	parse_str(implode('&', array_slice($argv, 1)), $_GET);
	
	$cronning = true;
}

 
error_reporting(E_ERROR);
 
if (isset($_GET['debug'])) {
	ini_set("display_errors", 1);
	error_reporting(E_ALL ^ E_NOTICE);
}



function pre_r($v) {
        echo "\n<pre>";
        print_r($v);
        echo "</pre>\n";
}

function my_autoloader($class) {

        $path = dirname(__FILE__)."/";

        //echo "\n\nlooking for $class in $path\n";

        if(file_exists($path.$class.".php")){
                //echo "found ".$path.$class.".php";
                include($path.$class.".php");
        }
        else if(file_exists($path.$class."/".$class.".php")){
                //echo "found ".$path.$class."/".$class.".php";
                include($path.$class."/".$class.".php");
        }
        else if(file_exists($path.$class."/index.php")){
                //echo "found ".$path.$class."/index.php";
                include($path.$class."/index.php");
        }
        else {
                echo "Class not found $class";
                exit;
        }

}

spl_autoload_register('my_autoloader');

?>

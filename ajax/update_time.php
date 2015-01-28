<?php

$time = $_POST['time'];

//validate date 
$valid = preg_match("/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/", $time);

if(($valid)){
	file_put_contents('/tmp/update_time', $time);
}

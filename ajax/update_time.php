<?php

$date_time = $_POST['date_time'];

//validate date 
$valid = preg_match("/\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/", $date_time);

$output['success'] = false;

if($valid){
	file_put_contents('/tmp/update_time', $date_time);
	$output['success'] = true;
}

echo json_encode( $output );

?>

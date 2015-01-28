<?php
include(dirname(__FILE__)."/settings.php");

$pi = new PiControl();
$pi->processPost();

$type = $_GET['type'];

switch ($type) {
	case "timelapse":
		$directory = "motion/timelapse/";
		break;
	case "openmax":
		$directory = "timelapse/";
		break;
	default:
		$directory = "motion/";
		break;
}

$dir = new DirListing($directory);


ob_start();
?>

<div class="row">

<?php foreach($dir->getVideos() as $video){ ?>
	
	<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
		<video src="<?=$video->getSrc();?>" controls width = "100%"></video>
		<div class="text-center">
			<a href="<?=$video->getSrc()?>"><?=$video->getName()?></a>
		</div>
	</div>
	
<?php } ?>
	
</div>


<?php

$content = ob_get_clean();

include("templates/header.html");
echo $content;
include("templates/footer.html");

<?php

include("ham-package.php");

$hp = new HamPackage();

$hp->gather(
	array(
		"project/main.php",
		"project/sub/definitions.php",
		"project/sub/actions.php"
	)
);

$hp->runLocal();

$hp->runPackage("fileedit.full.php");

$hp->minify();
$hp->runPackage("fileedit.min.php");

?>

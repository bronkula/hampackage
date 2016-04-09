<?php

include_once("ham-package.php");

$hp = new HamPackage();

// Add text content to the stream
$hp->append("Version 1.0");
// Gather text content of files into the stream
$hp->gather(
	array(
		"project/main.php",
		"project/sub/definitions.php",
		"project/sub/actions.php"
	)
);

// Build multiple packages to multiple file names
$hp->buildPackage("project.full.php");
$hp->buildPackage("project.min.php", $hp->minify(););

// Run a local copy so that the build script can also be used
$hp->runLocal();

?>

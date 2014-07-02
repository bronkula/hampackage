hampackage
==========

A Packaging class for php

This script allows you to work on a local php file that both loads a local stream and outputs finalized and minifed files.

An example file has been included.

Methods of the class are:
gather();
runLocal();
minify();
and
runPackage();

The minifier is really quite basic, and just removes excess whitespace, and stream comments.
The gather method accepts an array of files to be included in the stream. Each new call to gather will create a new stream, so that multiple versions of the script can be output (especially useful if your local server has different settings than the production server).
The runLocal method will out the current stream to a php eval so that the script can be run immediately.
The runPackage method accepts a string for a file to output the current stream.

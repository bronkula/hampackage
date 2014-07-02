hampackage
==========

A Packaging class for php

This script allows you to work on a local php file that both loads a local stream and outputs finalized and minifed files.  If your next thought is "Why would I want this?" that's fair, I guess.  But I use it to create one page scripts.  Autonomous applications that can be loaded onto a server with all of their dependencies built into one file.

An example file has been included.

Methods of the class are:
- gather();
  - The gather method accepts an array of files to be included in the stream. Each new call to gather will create a new stream, so that multiple versions of the script can be output (especially useful if your local server has different settings than the production server).
- runLocal();
  - The runLocal method will out the current stream to a php eval so that the script can be run immediately.
- minify();
  - The minifier is really quite basic, and just removes excess whitespace, and stream comments.
- runPackage();
  - The runPackage method accepts a string for a file to output the current stream.

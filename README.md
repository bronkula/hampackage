hampackage
==========

A Packaging class for php

This script allows you to work on a local php file that both loads a local stream and outputs finalized and minifed files.  If your next thought is "Why would I want this?" that's fair, I guess.  But I use it to create one page scripts.  Autonomous applications that can be loaded onto a server with all of their dependencies built into one file.

An example file has been included.

Methods of the class are:
- **append**((String) _str_);
  - Append will add a string to the current stream
- **arrange**((Array) _str_ [, (Boolean) _append_]);
  - Arrange will append an array of strings to the current stream. The second argument flags whether to append to the stream, or return as a string.
- **gather**((Array) _filenames_ [, (Boolean) _append_] );
  - Gather accepts an array of filenames to be included in the stream. An empty string will be ignored. The second argument flags whether to append to the stream, or return as a string.
- **runLocal**([(Boolean) _isPHP_]);
  - RunLocal will output the current stream to a php eval so that the script can be run immediately. If a false flag is passed for the second argument, it will simply be echoed as a string, instead of eval for php.
- **minify**();
  - Minify will return a condensed version of the stream, but will not alter the original. This is not an uglifier, it simply removes comments and whitespace.
- **buildPackage**((String) _filename_ [, (String) _string_]);
  - BuildPackage will output a string to a given filename
  - If a second argument string is passed, it will build that string to the filename

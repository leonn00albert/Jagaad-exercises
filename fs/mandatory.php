<?php
require_once("write_file.php");
require_once("read_file.php");
require_once("read_multiline.php");
//1 create new file or append to appends to existing file.  if no extension is given .txt is used
print " -------==  1 ==-------- \n";
write_file();


//2 read file input needs to be filename + ext (example.txt)
print " -------==  2 ==-------- \n";
read_file();

//3  create new file or append to appends to existing file with multiple linse
//.  if no extension is given .txt is used

print " -------==  3 ==-------- \n";
write_file(content:read_multiline());
<?php
require_once("scan_dir.php");
require_once("write_file.php");
require_once("destroy_dir.php");

// USE --NODELETE as second argument to keep files;


$path_to_dir = readline("Enter directory path:");
print("Scanning directory $path_to_dir for .txt files... \n");

mkdir($path_to_dir. "/backup");

//scan and backup files, second argument can be other file extension default is txt
$report = scan_dir($path_to_dir);

//create report
print "Creating backup report $path_to_dir/backup/backup_report.txt... \n";
foreach($report as $entry) {
    $entry = array(implode("  -  ", $entry));
    write_file($path_to_dir . "/backup/backup_report.txt",$entry,False);
}

//delete backup folder
if(isset($argv[1]) && $argv[1] === "--NODELETE") {
    print "Keeping backup directory... \n ";

} else {
    print "Deleting backup directory... \n";
    destroy_dir($path_to_dir . '/backup');
}
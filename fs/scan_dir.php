<?php
function scan_dir(string $dir , string $ext = "txt"):array {
    $report = [[
        "Original filename and path",
        "Backup filename and path",
        "Date and time of backup"
    ]]; 
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                if (is_dir($dir . "/" . $entry)) {
                    scan_dir($dir . "/" . $entry);
                } else {
                    if (pathinfo($entry, PATHINFO_EXTENSION) == $ext) {
                        $new_file_name =  $dir . "/backup/" . pathinfo($entry, PATHINFO_FILENAME ) . date("Y-m-d-h-m-s") . "." . pathinfo($entry, PATHINFO_EXTENSION);
                        if (copy($dir . "/" . $entry, $new_file_name))  {
                           array_push($report, [
                            $dir . "/" . $entry,
                            $new_file_name,
                            date("Y-m-d-h-m-s")
                           ]);
                           echo "Backing up  $dir / $entry  \n";
                           echo "File backed up successfully! Backup filename: $new_file_name \n";
                        } else {    
                            echo "File copy failed. \n";
                        }
                    }
                }
            }
        }
        closedir($handle);
        return $report;
    }
}
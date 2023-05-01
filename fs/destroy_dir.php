<?php

function destroy_dir($dir) {
    $handle = opendir($dir);

    while (($entry = readdir($handle)) !== false) {
        if ($entry != "." && $entry != "..") {
            $entry_path = $dir . "/" . $entry;
            if (is_dir($entry_path)) {
                remove_directory($entry_path);
            } else {
                unlink($entry_path);
            }
        }
    }

    closedir($handle);
    rmdir($dir);

    print "Backup directory deleted successfully!";
}
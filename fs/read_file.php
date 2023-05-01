<?php
function read_file():bool {
    $name = readline("Input the file name to be opened: " );
    $file = fopen($name, "r");    
    if($file === False) {
        print "Error: Unable to open file! \n";
        return False;
    }
    while(! feof($file)) {
        $line = fgets($file);
        echo $line. "\n";
      }
      
    fclose($file);
    return True;
}

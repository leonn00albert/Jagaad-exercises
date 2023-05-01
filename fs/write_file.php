<?php

function write_file($name = False, $content = False, $output = True) :bool {
    if($name === False) {
        $name = readline("Filename (default .txt): ");
    }
    if($content === False) {
        $content = array(readline("Input a sentence for the file: ")); 
    }

    if (!strpos($name, '.')) {
        $name =  $name . ".txt";
    } 

    $file = fopen($name, "a");    
    if($file === False) {
        print "Error: Unable to open file! \n";
        return False;
    }
    foreach ($content as $line) {
        fwrite($file, $line . "\n");
    }
    if($output === True) {
        print "The file $name created successfully! \n";
    }

    fclose($file);
    return True;
}

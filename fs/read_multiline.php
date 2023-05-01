<?php 
function read_multiline(string $text = "Input the number of lines to be written: "):array {
    $n = readline($text);
    $arr = [];
    if(! is_numeric($n)) {
        print "Error: please provide numeric value \n";
        return $arr;
    }

    print ":: The lines are :: \n";
   
    for ($i = 0; $i < $n; $i++) {
        array_push($arr, readline());
    }
    return $arr;
}




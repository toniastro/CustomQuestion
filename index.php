<?php

if(empty($argv[1])){
    echo "Specify input file to read \n";
    die();
}

function read_file($file){
    if(file_exists($file)){
        $myfile = file_get_contents($file);
        $dline_replace= str_replace( "\n\n", "|", $myfile);
        $sline_replace = str_replace( "\n", " ", $dline_replace);
        $final = explode("|", $sline_replace);
        return  $final;
    }else{
        echo "No such file or directory. \n";
        die();
    }
}

function check_replacement($string){
    $string = str_replace( " ", "", $string);
    return count_chars($string,3);
}

$file = read_file($argv[1]);
$total = 0;
foreach($file as $answer){
    $total+= strlen(check_replacement($answer));
}

echo $total."\n";
?>
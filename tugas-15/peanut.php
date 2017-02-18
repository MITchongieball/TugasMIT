<?php
$huruf = "PeanutButter";

for ($i=0; $i < strlen($huruf); $i++) { 
    for ($j = 0; $j <= $i; $j++) {
        echo $huruf[$i]." ";
        //echo "\n";
        sleep(1);
    }
    echo "\n";
}
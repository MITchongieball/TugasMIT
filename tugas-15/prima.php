<?php
    for ($i=1;$i<50;$i++) {
       $c=0;
       for ($j=1;$j<=$i;$j++) {
          if (($i%$j) == 0) {
             $c=$c+1;
          }
       }
       if ($c==2) {
          echo $i."\n"; 
          sleep(1);
       }
    }
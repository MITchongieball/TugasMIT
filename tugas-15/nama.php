<?php
//huruf I
for ($ix = 0; $ix < 7; $ix++) {
    for ($iy = 0; $iy <= 5; $iy++)  {
  	    switch ($ix) {
  		      case ($ix == 0):
  			        echo "*";
  			        break;
  		      case ($ix == 6):
  			        echo "*";
  			        break;
  		      case ($iy == 1):
  			        for ($iz = 0; $iz < 2; $iz++) { 
				            echo " ";
  			        }
  			        for ($ia = 0; $ia < 2; $ia++) { 
  				          echo "*";
  			        }
  			        break;
  		      default:
  			        # code...
  			        break;
  	}
  }
    echo "\n";
}
echo "\n";

//huruf K
for ($kx = 3; $kx > 0; $kx--) {
    echo "*";
    echo str_repeat(" ", $kx);
    echo "*";
    echo "\n";
}
for ($ky = 0; $ky < 4; $ky++) {
    echo "*";
    echo str_repeat(" ", $ky);
    echo "*";
    echo "\n";
}
echo "\n";

// huruf b
for ($bx = 0; $bx < 4; $bx++){
    echo "*";
    echo "\n";
}
for ($by = 0; $by < 3; $by++) {
    for ($bz = 0; $bz < 6; $bz++) {
        switch ($by) {
            case ($by == 0):
                echo "*";
                break;
            case ($by == 2):
                echo "*";
                break;
            case ($bz < 2):
                for ($ba = 0; $ba <1; $ba ++) { 
                    echo "*    ";
                for ($bb = 0; $bb < 2; $bb++) { 
                    echo "";
                }
                }
            default:
                echo "";
                break;
    }
  }
    echo "\n";
}
echo "\n";

//huruf A
for ($ax = 0; $ax < 7; $ax++) {
    for ($ay = 0; $ay <= 5; $ay++) {
        switch ($ax) {
            case ($ax == 0):
                echo "*";
                break;
            case ($ax == 3):
                echo "*";
                break;
            case ($ay < 1):
                for ($az = 0; $az < 2; $az++) {
                    echo "*    ";
                }
                break;
            default:
                echo "";
                break;
        }
    }
    echo "\n";
}
echo "\n";

//huruf L
for ($lx = 0; $lx < 7; $lx++) {
    for ($ly = 0; $ly <= 6; $ly++) {
        if ($lx == 6) {
            echo "*";
        } elseif ($ly < 1) {
            echo "*";
        }
    }
    echo "\n";
}
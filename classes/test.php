<?php

$a = "7708138928";

if(substr($a, 0,2) == "07"){ $a = "+964".substr($a, 1);}
elseif(substr($a, 0,1) == "7"){$a = "+964".$a;};



?>
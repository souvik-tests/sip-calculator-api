<?php
    if($_GET){
        $val1 = $_GET['val1'];
        $val2 = $_GET['val2'];
        $val3 = $_GET['val3'];
        
        echo $val1 . $val2 . $val3;
    }
    else {
        echo "no";
    }
?>
<?php
    if($_GET){
        $interest = $_GET['interest'];
        $return = $_GET['return'];
        $year = $_GET['year'];
        
        
        
        // calculations starts - SIP
        // storing values
        $p = $interest;
        $yr = $year;
        $n = $yr * 12;
        $r = $return;
        $i = $r / 100 / 12;
        
        // let's calculate
        $abc = $i + 1;
        $bcd = pow($abc, $n);
        $cde = $bcd - 1;
        $def = $abc / $i;
        $efg = $p * $cde;
        
        // the result
        $fv = $efg * $def;
        $inv = $p * $n;
        $rtn = $fv - $inv;
        
        // round the values
        $fvFx = round($fv);
        $invFx = round($inv);
        $rtnFx = round($rtn);
        
        // number format
        $fvFinal = number_format($fvFx);
        $invFinal = number_format($invFx);
        $rtnFinal = number_format($rtnFx);
        
        // storing result in array
        $final_result = array("Total value"=>$fvFinal, "Invested amount"=>$invFinal, "Est. returns"=>$rtnFinal);
        
        // printing as JSON
        echo json_encode($final_result);
        
    }
    else {
        echo "no";
    }
?>
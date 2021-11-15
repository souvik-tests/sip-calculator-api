<?php
    error_reporting(0);
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf-8');
    if($_GET){
        $invest = $_GET['invest'];
        $return = $_GET['return'];
        $year = $_GET['year'];
        
        if($invest == ""){
            $msg = array("status"=>"failed", "message"=>"no 'invest' value found");
            echo json_encode($msg);
        }
        elseif($return == "") {
            $msg = array("status"=>"failed", "message"=>"no 'return' value found");
            echo json_encode($msg);
        }
        elseif($year == "") {
            $msg = array("status"=>"failed", "message"=>"no 'year' value found");
            echo json_encode($msg);
        }
        else {
            // calculations starts - SIP
            // storing values
            $p = $invest;
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

            // int format
            $fvFinal = (int)$fvFx;
            $invFinal = (int)$invFx;
            $rtnFinal = (int)$rtnFx;

            // storing result in array
            $final_result = array("status"=>"success", "Total value"=>$fvFinal, "Invested amount"=>$invFinal, "Est. returns"=>$rtnFinal, "message"=>"value calculated sucessfully");

            // printing as JSON
            echo json_encode($final_result, JSON_PRETTY_PRINT);
        }
        
        
    }
    else {
        $msg = array("status"=>"failed", "message"=>"no inputs found");
        echo json_encode($msg);
    }
?>
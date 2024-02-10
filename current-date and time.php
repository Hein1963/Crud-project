<?php 
    /*
    //Unix time stamp
    date_default_timezone_set('Asia/Rangoon');
    $array = getDate();
    echo "<pre>".print_r($array,true)."</pre>";
    echo $array['hours'];
    echo "<br>";
    echo time();
    */
    ##date_function date();
    date_default_timezone_set('Asia/Rangoon');
    date_default_timezone_set('Asia/Rangoon');
    $currentDate = new DateTime();
    echo $currentDate ->format('Y-m-d h:i:s');
    echo $currentDate ->getTimestamp();
?>
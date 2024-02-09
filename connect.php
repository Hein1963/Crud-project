<?php
    $server = 'localhost';
    $name = 'root';
    $pass = '';
    $dbname = "crud-project";
    $db = mysqli_connect($server,$name,$pass,$dbname);
    if($db == false) {
        die('Some Error: '. mysqli_connect_error($db));
    }
    
?>
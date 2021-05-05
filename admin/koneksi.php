<?php

    $kon = mysqli_connect('localhost', 'root', '', 'ecommerce');

    if(!$kon){
        echo "error".mysqli_error();
        // exit();
    }
    
    function tampil($view){
        global $kon;
        $result = mysqli_query($kon, $view);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    } 
?>
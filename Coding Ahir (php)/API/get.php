<?php

    include"Api.php";

    $sql = "select * from db_cekulah";
    $query = mysqli_connect( $con, $sql);
    
    while($data = mysqli_fetch_assoc $query)

    $item[] =array()
    'nis' = $data['nis'],
    'username' = $data['username';

    $response

?>
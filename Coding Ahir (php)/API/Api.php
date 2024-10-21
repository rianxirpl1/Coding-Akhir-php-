<?php

$con = mysqli_connect("localhost",
                        "root",
                        "",
                        "db_cekulah");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
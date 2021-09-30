<?php
    require_once 'conn.php';
    require_once 'statements.php';


    if (isset($conn)) {
        mysqli_close($conn);
    }
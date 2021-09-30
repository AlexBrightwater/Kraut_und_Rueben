<?php
    require_once 'conn.php';
    require_once 'functions.php';

    AllRecepiesOfCatogory($conn,"Vegetarisch");

    mysqli_close($conn);

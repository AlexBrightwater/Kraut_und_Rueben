<?php
    require_once 'conn.php';
    require_once 'functions.php';

    PrintRows(AllRecepiesOfCatogory($conn,"Vegan"));

    mysqli_close($conn);

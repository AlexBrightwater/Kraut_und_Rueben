<?php

    function AllRecepiesOfCatogory($conn, $catogory){
        $sql = "SELECT REZEPT, ERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIE FROM REZEPT
                INNER JOIN REZEPTERNÄHRUNGSKATEGORIE ON REZEPT.REZEPTNR = REZEPTERNÄHRUNGSKATEGORIE.REZEPTNR
                INNER JOIN ERNÄHRUNGSKATEGORIE ON REZEPTERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIENR = ERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIENR
                WHERE ERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIE = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Some thing went wrong SQL: {$sql}  Statement: {$stmt}";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $catogory);

        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        echo "<h2> Get all Recepies of Catogory: {$catogory} </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Rezept: " . $row["REZEPT"] . "<br>";
        }
    }
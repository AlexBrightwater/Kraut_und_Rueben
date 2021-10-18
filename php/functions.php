<?php

    function prepareStmt($conn, $sql)
    {
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Some thing went wrong SQL: {$sql}  Statement: {$stmt}";
            exit();
        }
        return $stmt;
    }

    function executeStmt($stmt)
    {
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }

    function AllRecipesOfCategory($conn, $category){
        $sql = "SELECT REZEPT, ERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIE FROM REZEPT
                INNER JOIN REZEPTERNÄHRUNGSKATEGORIE ON REZEPT.REZEPTNR = REZEPTERNÄHRUNGSKATEGORIE.REZEPTNR
                INNER JOIN ERNÄHRUNGSKATEGORIE ON REZEPTERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIENR = ERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIENR
                WHERE ERNÄHRUNGSKATEGORIE.ERNÄHRUNGSKATEGORIE = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $category);
        $resultData = executeStmt($stmt);

        echo "<h2> Get all Recepies of Catogory: {$category} </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Rezept: " . $row["REZEPT"] . "<br>";
        }
    }


    function AllIngredientsOfRecipe($conn, $recipe){
        $sql = "SELECT REZEPT, ZUTAT.BEZEICHNUNG FROM REZEPT
                INNER JOIN REZEPTZUTAT ON REZEPT.REZEPTNR = REZEPTZUTAT.REZEPTNR
                INNER JOIN ZUTAT ON REZEPTZUTAT.ZUTATENNR = ZUTAT.ZUTATENNR
                WHERE REZEPT.REZEPT = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $recipe);
        $resultData = executeStmt($stmt);

        echo "<h2> Alle Zutaten des Rezepts: <i>{$recipe}</i> </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Zutat: " . $row["BEZEICHNUNG"] . "<br>";
        }
    }

    function AllRecipesWithIngredient($conn, $ingredient){
        $sql = "SELECT BEZEICHNUNG AS ZUTAT, REZEPT.REZEPT FROM ZUTAT
                INNER JOIN REZEPTZUTAT ON REZEPTZUTAT.ZUTATENNR = ZUTAT.ZUTATENNR
                INNER JOIN REZEPT ON REZEPT.REZEPTNR = REZEPTZUTAT.REZEPTNR
                WHERE ZUTAT.BEZEICHNUNG = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $ingredient);
        $resultData = executeStmt($stmt);

        echo "<h2> Alle Rezepte, die <i>{$ingredient}</i> enthalten </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Rezept: " . $row["REZEPT"] . "<br>";
        }
    }
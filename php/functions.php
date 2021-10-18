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
        $sql = "SELECT rezept_name, ernährungskategorie.kategorie_name FROM rezept
                INNER JOIN rezepternährungskategorie ON rezept.rezept_id = rezepternährungskategorie.rezept_id
                INNER JOIN ernährungskategorie ON rezepternährungskategorie.kategorie_id = ernährungskategorie.kategorie_id
                WHERE ernährungskategorie.kategorie_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $category);
        $resultData = executeStmt($stmt);

        echo "<h2> Alle der Rezepte der Kategorie: <i>{$category}</i> </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Rezept: " . $row["rezept_name"] . "<br>";
        }
    }


    function AllIngredientsOfRecipe($conn, $recipe){
        $sql = "SELECT rezept_name, zutat.zutat_name FROM rezept
                INNER JOIN rezeptzutat ON rezept.rezept_id = rezeptzutat.rezept_id
                INNER JOIN zutat ON rezeptzutat.zutat_id = zutat.zutat_id
                WHERE rezept.rezept_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $recipe);
        $resultData = executeStmt($stmt);

        echo "<h2> Alle Zutaten des Rezepts: <i>{$recipe}</i> </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Zutat: " . $row["zutat_name"] . "<br>";
        }
    }

    function AllRecipesWithIngredient($conn, $ingredient){
        $sql = "SELECT zutat_name AS zutat, rezept.rezept_name FROM zutat
                INNER JOIN rezeptzutat ON rezeptzutat.zutat_id = zutat.zutat_id
                INNER JOIN rezept ON rezept.rezept_id = rezeptzutat.rezept_id
                WHERE zutat.zutat_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $ingredient);
        $resultData = executeStmt($stmt);

        echo "<h2> Alle Rezepte, die <i>{$ingredient}</i> enthalten </h2> <br>";

        while($row = mysqli_fetch_assoc($resultData)) {
            echo "Rezept: " . $row["rezept_name"] . "<br>";
        }
    }
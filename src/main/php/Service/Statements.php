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
        if(mysqli_stmt_execute($stmt)){
            return mysqli_stmt_get_result($stmt);
        }
        return null;
    }

    function Recipes($conn){
        $sql = "SELECT * FROM rezept;";
        $stmt = prepareStmt($conn, $sql);
        return executeStmt($stmt);
    }

    function Ingredients($conn){
        $sql = "SELECT * FROM zutat;";
        $stmt = prepareStmt($conn, $sql);
        return executeStmt($stmt);
    }

    ### REQUIRED FUNCTIONS ###

    function RecipesOfCategory($conn, $category){
        $sql = "SELECT rezept_name, ernährungskategorie.kategorie_name FROM rezept
                INNER JOIN rezepternährungskategorie ON rezept.rezept_id = rezepternährungskategorie.rezept_id
                INNER JOIN ernährungskategorie ON rezepternährungskategorie.kategorie_id = ernährungskategorie.kategorie_id
                WHERE ernährungskategorie.kategorie_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $category);
        return executeStmt($stmt);
    }

    function IngredientsOfRecipe($conn, $recipe){
        $sql = "SELECT rezept_name, zutat.zutat_name FROM rezept
                INNER JOIN rezeptzutat ON rezept.rezept_id = rezeptzutat.rezept_id
                INNER JOIN zutat ON rezeptzutat.zutat_id = zutat.zutat_id
                WHERE rezept.rezept_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $recipe);
        return executeStmt($stmt);
    }

    function RecipesWithIngredient($conn, $ingredient){
        $sql = "SELECT zutat_name AS zutat, rezept.rezept_name FROM zutat
                INNER JOIN rezeptzutat ON rezeptzutat.zutat_id = zutat.zutat_id
                INNER JOIN rezept ON rezept.rezept_id = rezeptzutat.rezept_id
                WHERE zutat.zutat_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $ingredient);
        return executeStmt($stmt);
    }

    function RecipesWithLessThan5Ingredients($conn){
        $sql = "SELECT rezept.* FROM rezeptzutat
                INNER JOIN rezept ON rezeptzutat.rezept_id = rezept.rezept_id
                HAVING COUNT(*) < 5";
        $stmt = prepareStmt($conn, $sql);
        return executeStmt($stmt);
    }

    function IngredientsNotInRecipe($conn){
        $sql = "SELECT zutat.* FROM zutat
                WHERE NOT EXISTS (
                SELECT zutat_id FROM rezeptzutat
                WHERE rezeptzutat.zutat_id = zutat.zutat_id)";
        $stmt = prepareStmt($conn, $sql);
        return executeStmt($stmt);
    }


<?php

    function prepareStmt($conn, $sql)
    {
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Something went wrong SQL: {$sql}  Statement: {$stmt}";
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
        $sql = "SELECT zutat_name, rezept.rezept_name FROM zutat
                INNER JOIN rezeptzutat ON rezeptzutat.zutat_id = zutat.zutat_id
                INNER JOIN rezept ON rezept.rezept_id = rezeptzutat.rezept_id
                WHERE zutat.zutat_name = ?;";

        $stmt = prepareStmt($conn,$sql);
        mysqli_stmt_bind_param($stmt, "s", $ingredient);
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

	function AverageNutritionInOrder($conn, $order){
		$sql = "SELECT bestellungzutat.bestellung_id, SUM(bestellungzutat.menge*zutat.kalorien)/SUM(bestellungzutat.menge), SUM(bestellungzutat.menge*zutat.kohlenhydrate)/SUM(bestellungzutat.menge), SUM(bestellungzutat.menge*zutat.protein)/SUM(bestellungzutat.menge) FROM zutat
				INNER JOIN bestellungzutat ON zutat.zutat_id = bestellungzutat.zutat_id
				WHERE bestellungzutat.bestellung_id = ?;";
		$stmt = prepareStmt($conn, $sql);
		mysqli_stmt_bind_param($stmt, "i", $order);
		return executeStmt($stmt);
	}

	function CaloriesBelowValue($conn, $calories){
		$sql = "SELECT rezept.rezept_name, SUM(zutat.kalorien) FROM zutat
                INNER JOIN rezeptzutat ON zutat.zutat_id = rezeptzutat.zutat_id
                INNER JOIN rezept ON rezept.rezept_id = rezeptzutat.rezept_id
                GROUP BY rezeptzutat.rezept_id
                HAVING SUM(zutat.kalorien) < ?;";
		$stmt = prepareStmt($conn, $sql);
		mysqli_stmt_bind_param($stmt, "i", $calories);
		return executeStmt($stmt);
	}

    function RecipesWithLessThan5Ingredients($conn){
        $sql = "SELECT rezept.rezept_name, COUNT(rezeptzutat.rezept_id) FROM rezeptzutat
                INNER JOIN rezept ON rezept.rezept_id = rezeptzutat.rezept_id
                GROUP BY rezeptzutat.rezept_id
                HAVING COUNT(rezeptzutat.rezept_id) < 5;";
        $stmt = prepareStmt($conn, $sql);
        return executeStmt($stmt);
    }

    function RecipesWithLessThan5IngredientsAndNutritionCategory($conn, $category){
        $sql = "SELECT rezept_name, ernährungskategorie.kategorie_name, COUNT(rezeptzutat.rezept_id) FROM rezept
                INNER JOIN rezepternährungskategorie ON rezept.rezept_id = rezepternährungskategorie.rezept_id
                INNER JOIN ernährungskategorie ON rezepternährungskategorie.kategorie_id = ernährungskategorie.kategorie_id
                RIGHT JOIN rezeptzutat ON rezept.rezept_id = rezeptzutat.rezept_id
                WHERE ernährungskategorie.kategorie_name = ?
                GROUP BY rezeptzutat.rezept_id
                HAVING COUNT(rezeptzutat.rezept_id) < 5;";
        $stmt = prepareStmt($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $category);
        return executeStmt($stmt);
    }

    	### ADDITIONAL FUNCTIONS ###

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
    function Categories($conn){
        $sql = "SELECT * FROM ernährungskategorie";
       $stmt = prepareStmt($conn,$sql);
       return executeStmt($stmt);
    }

    function restrictions($conn){
        $sql = "SELECT * FROM beschränkung;";
        $stmt = prepareStmt($conn,$sql);
        return executeStmt($stmt);
    }

	function RecipesOfRestrictions($conn, $restriction){
		$sql =  "SELECT rezept_name, beschränkung.beschränkung_name FROM rezept
				INNER JOIN rezeptbeschränkung ON rezept.rezept_id = rezeptbeschränkung.rezept_id
				INNER JOIN beschränkung ON rezeptbeschränkung.beschränkung_id = beschränkung.beschränkung_id
				WHERE beschränkung.beschränkung_name = ?;";

		$stmt = prepareStmt($conn,$sql);
		mysqli_stmt_bind_param($stmt, "s", $restriction);
		return executeStmt($stmt);
	}

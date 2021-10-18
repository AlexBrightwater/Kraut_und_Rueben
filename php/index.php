<?php
    require_once 'conn.php';
    require_once 'functions.php';

    echo "<h1>Kraut und Rüben</h1>";


    AllRecipesOfCategory($conn,"Vegetarisch");
    AllIngredientsOfRecipe($conn,"Caesersalat");
    AllRecipesWithIngredient($conn, "Zucchini");


    mysqli_close($conn);

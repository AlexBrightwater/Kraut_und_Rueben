<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kraut und Rueben</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>



    <?php
    require_once 'conn.php';
    require_once 'functions.php';

    echo "<h1>Kraut und Rüben</h1>";

    $foo = 2;

    if ($foo == 1) {
        AllRecipesOfCategory($conn, "Vegetarisch");
    } else {
        AllIngredientsOfRecipe($conn, "Caesersalat");
    }

    /*AllRecipesWithIngredient($conn, "Zucchini");
    */


    mysqli_close($conn);
    ?>
</body>

</html>
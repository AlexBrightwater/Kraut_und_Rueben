<?php
/*ini_set('display_error', 1);  
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
require_once '../../Service/DatabaseConnection.php';
require_once '../../Service/Statements.php';

include_once '../../header.php';
?>

<script src="/Kraut_und_Rueben/www/js/app.js"></script>
<main>
    <h1>Durchsuche unsere Datenbanken!</h1>
    <!-- Rezepte mit der Ernährungskategorie -->
    <form>
        <label for="R_Cat">Rezepte mit der Ernährungskategorie:</label>
        <input class="index" list="R_Cat" type="text" name="R_Cat" />
        <datalist id="R_Cat">
            <?php
            $categories = Categories($conn);
            while ($row = mysqli_fetch_assoc($categories)) {
                $category = $row['kategorie_name'];
                echo "<option value='$category'>$category</option>";
            }
            ?>
        </datalist>
        <a href="#here"><button class="get" type="submit">Get</button></a>
        <br />
    </form>
    <br />

    <!-- Zutaten von Rezept -->
    <form class="IngredientsOfRecipe" method="GET">
        <label for="I_Recepie">Zutaten von Rezept</label>
        <input class="index" list="I_Recepie" type="text" name="I_Recepie">
        <datalist id="I_Recepie">
            <?php
            $recipes = Recipes($conn);
            while ($row = mysqli_fetch_assoc($recipes)) {
                $recipe = $row['rezept_name'];
                echo "<option value='$recipe'></option>";
            }
            ?>
        </datalist>
        <a href="#here"><button class="get" type="submit">Get</button></a>
        <br />
    </form>
    <br />

    <!-- Zutaten, die nicht in Rezepten enthalten sind -->
    <form class="IngredientsNotInRecipe" method="GET">
        <label for="N_Recepie">Zutaten, die nicht in Rezepten enthalten sind</label>
        <a href="#here"><input class="get" name="N_Recepie" type="submit" value="Get"></a>
        <br />
    </form>
    <br />

    <!-- Durchschnittler Nährwert pro Bestellung -->
    <form>
        <label for="N_OrderID">Durchschnittler Nährwert pro Bestellung</label>
        <input class="index" list="N_OrderID" type="text" name="N_OrderID" />
        <datalist id="N_OrderID">
            <?php
            $categories = Orders($conn);
            while ($row = mysqli_fetch_assoc($categories)) {
                $category = $row['bestellung_id'];
                echo "<option value='$category'>";
            }
            ?>
        </datalist>
        <a href="#here"><button class="get" type="submit">Get</button></a>
        <br />
    </form>
    <br />

    <!-- Rezepte, unter Kalorienwert -->
    <form class="CaloriesBelowValue" method="GET">
        <label for="C_Value">Rezepte, unter Kalorienwert:</label>
        <input class="index" type="number" name="C_Value">
        <a href="#here"><button class="get" type="submit">Get</button></a>
        <br />
    </form>
    <br />

    <!-- Rezepte, die weniger als 5 Zutaten enthalten -->
    <form class="IngredientsNotInRecipe" method="GET">
        <label for="R_LessThan5">Rezepte, die weniger als 5 Zutaten enthalten</label>
        <a href="#here"><input class="get" name="R_LessThan5" type="submit" value="Get"></a>
        <br />
    </form>
    <br />

    <!-- Rezepte mit weniger 5 Zutaten und der Ernährungskategorie -->
    <form>
        <label for="5_Category">Rezepte mit weniger 5 Zutaten und der Ernährungskategorie:</label>
        <input class="index" list="5_Category" type="text" name="5_Category" />
        <datalist id="5_Category">
            <?php
            $categories = Categories($conn);
            while ($row = mysqli_fetch_assoc($categories)) {
                $categorie = $row['kategorie_name'];
                echo "<option value='$categorie'>";
            }
            ?>
        </datalist>
        <a href="#here"><button class="get" type="submit">Get</button></a>
        <br />
    </form>
    <br />

    <!-- Alle Rezepte -->
    <form class="Rezepte" method="GET">
        <label for="Recipes">Alle Rezepte</label>
        <a href="#here"><input class="get" name="Recipes" type="submit" value="Get"></a>
        <br />
    </form>
    <br />

    <!-- Alle Zutaten -->
    <form class="Zutaten" method="GET">
        <label for="Ingredients">Alle Zutaten</label>
        <a href="#here"><input class="get" name="Ingredients" type="submit" value="Get"></a>
        <br />
    </form>
    <br />

    <!-- Rezepte mit der Beschränkung -->
    <form>
        <label for="R_Res">Rezepte mit der Beschränkung:</label>
        <input class="index" list="R_Res" type="text" name="R_Res">
        <datalist id="R_Res">
            <?php
            $restrictions = Restrictions($conn);
            while ($row = mysqli_fetch_assoc($restrictions)) {
                $restriction = $row['beschränkung_name'];
                echo "<option value='$restriction'>";
            }
            ?>
        </datalist>
        <a href="#here"><button class="get" type="submit">Get</button></a>
    </form>

    <!-- Jump to output -->
    <script>
        const target = document.querySelectorAll('a[href^="#"]');
        for (const item of target) {
            item.onclick = function (e) {
                const hash = this.getAttribute("href");
                const elem = document.getElementById(hash.replace("#",""));
                history.pushState (null, null, hash);
                elem.scrollIntoView({ left: 0, block: 'start', behavior: 'smooth' });
                e.preventDefault();
            }
        }
    </script>

    <!-- Site Output -->
    <!-- Rezepte mit der Ernährungskategorie -->
    <div id="here"></div>
    <?php
    if (isset($_GET['R_Cat'])) {
        echo "<h3>" . $_GET['R_Cat'] . "</h3>";
        echo  "<table><tr><th>Rezept</th><th>Kategorie</th></tr>";
        $recipes = RecipesOfCategory($conn, $_GET['R_Cat']);
        while ($row = mysqli_fetch_assoc($recipes)) {
            echo "<tr><td>" . $row["rezept_name"] . "</td><td>" . $row["kategorie_name"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>

    <!--Zutaten von Rezept-->
    <?php
    if (isset($_GET['I_Recepie'])) {
        echo "<h3>" . $_GET['I_Recepie'] . "</h3>";
        echo  "<table><tr><th>Zutat</th></tr>";
        $ingredients = IngredientsOfRecipe($conn, $_GET['I_Recepie']);
        while ($row = mysqli_fetch_assoc($ingredients)) {
            echo "<tr><td>" . $row["zutat_name"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Zutaten, die nicht in Rezepten enthalten sind -->
    <?php
    if (isset($_GET['N_Recepie'])) {
        echo "<h3>Zutaten, die nicht in Rezepten enthalten sind</h3>";
        echo  "<table><tr><th>Zutat</th></tr>";
        $ingredients = IngredientsNotInRecipe($conn, $_GET['N_Recepie']);
        while ($row = mysqli_fetch_assoc($ingredients)) {
            echo "<tr><td>" . $row["zutat_name"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Durchschnittler Nährwert pro Bestellung -->
    <?php
    if (isset($_GET['N_OrderID'])) {
        echo "<h3>Nährwerte der Bestellung Nr. " . $_GET['N_OrderID'] . "</h3>";
        echo "<table>";
        echo "<tr><th>Durschnitt Kalorien pro 100g</th>";
        echo "<th>Durschnitt Kohlenhydrate pro 100g</th>";
        echo "<th>Durschnitt Proteine pro 100g</th></tr>";
        $averageNutritionInOrder = AverageNutritionInOrder($conn, $_GET['N_OrderID']);
        while ($row = mysqli_fetch_assoc($averageNutritionInOrder)) {
            echo "<tr> <td>" . $row["SUM(bestellungzutat.menge*zutat.kalorien)/SUM(bestellungzutat.menge)"] . " kcal</td> <td>" . $row["SUM(bestellungzutat.menge*zutat.kohlenhydrate)/SUM(bestellungzutat.menge)"] . "</td> <td>" . $row["SUM(bestellungzutat.menge*zutat.protein)/SUM(bestellungzutat.menge)"] . "</td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Durchschnittler Nährwert pro Bestellung -->
    <?php
    if (isset($_GET['N_OrderID'])) {
        echo "<h3>Nährwerte der Bestellung Nr. " . $_GET['N_OrderID'] . "</h3>";
        echo "<table>";
        echo "<tr><th>Durschnitt Kalorien pro 100g</th>";
        echo "<th>Durschnitt Kohlenhydrate pro 100g</th>";
        echo "<th>Durschnitt Proteine pro 100g</th></tr>";
        $averageNutritionInOrder = AverageNutritionInOrder($conn, $_GET['N_OrderID']);
        while ($row = mysqli_fetch_assoc($averageNutritionInOrder)) {
            echo "<tr> <td>" . $row["SUM(bestellungzutat.menge*zutat.kalorien)/SUM(bestellungzutat.menge)"] . " kcal</td> <td>" . $row["SUM(bestellungzutat.menge*zutat.kohlenhydrate)/SUM(bestellungzutat.menge)"] . "</td> <td>" . $row["SUM(bestellungzutat.menge*zutat.protein)/SUM(bestellungzutat.menge)"] . "</td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!--Rezepte, unter Kalorienwert-->
    <?php
    if (isset($_GET['C_Value'])) {
        echo "<h3> Weniger als " . $_GET['C_Value'] . " Kalorien </h3>";
        echo  "<table><tr><th>Rezepte</th><th>Kalorien</th></tr>";
        $calories = CaloriesBelowValue($conn, $_GET['C_Value']);
        while ($row = mysqli_fetch_assoc($calories)) {
            echo "<tr> <td>" . $row["rezept_name"] . "</td> <td>" . $row["SUM(zutat.kalorien)"] . "</td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!--Rezepte, die weniger als 5 Zutaten enthalten-->
    <?php
    if (isset($_GET['R_LessThan5'])) {
        echo "<h3>Rezepte, die weniger als 5 Zutaten enthalten</h3>";
        echo  "<table><tr><th>Rezepte</th></tr>";
        $recipesWithLessThan5Ingredients = RecipesWithLessThan5Ingredients($conn);
        while ($row = mysqli_fetch_assoc($recipesWithLessThan5Ingredients)) {
            echo "<tr> <td>" . $row["rezept_name"] . " </td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Rezepte mit weniger 5 Zutaten und der Ernährungskategorie: -->
    <?php
    if (isset($_GET['5_Category'])) {
        echo "<h3>Rezepte, die weniger als 5 Zutaten enthalten und " . $_GET['5_Category'] . " sind</h3>";
        echo "<table>";
        echo "<tr><th>Rezepte</th>";
        $recipesWithLessThan5IngredientsAndNutritionCategory = RecipesWithLessThan5IngredientsAndNutritionCategory($conn, $_GET['5_Category']);
        while ($row = mysqli_fetch_assoc($recipesWithLessThan5IngredientsAndNutritionCategory)) {
            echo "<tr> <td>" . $row["rezept_name"] . " </td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Alle Rezepte -->
    <?php
    if (isset($_GET['Recipes'])) {
        echo "<h3>Alle Rezepte</h3>";
        echo  "<table><tr><th>Rezepte</th></tr>";
        $recipes = Recipes($conn);
        while ($row = mysqli_fetch_assoc($recipes)) {
            echo "<tr> <td>" . $row["rezept_name"] . " </td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!--Alle Zutaten-->
    <?php
    if (isset($_GET['Ingredients'])) {
        echo "<h3>Alle Zutaten</h3>";
        echo  "<table><tr><th>Zutaten</th><th>Preis</th><th>Bestand</th></tr>";
        $ingredients = Ingredients($conn);
        while ($row = mysqli_fetch_assoc($ingredients)) {
            echo "<tr> <td>" . $row["zutat_name"] . "</td> <td>" . $row["nettopreis_ct"] / 100 . " €</td> <td>" . $row["bestand"] . " stk</td> </tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Rezepte mit der Beschränkung: -->
    <?php
    if (isset($_GET['R_Res'])) {
        echo "<h3>" . $_GET['R_Res'] . "</h3>";
        echo  "<table><tr><th>Rezept</th><th>Beschränkung</th></tr>";
        $recipesOfRestrictions = RecipesOfRestrictions($conn, $_GET['R_Res']);
        while ($row = mysqli_fetch_assoc($recipesOfRestrictions)) {
            echo "<tr><td>" . $row["rezept_name"] . "</td><td>" . $row["beschränkung_name"] . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</main>

<?php
mysqli_close($conn);
include_once '../../footer.php';
?>
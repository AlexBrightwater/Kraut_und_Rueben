<?php
ini_set('display_error', 1);  
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../../Service/DatabaseConnection.php';
    require_once '../../Service/Statements.php';

    include_once '../../header.php';
?>
    <main>

    <h1>Durchsuche unsere Datenbanen!</h1>
        <!--<h3>Zutaten</h3>
        <table>
            <tr>
                <th>Zutat</th>
                <th>Preis</th>
                <th>Bestand</th>
            </tr>
        </table>-->
        <form>
            <label for="R_Cat">Rezepte mit der Ernährungskategorie:</label>
            <input list="R_Cat" type="text" name="R_Cat" />
            <datalist id="R_Cat">
                <?php
                    $categories = Categories($conn);
                    while ($row = mysqli_fetch_assoc($categories)){
                        $category = $row['kategorie_name'];
                        echo "<option value='$category'>$category</option>";
                    }
                    ?>
                    </datalist>
            <button type="submit">Get</button>
            <br>

            <?php
                if($_GET['R_Cat']){
                    echo "<h3>". $_GET['R_Cat'] ."</h3>";
                    echo  "<table><tr><th>Rezept</th><th>Kategorie</th></tr>";
                    $recipes = RecipesOfCategory($conn, $_GET['R_Cat']);
                    while ($row = mysqli_fetch_assoc($recipes)){
                        echo "<tr><td>". $row["rezept_name"] ."</td><td>". $row["kategorie_name"] ."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>   

        <form class="IngredientsOfRecipe" method="GET">
            <label for="I_Recepie">Zutaten von Rezept</label>
            <input list="I_Recepie" type="text" name="I_Recepie">
            <datalist id="I_Recepie">
                <?php
                $recipes = Recipes($conn);
                while ($row = mysqli_fetch_assoc($recipes)){
                    $recipe = $row['rezept_name'];
                    echo "<option value='$recipe'></option>";
                }
                ?>
            </datalist>
            <button type="submit">Get</button>
            <br/>

            <?php
                if($_GET['I_Recepie']){
                    echo "<h3>". $_GET['I_Recepie'] ."</h3>";
                    echo  "<table><tr><th>Zutat</th></tr>";
                    $ingredients = IngredientsOfRecipe($conn, $_GET['I_Recepie']);
                    while ($row = mysqli_fetch_assoc($ingredients)){
                        echo "<tr><td>". $row["zutat_name"] ."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>
    </main> 



<?php
    mysqli_close($conn);
    include_once '../../footer.php';
?>

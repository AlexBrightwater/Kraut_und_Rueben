<?php
/*ini_set('display_error', 1);  
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
    require_once '../../Service/DatabaseConnection.php';
    require_once '../../Service/Statements.php';
    
    include_once '../../header.php';
?>
    <main>

    <h1>Durchsuche unsere Datenbanken!</h1>
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
            <input class="index" list="R_Cat" type="text" name="R_Cat" />
            <datalist id="R_Cat">
                <?php
                    $categories = Categories($conn);
                    while ($row = mysqli_fetch_assoc($categories)){
                        $category = $row['kategorie_name'];
                        echo "<option value='$category'>$category</option>";
                    }
                ?>
            </datalist>
            <button class="get" type="submit">Get</button>
            <br />
            <?php
                if(isset($_GET['R_Cat'])){
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
        
        <br />

        <form class="IngredientsOfRecipe" method="GET">
            <label for="I_Recepie">Zutaten von Rezept</label>
            <input class="index" list="I_Recepie" type="text" name="I_Recepie">
            <datalist id="I_Recepie">
                <?php
                $recipes = Recipes($conn);
                while ($row = mysqli_fetch_assoc($recipes)){
                    $recipe = $row['rezept_name'];
                    echo "<option value='$recipe'></option>";
                }
                ?>
            </datalist>
            <button class="get" type="submit">Get</button>
            <br/>
            <?php
                if(isset($_GET['I_Recepie'])){
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

        <br />

        <form class="IngredientsNotInRecipe" method="GET">
            <label for="N_Recepie">Zutaten, die nicht in Rezepten enthalten sind</label>
            <input class="get" name="N_Recepie" type="submit" value="Get">
            <br />
            <?php
                if(isset($_GET['N_Recepie'])){
                    echo "<h3>Zutaten, die nicht in Rezepten enthalten sind</h3>";
                    echo  "<table><tr><th>Zutat</th></tr>";
                    $ingredients = IngredientsNotInRecipe($conn, $_GET['I_Recepie']);
                    while ($row = mysqli_fetch_assoc($ingredients)){
                        echo "<tr><td>". $row["zutat_name"] ."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>

        <br />

        <form>
            <label for="N_OrderID">Durchschnittler Nährwert pro Bestellung</label>
            <input class="index" list="N_OrderID" type="text" name="N_OrderID" />
            <datalist id="N_OrderID">
                <?php
                    $categories = Orders($conn);
                    while ($row = mysqli_fetch_assoc($categories)){
                        $category = $row['bestellung_id'];
                        echo "<option value='$category'>";
                    }
                ?>
            </datalist>
            <button class="get" type="submit">Get</button>
            <br />
            <?php 
                if(isset($_GET['N_OrderID'])){
                    echo "<h3>Nährwerte der Bestellung Nr. ". $_GET['N_OrderID'] ."</h3>";
                    echo "<table>";
                    echo "<tr><th>Durschnitt Kalorien pro 100g</th>";
                    echo "<th>Durschnitt Kohlenhydrate pro 100g</th>";
                    echo "<th>Durschnitt Proteine pro 100g</th></tr>";
                    $averageNutritionInOrder = AverageNutritionInOrder($conn, $_GET['N_OrderID']);
                    while ($row = mysqli_fetch_assoc($averageNutritionInOrder)){
                        echo "<tr> <td>". $row["SUM(bestellungzutat.menge*zutat.kalorien)/SUM(bestellungzutat.menge)"] ." kcal</td> <td>". $row["SUM(bestellungzutat.menge*zutat.kohlenhydrate)/SUM(bestellungzutat.menge)"] ."</td> <td>". $row["SUM(bestellungzutat.menge*zutat.protein)/SUM(bestellungzutat.menge)"] ."</td> </tr>";
                    }
                    echo "</table>";
                }
            ?>
            
        </form>

        <br />

        <form class="CaloriesBelowValue" method="GET">
            <label for="C_Value">Rezepte, unter Kalorienwert:</label>
            <input class="index" type="number" name="C_Value">
            <button class="get" type="submit">Get</button>
            <br />
            <?php
                if(isset($_GET['C_Value'])){
                    echo "<h3> Weniger als ". $_GET['C_Value'] ." Kalorien </h3>";
                    echo  "<table><tr><th>Rezepte</th><th>Kalorien</th></tr>";
                    $calories = CaloriesBelowValue($conn, $_GET['C_Value']);
                    while ($row = mysqli_fetch_assoc($calories)){
                        echo "<tr> <td>". $row["rezept_name"] ."</td> <td>". $row["SUM(zutat.kalorien)"] ."</td> </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>

        <br />

        <form class="IngredientsNotInRecipe" method="GET">
            <label for="R_LessThan5">Rezepte, die weniger als 5 Zutaten enthalten</label>
            <input class="index" name="R_LessThan5" type="submit" value="Get">
            <br/>
            <?php
                if(isset($_GET['R_LessThan5'])){
                    echo "<h3>Rezepte, die weniger als 5 Zutaten enthalten</h3>";
                    echo  "<table><tr><th>Rezepte</th></tr>";
                    $recipesWithLessThan5Ingredients = RecipesWithLessThan5Ingredients($conn);
                    while ($row = mysqli_fetch_assoc($recipesWithLessThan5Ingredients)){
                        echo "<tr> <td>". $row["rezept_name"] ." </td> </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>

        <br />
        
        <form>
            <label for="5_Category">Rezepte mit weniger 5 Zutaten und der Ernährungskategorie:</label>
            <input class="index" list="5_Category" type="text" name="5_Category" />
            <datalist id="5_Category">
                <?php
                    $categories = Categories($conn);
                    while ($row = mysqli_fetch_assoc($categories)){
                        $categorie = $row['kategorie_name'];
                        echo "<option value='$categorie'>";
                    }
                ?>
            </datalist>
            <button class="get" type="submit">Get</button>
            <br />
            <?php 
                if(isset($_GET['5_Category'])){
                    echo "<h3>Rezepte, die weniger als 5 Zutaten enthalten und ". $_GET['5_Category'] ." sind</h3>";
                    echo "<table>";
                    echo "<tr><th>Rezepte</th>";
                    $recipesWithLessThan5IngredientsAndNutritionCategory = RecipesWithLessThan5IngredientsAndNutritionCategory($conn, $_GET['5_Category']);
                    while ($row = mysqli_fetch_assoc($recipesWithLessThan5IngredientsAndNutritionCategory)){
                        echo "<tr> <td>". $row["rezept_name"] ." </td> </tr>";
                    }
                    echo "</table>";
                }
            ?>
            
        </form>         
        
        <br />

        <form class="Rezepte" method="GET">
            <label for="Recipes">Alle Rezepte</label>
            <input class="index" name="Recipes" type="submit" value="Get">
            <br/>
            <?php
                if(isset($_GET['Recipes'])){
                    echo "<h3>Alle Rezepte</h3>";
                    echo  "<table><tr><th>Rezepte</th></tr>";
                    $recipes = Recipes($conn);
                    while ($row = mysqli_fetch_assoc($recipes)){
                        echo "<tr> <td>". $row["rezept_name"] ." </td> </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>

        <br />

        <form class="Zutaten" method="GET">
            <label for="Ingredients">Alle Zutaten</label>
            <input class="index" name="Ingredients" type="submit" value="Get">
            <br/>
            <?php
                if(isset($_GET['Ingredients'])){
                    echo "<h3>Alle Zutaten</h3>";
                    echo  "<table><tr><th>Zutaten</th><th>Preis</th><th>Bestand</th></tr>";
                    $ingredients = Ingredients($conn);
                    while ($row = mysqli_fetch_assoc($ingredients)){
                        echo "<tr> <td>". $row["zutat_name"] ."</td> <td>". $row["nettopreis_ct"] / 100 ." €</td> <td>". $row["bestand"] ." stk</td> </tr>";
                    }
                    echo "</table>";
                }
            ?>
        </form>
        
        <br />

        <form>
            <label for="R_Res">Rezepte mit der Beschränkung:</label>
            <input class="index" list="R_Res" type="text" name="R_Res">
            <datalist id="R_Res">
                <?php
                    $restrictions = Restrictions($conn);
                    while ($row = mysqli_fetch_assoc($restrictions)){
                        $restriction = $row['beschränkung_name'];
                        echo "<option value='$restriction'>";
                    }
                ?>
            </datalist>
            <button href="#R_Res_scroll" class="get" type="submit">Get</button>
        </form>  
        
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt iste deleniti doloremque laudantium! Odio laboriosam ducimus, molestiae, reiciendis ipsam laudantium, molestias in eum quidem ab laborum quam repellendus unde placeat.
            Consequuntur dolores debitis animi voluptatum quas ipsam ullam adipisci, laboriosam, reiciendis aperiam quam totam voluptas id illo! Nulla explicabo libero beatae inventore at aspernatur, voluptas quod quos velit quaerat ex?
            Sequi, totam dignissimos dolore minus, fugiat porro praesentium laborum unde id, dolores dolorum voluptas deserunt. Velit aperiam earum fugit eligendi natus sunt ipsam perspiciatis. Ducimus qui nemo magnam rem laudantium?
            Repellat nam quaerat, nulla quibusdam odit nisi omnis iusto fugit ratione necessitatibus optio sequi. Laborum facilis molestias sit saepe nihil alias voluptatibus rem ducimus impedit repellat! Impedit fuga placeat sunt.
            Harum fuga nisi nemo sit et sequi maxime debitis laborum quisquam earum asperiores possimus rerum natus deserunt libero ut dicta illo, consequatur numquam voluptate! Sapiente rem quo libero dolor illo?
            Delectus quae officiis consequuntur saepe animi, itaque laboriosam qui repellendus placeat voluptatum modi reprehenderit, aliquid facere necessitatibus consequatur inventore alias. Cumque repellat voluptas dolore, quos facere hic ea impedit dolorum?
            Et recusandae ab quidem minus delectus voluptas blanditiis mollitia eveniet, earum facilis enim repellendus nam rerum iusto dicta voluptatibus quam esse omnis! Fugit a laborum quae, inventore ipsa ad cupiditate.
            Impedit soluta asperiores, aliquid cum officia odio magnam? Cupiditate debitis velit odit aspernatur. Dolore, omnis officia doloremque perspiciatis nisi eius, minima voluptate esse veniam consequatur cum vitae consequuntur architecto aut?
            Voluptatem illo cumque unde aut delectus at sed ducimus assumenda cupiditate reprehenderit praesentium perspiciatis maiores saepe animi, placeat exercitationem sit quis! Autem impedit numquam culpa ratione consequatur neque rem. Nobis!
            Quam voluptas sequi quisquam sed soluta consequatur numquam quaerat nihil odio magnam? Eaque, cumque qui deserunt, sint adipisci magni laudantium quas omnis inventore minus nulla totam neque numquam dolores eos!
            Nisi beatae fuga, cum, sunt officia quam qui facere nemo, doloremque dolor dignissimos sed libero assumenda blanditiis minus perspiciatis provident exercitationem. Sequi voluptas dicta molestias veniam ipsum et molestiae inventore?
            Asperiores, iure perferendis assumenda reprehenderit, repellat impedit cumque iste exercitationem soluta facilis laudantium sunt cupiditate, accusantium sequi ratione in temporibus quas obcaecati nostrum veritatis? Minus totam tenetur rem! Voluptatibus, dignissimos!
            Dignissimos tempore expedita illum quis deserunt velit consectetur magni? Autem quaerat, nihil, inventore rerum officiis doloribus quam, aliquid voluptate aut doloremque architecto vero. Ut voluptatem saepe ratione neque deserunt eveniet.
            Maiores ratione totam quos blanditiis eius. Provident sit id cupiditate officia possimus tenetur neque voluptas inventore alias itaque expedita nostrum dicta laudantium, illum consequuntur culpa aliquid. Magnam sequi dolor doloremque?
            Iste commodi hic, vitae illum culpa eius atque autem maiores odio? Consequatur expedita eius vitae. Harum quia sunt voluptas porro qui necessitatibus molestiae dolorum, voluptatum doloribus? Nemo mollitia quaerat molestiae!
            Perspiciatis possimus adipisci nihil provident sed dolor quo odio tempora suscipit, cum voluptatum blanditiis deleniti quam iusto animi eum doloribus illo tempore nisi nemo laboriosam libero. Omnis aliquam dolor maxime.
            Iure quia, facilis quisquam placeat, fugit quasi tempora quis repellat voluptate, incidunt pariatur soluta modi expedita fugiat numquam qui molestias sint libero eum maxime. Rerum at enim dolorem quia voluptas!
            Laborum blanditiis commodi mollitia tempore in, perferendis architecto officiis similique autem qui possimus magni expedita earum illum quasi! Numquam exercitationem ullam maiores dolor consequatur optio sit recusandae et necessitatibus nostrum?
            Aperiam aspernatur ducimus vel asperiores dolores atque eum voluptatibus laborum expedita, unde hic labore, iste sint laudantium est numquam? Distinctio dolore sed dignissimos cum modi beatae praesentium iste odio aliquid.
            Accusamus quae culpa maiores itaque eos ratione, commodi laudantium rerum quam nihil dicta beatae voluptatum nobis eaque nisi hic similique? Eius similique molestias minima veniam, tempora magni quod reiciendis omnis?
        </p>


        <!-- Rezepte mit der Beschränkung -->
        <br/>
            <?php
                if(isset($_GET['R_Res'])){
                    echo "<h3>". $_GET['R_Res'] ."</h3>";
                    echo  "<table><tr><th>Rezept</th><th>Beschränkung</th></tr>";
                    $recipesOfRestrictions = RecipesOfRestrictions($conn, $_GET['R_Res']);
                    while ($row = mysqli_fetch_assoc($recipesOfRestrictions)){
                        echo "<tr><td>". $row["rezept_name"] ."</td><td>". $row["beschränkung_name"] ."</td></tr>";
                    }
                    echo "</table>";
                }
            ?>
    </main> 



<?php
    mysqli_close($conn);
    include_once '../../footer.php';
?>

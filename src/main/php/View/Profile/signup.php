<?php
include_once '../../header.php';
?>
<main class="main-center">
    <section class="signup-form">
        <div class="signup-form-group">
            <h2>Sign Up</h2>
            <form class="form" action="../../Controller/SignupController.php" method="POST">

            <input class="signup-form-input" type="text" name="firstname" placeholder="Vorname">              
            <input class="signup-form-input" type="text" name="lastname" placeholder="Nachname">              
            <input class="signup-form-input" type="password" name="password" placeholder="Enter your password...">             
            <input class="signup-form-input" class="signup-form-input" type="password" name="password-repeat" placeholder="Repeat your password...">              
            <input class="signup-form-input" type="text" name="email" placeholder="E-Mail">              
            <input class="signup-form-input" type="date" name="birthdate" placeholder="Geburtsdatum">              
            <input class="signup-form-input" type="text" name="city" placeholder="Ort">             
            <input class="signup-form-input" ype="text" name="postalCode" placeholder="Plz">             
            <input class="signup-form-input" type="text" name="street" placeholder="Straße">             
            <input class="signup-form-input" type="text" name="houseNo" placeholder="Haus Nr.">              
            <input class="signup-form-input" type="text" name="phone" placeholder="Telefon">
            <br>
            <input name="ToS" type="checkbox" required>
            <label for="ToS">By clicking "Sign up", you agree to our terms of service and privacy policy.</label>
                <div class="signup-form-submit">
                    <button class="signup-submit-button" type="submit" name="submit">Sign Up</button>

                    <?php
                    if(isset($_GET["error"])){

                        switch ($_GET["error"]){
                            case "emptyinput":
                                echo "<p class='signup-submit-error'>Fill in all required fields!</p>";
                                break;
                            case "invalidEmail":
                                echo "<p class='signup-submit-error'>Enter a valid E-Mail address!</p>";
                                break;
                            case "nopasswordmatch":
                                echo "<p class='signup-submit-error'>The passwords don´t match!</p>";
                                break;
                            case "usernameistaken":
                                echo "<p class='signup-submit-error'>This username/E-Mail is already taken!</p>";
                                break;
                        }
                    }
                    ?>
                </div>

            </form>
            <span class="signup-form-hint">I already have an Account
                <a class="signup-form-switch" href="login.php">Log In</a>
            </span>
        </div>
    </section>
</main>

<?php 
include_once '../../footer.php';
?>
<?php
include_once '../../header.php';
?>

<nav>
    <div class="sign-logo">
        <a href="../Index/index.php"><img class="wrapper-item wrapper-logo wrapper-left" src="../../../../../www/img/logo.png" alt="logo"></a>
    </div>
</nav>

<section class="signup-form">
    <div class="signup-form-group">
        <h2>Sign Up</h2>
        <form action="../../Controller/SignupController.php" method="POST">

            <div class="signup-form-text">
                <label class="signup-form-heading" for="username">Username</label>
                <span class="signup-form-hint">I already have an Account
                            <a class="signup-form-switch" href="login.php">Log In</a>
                        </span>

            </div>
            <div>
                <input class="signup-form-input" type="text" name="username" placeholder="Enter your username...">
            </div>

            <div class="signup-form-text">
                <label class="signup-form-heading" for="Password">Password</label>
            </div>
            <div>
                <input class="signup-form-input" type="password" name="password" placeholder="Enter your password...">
            </div>

            <div class="signup-form-text">
                <label class="signup-form-heading" for="Repeat Password">Repeat Password</label>
            </div>
            <div>
                <input class="signup-form-input" type="password" name="password-repeat" placeholder="Repeat your password...">
            </div>

            <div class="signup-form-text">
                <label class="signup-form-heading" for="E-Mail">E-Mail</label>
                <span class="signup-form-hint">*Optional</span>
            </div>
            <div>
                <input class="signup-form-input" type="text" name="email" placeholder="E-Mail...">
            </div>

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

    </div>
</section>

<?php
include_once 'footer.php';
?>
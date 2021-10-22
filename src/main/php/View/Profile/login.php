<?php
include_once '../../header.php';
?>
<main class="unique-signin">
    <section class="signup-form">
        <div class="signup-form-group">
            <h2>Log In</h2>
            <form class="login-form" action="../../Controller/LoginController.php" method="POST">

                <div class="signup-form-text">
                    <label class="signup-form-heading" for="Email">E-Mail</label>
                </div>
                <div>
                    <input class="signup-form-input" type="text" name="email" placeholder="Enter your email...">
                </div>

                <div class="signup-form-text">
                    <label class="signup-form-heading" for="Password">Password</label>
                </div>
                <div>
                    <input class="signup-form-input" type="password" name="password" placeholder="Enter your password...">
                </div>

                <div class="signup-form-submit">
                    <button class="signup-submit-button" type="submit" name="submit">Log In</button>
                    <?php
                    if(isset($_GET["error"])){

                        switch ($_GET["error"]){
                            case "emptyinput":
                                echo "<p class='signup-submit-error'>Fill in all fields!</p>";
                                break;
                            case "invalidEmail":
                                echo "<p class='signup-submit-error'>Enter a valid E-Mail address!</p>";
                                break;
                            case "userdoesntexist":
                                echo "<p class='signup-submit-error'>The E-Mail doesn´t exist!</p>";
                                break;
                            case "wrongpassword":
                                echo "<p class='signup-submit-error'>The password is wrong!</p>";
                                break;
                        }
                    }
                    ?>
                </div>

            </form>
            <span class="signup-form-hint">I don't have an account
                 <a class="signup-form-switch" href="signup.php" >Sign Up</a>
            </span>
        </div>
    </section>
</main>
<?php
include_once '../../footer.php';
?>
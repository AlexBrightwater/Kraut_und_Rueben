<?php
include_once '../../header.php';
?>
<main class="main-center">
    <section class="login-form">
        <div class="login-form-group">
            <h2>Log In</h2>
            <form class="form" action="../../Controller/LoginController.php" method="POST">

                <div class="login-form-text">
                    <label class="login-form-heading" for="Email">E-Mail</label>
                </div>
                <div>
                    <input class="login-form-input" type="text" name="email" placeholder="Enter your email...">
                </div>

                <div class="login-form-text">
                    <label class="login-form-heading" for="Password">Password</label>
                </div>
                <div>
                    <input class="login-form-input" type="password" name="password" placeholder="Enter your password...">
                </div>

                <div class="login-form-submit">
                    <button class="login-submit-button" type="submit" name="submit">Log In</button>
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
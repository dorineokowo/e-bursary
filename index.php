<?php include('server.php') ;
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
?>
<!DOCTYPE html>


<html lang="en">
    <head>
    <meta name="viewport" content="width=device-git remote add origin https://github.com/dorineokowo/e-bursary.git
                <h3 class="formHeading">E-Bursary Login</h3>
                <img src="static/images/sirisia.png" class="masenoLogoImage">
            </div>

            <div class="formContent">
            <form method="POST" action="index.php">
            <?php include('errors.php'); ?>
                <label for="username" class="usernameLabel">Username:</label>
                <input name="username" type="text"  placeholder="Username" class="loginUsername" required><br>

                <label for="password" class="passwordLabel">Password:</label>
                <input name="password" type="password" placeholder="Password" class="loginPassword" required><br>

               <button type="submit" class="btn btn-primary loginButton" id="signIn-btn" name="login_btn">Sign In</button>

            </form>
            <hr class="hr-class">
            <p class="regLabel">Don't have an account?</p>
            <a href="register.php" class="btn regButton" id="signUp-btn">Register</a>
        </div>

        </div>
        <!--end of login form container-->




    </body>
</html>
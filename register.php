<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Bursary | Register</title>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
        <link rel="icon" type="image/webp" sizes="308x303" href="static/images/logo.png">
    </head>
    <body class="body">
        <!--Navigation Bar section-->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#top"><span class="navTitle">E</span>-Bursary System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="register.php">Home</a>
                <a class="nav-item nav-link active" href="index.php">Login</a>
              </div>
            </div>
          </nav><!--end of Navigation Bar section-->


        <div class="registerForm">

            <div class="formTop">
                <h3 class="formHeading">E-Bursary Register Form</h3>
                <img src="static/images/sirisia.png" class="masenoLogoImage">
            </div>

            <div class="registerFormContent">
                <form method="POST" action="register.php">
                <?php include('errors.php'); ?>

                <label for="firstname">First Name</label>
                <input type="text" name="First_Name" class="FirstName" placeholder="First Name" required value="<?php echo $firstname; ?>" ><br>

                <label for="middlename">Middle Name</label>
                <input type="text" name="Middle_Name" class="MiddleName" placeholder="Middle Name" value="<?php echo $middlename; ?>" ><br>

                <label for="lastname">Last Name</label>
                <input type="text" name="Last_Name" class="LastName" placeholder="Last Name" required value="<?php echo $lastname; ?>" ><br>

                <label for="regNumber">Registration Number</label>
                <input type="text" name="Reg_Number" class="regNumber" placeholder="Registration Number"required  value="<?php echo $registrationNumber; ?>" ><br>

                <label for="email">Email Address</label>
                <input type="email" name="Email_Address" class="email" placeholder="Email Address" required  value="<?php echo $email; ?>" ><br>

                <label for="phone">Phone Number</label>
                <input type="tel" name="Phone_Number" class="phoneNumber" placeholder="Phone Number" required  value="<?php echo $phone; ?>"  ><br>

                <label for="password">Password</label>
                <input type="password" name="password_1" class="password1" placeholder="Password" required value="<?php echo $password; ?> " ><br>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="password_2" class="confirmPassword" placeholder="Confirm Password" required  value="<?php echo $Confirm_password; ?>" ><br><br>

                <button type="submit" name="register_btn" class="registerButton">Register</button>
            </form>

            </div>
        </div>
<footer translate="no">
<div class="registerForm-footer">
  <p class="copyright register-footer-p" style="text-align: center;">Sirisia constituency &copy;<span id="currentYear">2022</span></p>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
  </html>

  



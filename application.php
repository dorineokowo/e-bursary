<?php 
// Report all PHP errors
// error_reporting(E_ALL);
// ini_set('display_errors','On');
include 'server.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bursary | APPLICATION</title>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
        <link rel="icon" type="image/webp" sizes="308x303" href="static/images/logo.png">
        <!--font awesome icons cdn-->
        <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script defer src="https://kit.fontawesome.com/885a196d5c.js" crossorigin="anonymous"></script>
        <!-- <script defer src="static/js/index.js"></script> --> 
        <script src="form_validation.js"></script>
    </head>
    <body class="body">
        <div class="SOMU-Form">

          <!--Navigation Bar section-->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#top"><span class="navTitle">E</span>-Bursary System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="studentDashboard.php">Home</a>
                <a class="nav-item nav-link active" href="application.php">Application</a>
                <a class="nav-item nav-link active" href="loanStatus.php">Loan Status</a>
                <a class="nav-item nav-link active" href="studentComplaints.php">Complaints</a>
                <a class="nav-item nav-link active" href="studentDownloadPage.php">Downloads</a>
                <a class="nav-item nav-link active" href="logout.php">Logout</a>
              </div>
            </div>
          </nav><!--end of Navigation Bar section-->

        
          
           <?php
           $regno= $_SESSION['username'];
          $application_query = "SELECT regNumber, firstName, lastName,emailAddress,phoneNumber FROM register where regNumber= '$regno' ";
  $application_query_result = mysqli_query($db, $application_query);
  $row = mysqli_fetch_assoc($application_query_result);

  $firstName=$row['firstName'];
  $lastName=$row['lastName'];
  $Email=$row['emailAddress'];
  $Phone=$row['phoneNumber'];

  if($_SESSION['username']==true){
    $_SESSION['firstname'] = $firstName;

    $_SESSION['lastname'] = $lastName;

    $_SESSION['emailaddress'] = $Email;

    $_SESSION['phonenumber'] = $Phone;  
  }
  ?>

            <div class="formContents">
                <form  class="personalInformationForm" id="SOMUForm" method="POST" name="form1" action="server.php" enctype="multipart/form-data" >
                <?php include('errors.php'); ?>
             <?php   
             echo "Hello " .$_SESSION['firstname']." ".$_SESSION['lastname'].".Please apply here!!!";
             ?>
                    <h5 class="SOMU-Subtitle">PERSONAL INFORMATION</h5>
                    <label for="FirstName">First Name</label>
                    <input name="firstName" type="text" placeholder="First Name" id="fname" class="SOMU-FirstName" value="<?php  echo $firstName ?>"readonly/><br>

                    <label for="LastName">Last Name</label>
                    <input  name="lastname"type="text" placeholder="Last Name" id="lname" class="SOMU-LastName" value="<?php echo $_SESSION['lastname'] ?>"readonly ><br>

                    <label for="phonenumber">Phone Number</label>
                    <input  name="phonenumber" type="tel" placeholder="Phone Number" class="SOMU-phonenumber" value="<?php echo $_SESSION['phonenumber'] ?>"readonly  /><br>

                    <label for="emailaddress">Email Address</label>
                    <input  name="emailaddress" type="email" id="email" placeholder="Email Address" class="SOMU-email" value="<?php echo $_SESSION['emailaddress']  ?>"readonly   ><br>

                    <label for="YearOfStudy">Year of Study</label>
                    <input  name="yearOfStudy" type="number" placeholder="Year of Study" class="SOMU-yearofstudy" min="1" max="7" maxlength="1" required ><br>

                    <label for="degree-programme">Degree Programme</label>
                    <input  name="programme" type="text" placeholder="Degree Programme" class="SOMU-Degree-Programme" required ><br>

                    <label for="department">Department</label>
                    <input  name="department" type="text" placeholder="Department" class="SOMU-Department" onclick="allLetter(document.form1.department)" required><br>

                    <label for="county">County</label>
                    <input  name="county" type="text" placeholder="County" class="SOMU-county" required ><br>

                    <label for="constituency">Constituency</label>
                    <input  name="constituency_name" type="text" placeholder="Constituency" class="SOMU-constituency" required ><br>

                    <label for="sponsor">Government sponsored?</label>
                    <input  name="sponsor" type="text" placeholder="yes or no" class="SOMU-sponsor" required ><br>
               
            </div>
        </div>
        <!--second form-->
        <div class="family-status-form">
        <div class="family-status-content" id="familyStatus-form">
            
                <h5 class="SOMU-Subtitle">FAMILY STATUS</h5>

                <label for="orphan">Orphan</label>

                <input name="orphan-box" type="checkbox" class="orphan" value="yes"><br>

                <label for="disabled">Disabled</label>
                <input name="disabled" type="checkbox" class="disabled" value="false"><br>

                <label for="single_parent">Single Parent</label>
                <input name="singleparent" type="checkbox" class="single-parent" value="yes"><br>

                <label for="unemployed_parents">Unemployed Parents</label>
                <input name="unemployed-fam" type="checkbox" class="unemployed-parents" value="yes"><br>

                <label for="others">Others(specify)</label>
                <textarea name="otherFamilyStatus"    type="text" class="others"  rows="4" cols="30" style="margin-left: 6%;"></textarea><br>

                </div>
        </div><!--end of family form contents-->


        <!--Loan details-->
        <div class="loan-details-form">
            <div class="loan-contents">
                <h5 class="SOMU-Subtitle">DETAILS OF LOANS AND BUSARIES</h5>
                <p class="loan-disclaimer">Indicate clearly, organization and amount (e.g. HELB, 25000)</p>
                
                    <hr>
                    <div class="loan-menu">
                    <h5 class="loan-details-heading">LOAN</h5>
                    <label for="loan_amount">Loan Amount</label>
                    <input name="loanamount" type="number" class="loan-amount" placeholder="Loan Amount in Ksh: 10,000" value="0" ><br>
                    <label for="awarding_organization">Awarding Organization</label>
                    <input name="awardingorganization" type="text" class="awarding-organization" placeholder=" e.g HELB or if no organization then type none" required><br>
                    <label for="attach-evidence">Attach Documents (pdf files only)</label>
                    <input name="loanattachment" type="file" accept="application/pdf" placeholder="Attach Document"><br>
                  </div>

                    <div class="bursary-menu">
                    <h5 class="loan-details-heading">BURSARY</h5>
                    <label for="bursary_amount">Bursary Amount</label>
                    <input name="bursaryamount" type="number" class="bursary-amount" value="0" placeholder="Amount in Ksh:1000" required  ><br>
                    <label for="bursary_awarding_organization">Awarding Organization</label>
                    <input name="bursaryOrg" type="text" class="bursary-awarding-organization"  placeholder="e.g Mwala Constituency if no organization then type none" required  ><br>
                    <label for="attach-evidence">Attach Documents (pdf files only)</label>
                    <input name="bursaryattachment" type="file" accept="application/pdf" placeholder="Attach Document"><br><br>
                  </div>

                  <div class="academic-menu">
                    <h5 class="loan-details-heading">ACADEMIC PROGRESS</h5>

                    <label for="academic-grade">Previous Year academic grade</label>
                    <input name="academicgrade" type="text" class="academic-grade" placeholder="e.g B" >
                    <label for="attach-evidence">Attach certified result slip by Dean of school(pdf only)</label>
                    <input name="gradeattachment" type="file" accept="application/pdf" placeholder="Attach Document"  required><br><br>
                   <div class="app-submit-btn-div">
                    <button name="submit_application_btn" class="btn btn-primary loan-details-btn-save" type="submit" >Submit Application</button>
                  </div>
                  </div>
                       </form>
            </div>
        </div>
        <!--end of loan details-->
<!--Footer section-->
<footer translate="no" class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col">
          
            <h4 class="footer-menu">MENU</h4>
            <a href="studentDashboard.php" class="footer-menu">Home</a>
            <a href="application.php" class="footer-menu">Application</a>
            <a href="loanStatus.php" class="footer-menu">Loan Status</a>
            <a href="studentComplaints.php" class="footer-menu">Complaints</a>
            <a href="studentDownloadPage.php" class="footer-menu">Downloads</a>
        </div>
        <div class="col-6">
          <h4 class="footer-heading">SIRISIA CONSTITUENCY BURSARY MANAGEMENT</h4>
          <p>Sirisia contituency is offering bursaries to all university students of its contituency. 
            It involves a fair process of which every applicant is meant to benefit unless false 
            documents are attached during the application process </p>
        </div>
        <div class="col">
         <h3>Social Media</h3>
         <p>Follow us on social media through:</p>
         <a class="fa fa-twitter fa-2x" href="https://twitter.com/sirisia" target="_blank"></a>
         <a class="fa fa-facebook fa-2x" href="https://facebook.com/sirisia" target="_blank"></a>
         <a class="fa fa-instagram fa-2x" href="https://instagram.com/sirisia" target="_blank"></a>
        </div>
      </div>
      
    </div>
    <p class="copyright" style="text-align: center;">Sirisia Constituency &copy;<span id="currentYear">2022</span></p>
  </footer>
  <!--end footer-->




    </body>
    </html>
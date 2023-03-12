<?php
// // Report all PHP errors
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);


include 'server.php';

if($_POST['hidden_reg']){
  $_SESSION['registration']=mysqli_real_escape_string($db, $_POST['hidden_reg']);

}
$registration_Number = $_SESSION['registration'];




?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>APPLICANTS</title>
        <script defer src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
    </head>
    <body style="background: rgb(216, 210, 210);padding:1%;">
        <header>
            <div class="header-Section">
<!--Navigation Bar section-->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#top"><span class="navTitle">E</span>-Bursary System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="adminDashboard.php">Home</a>
                <a class="nav-item nav-link active" href="disbursement.php">Disbursement</a>
                <a class="nav-item nav-link active" href="adminComplaints.php">Complaints</a>
                <a class="nav-item nav-link active" href="beneficiariesPDF.php">Beneficiaries</a>
                <a class="nav-item nav-link active" href="adminDownloadPage.php">Downloads</a>
                <a class="nav-item nav-link active" href="logout.php">Logout</a>
              </div>
            </div>
          </nav><!--end of Navigation Bar section-->
          </div>
          </header>

          <div class="main-view">

            <div class="personal-details">
              <table class="personal-info-table">
                <h5 class="applicants-details-heading">Personal Information</h5>
                
                <tr>
                  <th>Reg No.</th>
                  <th>Student's Name</th>
                  <th>Email Address </th>
                  <th>Phone Number</th>
                  <th>Programme</th>
                  <th>Year of Study</th>
                  <th>County</th>
                  <th>Government Sponsored</th>
                </tr>

                <?php
                  // $table_data_query = ; // fetch data from database
                  // $table_data_result = mysqli_query($db, $table_data_query);
                  
                // $_SESSION['reg_no']=mysqli_real_escape_string($db, $_POST['hidden_reg']);
                // $registration_Number = $_SESSION['reg_no'];

                  $sql = "SELECT * FROM personal_information WHERE regNumber='$registration_Number' ";
                  $result = mysqli_query($db, $sql);
                 


                  if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        $uniquestudentid=$row["id"] ;
                        $reg=$row["regNumber"] ;
                echo "<tr> <td>" . $row["regNumber"] ."</td>";
               echo "<td>" .$row["firstName"]." ".$row["lastName"] ."</td>";
               echo "<td>" .$row["email"]."</td>";
               echo "<td>" .$row["phone"]."</td>";
               echo "<td>" .$row["programme"]."</td>";
               echo "<td>" .$row["yearofStudy"]."</td>";
               echo "<td>" .$row["county"]."</td>";
               echo "<td>" .$row["governmentSponsored"]."</td>";
               echo "<td> 
               <form method='post' action=''>
               <input type='text' name='studentid' value='$uniquestudentid' hidden>
               <input type='text' name='registration_num' value='$reg' hidden>
               </form>
               
               </td></tr>";
                         }
                         
                    } else {
                 echo "Zero Results Found!!!";
                }
      
                ?>

              </table>
              </div>

        <div class="family-status">
              <table class="family-status-table">
                <h5 class="applicants-details-heading">Family Status</h5>
                <tr>
                  <th>Orphan</th>
                  <th>Disabled</th>
                  <th>Single Parent</th>
                  <th>Unemployed Parents</th>
                  <th>Others</th>
                </tr>

                <?php
                  // $table_data_query = ; // fetch data from database
                  // $table_data_result = mysqli_query($db, $table_data_query);
                //   $_SESSION['reg_no']=mysqli_real_escape_string($db, $_POST['hidden_reg']);
                // $registration_Number = $_SESSION['reg_no'];

                  $sql = "SELECT * FROM personal_information WHERE regNumber='$registration_Number' ";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                echo "<tr> <td>" . $row["orphan"]. "</td>";
               echo "<td>" .$row["disabled_parents"]. "</td>";
               echo "<td>" .$row["singleParent"]."</td>";
               echo "<td>" .$row["unemployedParents"]."</td>";
               echo "<td>" .$row["otherFamilyStatus"]."</td>  </tr>";
                         }
                    } else {
                 echo "Zero Results Found!!!";
                }
      
                ?>

              </table>
            </div>


            <div class="loan-details">
              <table class="loan-details-table">
                <h5 class="applicants-details-heading">Loan Details</h5>
                <tr>
                  <th>Loan Amount</th>
                  <th>Awarding Organization</th>
                  <th>Attached Document</th>
                </tr>
                <?php
                  // $table_data_query = ; // fetch data from database
                  // $table_data_result = mysqli_query($db, $table_data_query);
                //   $_SESSION['reg_no']=mysqli_real_escape_string($db, $_POST['hidden_reg']);
                // $registration_Number = $_SESSION['reg_no'];

                  $sql = "SELECT * FROM personal_information WHERE regNumber='$registration_Number' ";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                echo "<tr> <td>" . $row["loanAmount"]. "</td>";
               echo "<td>" .$row["awardingOrganization"]. "</td>";

               $loanPDF= $row["loanAttachment"];
               if ($loanPDF=="No loan Attachment"){
                echo "<td>" ."No Loan document Attached". "</td>  </tr>";
               }else{
                $pdfPath='uploads/'.$loanPDF;
                //  echo $pdfPath;
                 echo "<td>" ."<a href='$pdfPath' target='_blank' >View Details</a>". "</td>  </tr>";
               }
               
                         }
                    } else {
                 echo "Zero Results Found!!!";
                }
      
                ?>
              </table>
            </div>


            <div class="bursary-details">
              <table class="bursary-details-table">
                <h5 class="applicants-details-heading">Bursary Details</h5>
                <tr>
                  <th>Bursary Amount</th>
                  <th>Awarding Organization</th>
                  <th>Attached Document</th>
                </tr>
                <?php
                  // $table_data_query = ; // fetch data from database
                  // $table_data_result = mysqli_query($db, $table_data_query);
                //   $_SESSION['reg_no']=mysqli_real_escape_string($db, $_POST['hidden_reg']);
                // $registration_Number = $_SESSION['reg_no'];

                  $sql = "SELECT * FROM personal_information WHERE regNumber='$registration_Number' ";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                echo "<tr> <td>" . $row["bursaryAmount"]. "</td>";
               echo "<td>" .$row["awardingBursaryOrg"]. "</td>";
               $bursaryPDF= $row["bursaryAttachment"];

               if($bursaryPDF=="No bursary Attachment"){
                echo "<td>" ."No Bursary document Attached". "</td>  </tr>";
               }else{
                $pdfPath='uploads/'.$bursaryPDF;
                //  echo $pdfPath;
                 echo "<td>" ."<a href='$pdfPath' target='_blank' >View Details</a>". "</td>  </tr>";
               }
               
                         }
                         //end of while
                         
                    } else {
                 echo "Zero Results Found!!!";
                }
      
                ?>
              </table>
            </div>


            <div class="academic-details">
              <table class="academic-details-table">
                <h5 class="applicants-details-heading">Academic Details</h5>
                <tr>
                  <th>Previous Year Academic Grade</th>
                  <th>Attached results slip</th>
                </tr>
                <?php
                  // $table_data_query = ; // fetch data from database
                  // $table_data_result = mysqli_query($db, $table_data_query);
                //   $_SESSION['reg_no']=mysqli_real_escape_string($db, $_POST['hidden_reg']);
                // $registration_Number = $_SESSION['reg_no'];

                  $sql = "SELECT * FROM personal_information WHERE regNumber='$registration_Number' ";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                echo "<tr> <td>" . $row["previousGrade"]. "</td>";
               $gradePDF= $row["gradeAttachment"];
               $pdfPath='uploads/'.$gradePDF;
              //  echo $pdfPath;
               echo "<td>" ."<a href='$pdfPath' target='_blank' >View Result Slip</a>". "</td>  </tr>";
                         }
                    } else {
                 echo "Zero Results Found!!!";
                }
                ?>
              </table>
            </div>

            <div class="verify-section">
                <h5 class="applicants-details-heading">Verification Status</h5>
                <p class="approve-dissaprove-p">Do you verify this application?</p>

                <?php
                 $registration_Number = $_SESSION['registration'];
                $applicationstatusquery="SELECT * FROM personal_information where regNumber= '$registration_Number' ";
                $status_report_result=mysqli_query($db, $applicationstatusquery);

                $applicationstatus="";
                if($status_report_result->num_rows > 0){
                  while($row = $status_report_result->fetch_assoc()) {
                    $applicationstatus=$row["applicationStatus"];

                    // echo $row["applicationStatus"];
                  }
                }
             
                ?>


                <p>This is the application is <strong style="color:green";><?php echo $applicationstatus?>  </strong> </p>

                <form class="verify-form" METHOD="POST" action="applicantDetails.php">
                  <input type="text" name="verify" value="verified" hidden><br>
                
                  <input type="submit" class="btn btn-primary verify-btn" name="verify-btn" value="Verify">
                </form><br>
                <!-- value="unverified" -->
                <form  METHOD="POST" action="applicantDetails.php">
                  <input type="text" name="unverify" $registration  value='not verified' hidden>
                  <input type="submit" class="btn btn-primary unverify-btn" name="unverify-btn" value="Unverify">
                </form>
                </div>

                <?php
                $registration_Number = $_SESSION['registration'];

                if (isset($_POST['verify-btn'])) { 
                  $verified = mysqli_real_escape_string($db, $_POST['verify']);
                  $verify_query="UPDATE personal_information  SET applicationStatus='$verified' WHERE regNumber='$registration_Number'";
                  mysqli_query($db,$verify_query);

                }

                if (isset($_POST['unverify-btn'])) { 
                  $unverified = mysqli_real_escape_string($db, $_POST['unverify']);
                  $unverify_query="UPDATE personal_information  SET applicationStatus='$unverified' WHERE regNumber='$registration_Number'";
                  mysqli_query($db,$unverify_query);
                }


                ?>
               
                
            



          </div><!--end of main view-->

          <div class="move-btn">
            <form method="post" action="">
            <input type="submit" class="btn previous-btn" name="previous-btn" value="Previous">
            <input type="submit" class="btn next-btn" name="next-btn" value="Next">
            </form>
        </div>

<?php
if (isset($_POST['previous-btn'])) {
  // receive all input values from the form
  $studentID =  $uniquestudentid;
  $regnumber = $reg;

$paginationsql = "SELECT * FROM personal_information where id =$studentID ";
                  $pagination_result = mysqli_query($db, $paginationsql);
                  if (mysqli_num_rows($pagination_result ) > 0) {
                            // output data of each row
                      while($row = mysqli_fetch_assoc($pagination_result )) {
                       $data= $row['id'];
                      }
                  }
                }
?>


           <!--Footer section-->
<footer translate="no" class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col">
          
            <h4 class="footer-menu">MENU</h4>
            <a href="adminDashboard.php" class="footer-menu">Home</a>
            <a href="disbursement.php" class="footer-menu">Disbursement</a>
            <a href="adminComplaints.php" class="footer-menu">Disbursement</a>
            <a href="adminDownloadPage.php" class="footer-menu">Downloads</a>
        </div>
        <div class="col-6">
          <h4 class="footer-heading">SIRISIA <?php echo $data; ?> CONSTITUENCY</h4>
          <p>Sirisia contituency is offering bursaries to all university students of its contituency. 
            It involves a fair process of which every applicant is meant to benefit unless false 
            documents are attached during the application process</p>
        </div>
        <div class="col">
         <h3>Social Media</h3>
         <p>Follow us on Social Media through:</p>
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
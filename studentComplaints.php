<?php
include 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Complaints</title>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
        <link rel="icon" type="image/webp" sizes="308x303" href="static/images/logo.png">
    </head>
    <body class="body">
        <!--Navigation Bar section-->
        <div class="main-navigation">
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top ">
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
          </div>

         


          <?php 
$admission=$_SESSION['username'];

$user_data_query="SELECT * from personal_information where regNumber='$admission' ";
$user_data_result=mysqli_query($db,$user_data_query);

$row = mysqli_fetch_assoc($user_data_result);
$registrationNumber=$row['regNumber'];
$emailaddress=$row['email'];
$phonenumber=$row['phone'];

?>
  <!--start of complaint form container-->
  <div class="complaintForm">
    <div class="formTop complaint-section">
        <h3 class="formHeading">Student Complaints</h3>
        <img src="static/images/sirisia.png" class="masenoLogoImage">
    </div>
 
    <div class="formContent">
    <form method="POST" action="studentComplaints.php">
    <?php include('errors.php'); ?>
     <label for="regNumber" class="complaint-form-label">Registration Number</label>
        <input name="admNumber" type="text" placeholder="Registration Number" name="regnumber" value="<?php echo $registrationNumber ?>" class="complaint-form-input" required readonly><br>

        <label for="email" class="complaint-form-label">Email Address</label>
        <input name="email" type="email" placeholder="Email Address"name="email"  value="<?php echo $emailaddress ?>" class="complaint-form-input" required readonly><br>

        <label for="phone" class="complaint-form-label">Phone Number</label>
        <input name="phoneNumber" type="tel" placeholder="07xxxxxx" name="tel" value="<?php echo $phonenumber ?>" class="complaint-form-input" required><br>
<?php include 'errors.php' ?>
        <label for="username" class="complaint-form-label">Type of Complaint:</label>
        <select name="complaint" class="complaint-form-input" >
            <option disabled selected>Choose...</option>
            <option value="Application Not Verified">Application Not Verified</option>
            <option value="Zero amount Allocation">Zero amount Allocation</option>
            <option value="Cheque Number Missing">Cheque Number Missing</option>
            <option value="Other">Other</option>
          </select><br>
          <label for="complaint-description" class="complaint-form-label">Complaint Description</label>
        <textarea cols="30" rows="4" name="description" placeholder="Explain your complaint in detail" class="complaint-form-input" required ></textarea><br>
        <div class="complaint-submit-btn-div">
<input type="submit" class="btn btn-success complaint-submit-btn" name="submit_btn" value="Submit Complaint">
</div>

    </form>
    
</div>

</div>
<!--end of login form container-->
<?php 
 $registrationNumber=$row['regNumber'];
 $emailaddress=$row['email'];
 $phonenumber=$row['phone'];

 if(isset($_POST['submit_btn'])){
   if(!empty($_POST['complaint'])) {
     $selected = $_POST['complaint'];
    //  echo 'You have chosen: ' . $selected;
   } else {
    //  echo 'Please select the value.';
    array_push($errors, "Please select the value.");
   }

   $complaintDescription=$_POST['description'];

   $complaint_query="INSERT INTO complaints (regNumber, emailAddress, phone, TypeofComplaint, complaintDescription, complaintResponse) VALUES ('$registrationNumber', '$emailaddress', '$phonenumber', '$selected', '$complaintDescription', 'No Response Yet') ";
//   $complaint_query_result=mysqli_query('$db','$complaint_query');
  mysqli_query($db, $complaint_query);
 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
 }


?>



<table class="table admin-complaint-table">
            <tr>
            <th>Complaint ID</th>
            <th>Complaint Date</th>
                <th>Registration Number</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Complaint</th>
                <th>Complaint Description</th>
                <th>Complaint Response</th>
            </tr>

            <?php
   $studentComplaint_query="SELECT * FROM complaints where regNumber='$registrationNumber' ";
   $studentQuery_result=mysqli_query($db, $studentComplaint_query);
   if ($studentQuery_result->num_rows > 0){
    while($row = $studentQuery_result->fetch_assoc()) {
        $id=$row['complaintID'];
        $admNO=$row['regNumber'];
        $email=$row['emailAddress'];
        $phonenumber=$row['phone'];
        $complaintType=$row['TypeofComplaint'];
        $description=$row['complaintDescription'];
        $date_received=$row['complaint_received_date'];
        $response=$row['complaintResponse'];

        echo "<tr> <td>" . $row["complaintID"]. "</td>";
        echo "<td>" .$row["complaint_received_date"]. "</td>";
        echo "<td>" .$row["regNumber"]."</td>";
        $admissionNO=$row["regNumber"];
        echo "<td>" .$row["emailAddress"]."</td>";
        echo "<td>" .$row["phone"]."</td>";
        echo "<td>" .$row["TypeofComplaint"]."</td>";
        echo "<td>" .$row["complaintDescription"]."</td>";
        echo "<td>" .$row["complaintResponse"]."</td> </tr>";
        
      

      
    }
   }
            ?>
          </table>

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




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
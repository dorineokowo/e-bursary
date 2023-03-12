<?php
include 'server.php';


$loandetails_query = "SELECT * FROM loandetails where applicationStatus='verified' ";
$loandetails_result = mysqli_query($db, $loandetails_query);
if ($loandetails_result->num_rows > 0){
  while($row = $loandetails_result->fetch_assoc()) {
     $admission_number = $row["regNumber"];
    $ApplicationStatus = $row["applicationStatus"];
    $AmountAllocated=$row["amountAllocated"];
    $chequeno=$_POST["cheque"];
  }
}

if (isset($_POST['allocate-btn'])) {
  $data_fetch_query = "SELECT * FROM personal_information where applicationStatus='verified' or applicationStatus='not verified' ";
  $data_result = mysqli_query($db, $data_fetch_query);
  if ($data_result->num_rows > 0){
    while($row = $data_result->fetch_assoc()) {
       $admission_number = $row["regNumber"];
      $ApplicationStatus = $row["applicationStatus"];
      $AmountAllocated=$_POST["amount"];
      // echo '<b>'.$admission_number.$ApplicationStatus.'</b><br />';
     
      if($ApplicationStatus==='verified'){
        $loanDetailsQuery="INSERT INTO loandetails (regNumber,applicationStatus,amountAllocated)VALUES('$admission_number','$ApplicationStatus','$AmountAllocated')";
        $loandetailsresult= mysqli_query($db,$loanDetailsQuery);
      }else{
        $loanDetailsQuery="INSERT INTO loandetails (regNumber,applicationStatus)VALUES('$admission_number','$ApplicationStatus')";
        $loandetailsresult= mysqli_query($db,$loanDetailsQuery);
      }

    }
  }
}



if (isset($_POST['update-amnt-btn'])) {
  $loandetails_query = "SELECT * FROM loandetails where applicationStatus='verified' ";
  $loandetails_result = mysqli_query($db, $loandetails_query);
  if ($loandetails_result->num_rows > 0){
    while($row = $loandetails_result->fetch_assoc()) {
       $admission_number = $row["regNumber"];
      $ApplicationStatus = $row["applicationStatus"];
      $AmountAllocated=$_POST["amount"];
      $chequeno=$_POST["cheque"];

      if($AmountAllocated>=0){
   $loanQuery="UPDATE loandetails set amountAllocated ='$AmountAllocated' where applicationStatus='verified' ";
        $loanresult= mysqli_query($db,$loanQuery);
    }
    else{
      array_push($errors,"Please Input amount greater or equal to 0");
    }
  }
}
}

$loandetails_query = "SELECT * FROM loandetails where applicationStatus='verified'";
$loandetails_result = mysqli_query($db, $loandetails_query);
if ($loandetails_result->num_rows > 0){
  while($row = $loandetails_result->fetch_assoc()) {
     $admission_number = $row["regNumber"];
    $ApplicationStatus = $row["applicationStatus"];
    $AmountAllocated=$row["amountAllocated"];
    $chequeno=$row["chequeNumber"];
  }
}

if (isset($_POST['cheque_number_btn'])) {
  $loandetails_query = "SELECT * FROM loandetails where applicationStatus='verified' ";
  $loandetails_result = mysqli_query($db, $loandetails_query);
  if ($loandetails_result->num_rows > 0){
    while($row = $loandetails_result->fetch_assoc()) {
       $admission_number = $row["regNumber"];
      $ApplicationStatus = $row["applicationStatus"];
      $AmountAllocated=$row["amountAllocated"];
      $chequeno=$_POST["cheque"];

   $loanQuery="UPDATE loandetails set chequeNumber ='$chequeno' where applicationStatus='verified'  ";
        $loanresult= mysqli_query($db,$loanQuery);


    }
  }
}


$loandetails_query = "SELECT * FROM loandetails where applicationStatus='verified' ";
$loandetails_result = mysqli_query($db, $loandetails_query);
if ($loandetails_result->num_rows > 0){
  while($row = $loandetails_result->fetch_assoc()) {
     $admission_number = $row["regNumber"];
    $ApplicationStatus = $row["applicationStatus"];
    $AmountAllocated=$row["amountAllocated"];
    $payment_status=$row["paymentStatus"];
  }
}

if (isset($_POST['pending'])) {
  $loandetails_query = "SELECT * FROM loandetails ";
  $loandetails_result = mysqli_query($db, $loandetails_query);
  if ($loandetails_result->num_rows > 0){
    while($row = $loandetails_result->fetch_assoc()) {
       $admission_number = $row["regNumber"];
      $ApplicationStatus = $row["applicationStatus"];
      $AmountAllocated=$row["amountAllocated"];
      $paymentstatus=$row["paymentStatus"];

   $loanQuery="UPDATE loandetails set paymentStatus ='Pending' where applicationStatus='verified' ";
        $loanresult= mysqli_query($db,$loanQuery);
    }
  }
}

if (isset($_POST['allocated'])) {
  $loandetails_query = "SELECT * FROM loandetails ";
  $loandetails_result = mysqli_query($db, $loandetails_query);
  if ($loandetails_result->num_rows > 0){
    while($row = $loandetails_result->fetch_assoc()) {
       $admission_number = $row["regNumber"];
      $ApplicationStatus = $row["applicationStatus"];
      $AmountAllocated=$row["amountAllocated"];
      $paymentstatus=$row["paymentStatus"];

   $loanQuery="UPDATE loandetails set paymentStatus ='Allocated' where applicationStatus='verified'  ";
        $loanresult= mysqli_query($db,$loanQuery);
    }
  }
}

if (isset($_POST['disbursed'])) {
  $loandetails_query = "SELECT * FROM loandetails ";
  $loandetails_result = mysqli_query($db, $loandetails_query);
  if ($loandetails_result->num_rows > 0){
    while($row = $loandetails_result->fetch_assoc()) {
       $admission_number = $row["regNumber"];
      $ApplicationStatus = $row["applicationStatus"];
      $AmountAllocated=$row["amountAllocated"];
      $paymentstatus=$row["paymentStatus"];

   $loanQuery="UPDATE loandetails set paymentStatus ='Disbursed' where applicationStatus='verified'  ";
        $loanresult= mysqli_query($db,$loanQuery);
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Disbursement</title>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
        <link rel="icon" type="image/webp" sizes="308x303" href="static/images/logo.png">
    </head>
    <body style="background: rgb(216, 210, 210);padding:1%;">

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
                      <div class="allocation-section">
                        <h5 class="applicants-details-heading ">Bursary Allocation</h5>

                       
                        <p>Each Student has been allocated: <strong style="color:green;"> Ksh:<?php echo $AmountAllocated?> </strong> </p>
                        <P>Do you want to update the amount allocated to each student?</P>
                        <form method="post" action="disbursement.php">
                          <?php include 'errors.php'; ?>
                          <label>Allocate Amount:</label>
                          <input type="number" placeholder="e.g 1000" name="amount" class="allocate-amount" required><br>
                          <input type="submit" class="btn btn-primary allocate-btn" name="allocate-btn" Value="Allocate Amount" >
                          <input type="submit" class="btn btn-success allocate-btn" name="update-amnt-btn" Value="Update Amount" >
                        </form>
                    </div>

                   

                <div class="disbursement-form">
                  <div class="cheque-section">
                      <h3 class="disbursement-heading applicants-details-heading">Cheque Details</h3>
                      <p>Cheque number: <strong style="color:green;"><?php echo $chequeno?></strong> </p>
                      <p>Do you wish to update the cheque number?</p>
                      <form method="POST" action="">
                          <label class="label-heading">Cheque Number:</label>
                          <input type="number" name="cheque"placeholder="Enter cheque number" class="cheque-number"><br>
                          <input type="submit" name="cheque_number_btn" class="btn btn-success disburse-btn" value="Update Cheque Number">
                      </form>
                  </div>
              </div>
              

              <div class="disbursement-form">
                  <div class="cheque-section">
                      <h3 class="disbursement-heading applicants-details-heading">Payment Status</h3>
                      <p>The payment status is <strong style="color:green;"><?php echo $payment_status ?></strong></p>
                      <form method="POST" action="">
                          <p>Update the payment status here.</p>
                          <input type="submit" name="pending" class="btn btn-info disburse-btn" value="Pending">
                          <input type="submit" name="allocated" class="btn btn-primary disburse-btn" value="Allocated">
                          <input type="submit" name="disbursed" class="btn btn-success disburse-btn" value="Disbursed">
                      </form>
                  </div>
              </div>
             

                



    <!--Footer section-->
    <footer translate="no" class="footer-section">
        <div class="container">
          <div class="row">
            <div class="col">
              
                <h4 class="footer-menu">MENU</h4>
                <a href="adminDashboard.php" class="footer-menu">Home</a>
                <a class="footer-menu" href="disbursement.php">Disbursment</a>
                <a class="footer-menu" href="adminComplaints.php">Complaints</a>
                <a href="adminDownloadPage.php" class="footer-menu">Downloads</a>
            </div>
            <div class="col-6">
              <h4 class="footer-heading">SIRISIA CONSTITUENCY BURSARY MANAGEMENT</h4>
              <p>Sirisia contituency is offering bursaries to all university students of its contituency. It involves a fair process of which every applicant is meant to benefit unless false documents are attached during the application process </p>
            </div>
            <div class="col">
             <h3>Social Media</h3>
             <p>Maseno University social media handles include:</p>
             <a class="fa fa-twitter fa-2x" href="https://twitter.com/sirisia" target="_blank"></a>
             <a class="fa fa-facebook fa-2x" href="https://facebook.com/sirisia" target="_blank"></a>
             <a class="fa fa-instagram fa-2x" href="https://instagram.com/sirisia" target="_blank"></a>
            </div>
          </div>
          
        </div>
        <p class="copyright" style="text-align: center;">Sirisa constituency &copy;<span id="currentYear">2022</span></p>
      </footer>
      <!--end footer-->

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
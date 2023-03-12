<?php 
session_start();
// // Report all PHP errors
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
define('DEBUG', true);
error_reporting(E_ALL);
if(DEBUG){
  ini_set('display_errors', 'on');
}
{
  ini_set('display_errors', 'off');
}
// connect to the database
try{
   $db = mysqli_connect('localhost', 'root', '', 'e-bursary');
 
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}



// initializing variables
$firstname = "";
$middlename= "";
$lastname="";
$registrationNumber="";
$email="";
$phone="";
$password1="";
$password2="";
$errors = array(); 
// REGISTER USER
if (isset($_POST['register_btn'])) {
    // receive all input values from the form
    $firstname =  $_POST['First_Name'];
    $middlename = $_POST['Middle_Name'];
    $lastname =  $_POST['Last_Name'];
    $registrationNumber= $_POST['Reg_Number'];
    $email =  $_POST['Email_Address'];
    $phone =  $_POST['Phone_Number'];
    $password =  $_POST['password_1'];
    $Confirm_password =  $_POST['password_2'];
    // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "LastName is required"); }
  if (empty($registrationNumber)) { array_push($errors, "Registration Number is required"); }
  if (empty($email)) { array_push($errors, "Email Address is required"); }
  if (empty($phone)) { array_push($errors, "Phone Number is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($Confirm_password)) { array_push($errors, "Please Confirm Password"); }
  if ($password != $Confirm_password) {
	array_push($errors, "The two passwords do not match");
  }
 // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM register WHERE regNumber='$registrationNumber' OR emailAddress='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['regNumber'] === $registrationNumber) {
      array_push($errors, "Registration number already exists");
    }
    if ($user['emailAddress'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($Confirm_password);//encrypt the password before saving in the database

    $query = "INSERT INTO register(firstName,middleName,lastName,regNumber,emailAddress,phoneNumber,confirmPassword) 
              VALUES('$firstname','$middlename','$lastname','$registrationNumber','$email','$phone','$password')";
    mysqli_query($db, $query);

   
    $_SESSION['success'] = "Successifully Registered";
    echo $_SESSION['success'] ;
    header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_btn'])) {



  $username = $_POST['username'];
  $password = $_POST['password'];
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if($username=="brian" and $password=="brian" or $username=="emmanuel" and $password=="emmanuel"){
    $_SESSION['no_of_values']=0;
    $_SESSION['limit_number']=5;
    header('location: adminDashboard.php');
  }
  elseif (count($errors) == 0) {
    $password = md5($password);
  	$query = "SELECT * FROM register WHERE regNumber='$username' AND confirmPassword='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $row = mysqli_fetch_assoc($results);
      $registration=$row['regNumber'];
      $firstName=$row['firstName'];
      $lastName=$row['lastName'];
      $Email=$row['emailAddress'];
      $Phone=$row['phoneNumber'];

      $_SESSION['firstname'] = $firstName;
    $_SESSION['lastname'] =$lastName;
    $_SESSION['emailaddress'] =$Email;
    $_SESSION['phonenumber'] =$Phone;

  	$_SESSION['success'] = "You are now logged in";

  	  header('location: studentDashboard.php');
  	}else{
  		array_push($errors, "Incorrect Username or Password");
  	}
  }
}

// SUBMIT BURSARY APPLICATION
if (isset($_POST['submit_application_btn'])) {
  // receive all input values from the form
  $regno = $_SESSION['username'];
  $application_query = "SELECT regNumber, firstName, lastName,emailAddress,phoneNumber FROM register where regNumber='$regno' limit 1";
  $application_query_result = mysqli_query($db, $application_query);

  $row = mysqli_fetch_assoc($application_query_result);
  $FirstName=$row['firstName'];
  $LastName=$row['lastName'];
  $Email=$row['emailAddress'];
  $Phone=$row['phoneNumber'];
  $regno = $_SESSION['username'];

  $_SESSION['firstname'] = $FirstName;
    $_SESSION['lastname'] =$LastName;
    $_SESSION['emailaddress'] =$Email;
    $_SESSION['phonenumber'] =$Phone;
   
    // $_SESSION['username'] = $username;


  //PERSONAL INFORMATION

  $yearofStudy  = $_POST['yearOfStudy'];
  $degreeProgramme = $_POST['programme'];
  $department   =$_POST['department'];
  $county       =$_POST['county'];
  $constituency =  $_POST['constituency_name'];
  $sponsor      =  $_POST['sponsor'];

  //FAMILY STATUS
  $orphan =  $_POST['orphan-box'];
  $disabled=$_POST['disabled'];
  $singleparent=  $_POST['singleparent'];
  $unemployedparents=  $_POST['unemployed-fam'];
  $other_family_status = $_POST['otherFamilyStatus'];

  //LOAN AND BURSARY DETAILS
  $loanAmount= $_POST['loanamount'];
  $loanAwardingOrg=  $_POST['awardingorganization'];
  $loanAttachment=  $_FILES['loanattachment']['name'];

  $bursaryAmount= $_POST['bursaryamount'];
  $bursaryAwardingOrg =  $_POST['bursaryOrg'];
  $bursaryAttachment=  $_FILES['bursaryattachment']['name'];


  //academic section
  $academicGrade=  $_POST['academicgrade'];
  $gradeAttachment= $_FILES['gradeattachment']['name'];

  // form validation: ensure that the form is correctly filled ...

if (empty($yearofStudy)) { array_push($errors, "Please Indicate Year of Study"); }
if (empty($degreeProgramme)) { array_push($errors, "Please indicate your degree programme"); }
if (empty($department )) { array_push($errors, "Please indicate your department"); }
if (empty($county)) { array_push($errors, "Please indicate your home county"); }
if (empty($constituency)) { array_push($errors, "Please indicate your home constituency"); }
if (empty($sponsor)) { array_push($errors, "Please indicate if you are government sponsored or not"); }

if (empty($loanAmount)) { array_push($errors, "Please Indicate Loan Amount"); }
if (empty($loanAwardingOrg)) { array_push($errors, "Please indicate the awarding organization"); }
if (empty($loanAttachment)) { 
  $loanAttachment="no file uploaded";
 }

if (empty($bursaryAmount)) { array_push($errors, "Please Indicate Bursary amount"); }
if (empty($bursaryAwardingOrg)) { array_push($errors, "Please indicate the awarding organization"); }
// if (empty($bursaryAttachment)) { array_push($errors, "Please attach a supporting document"); }

if (empty($academicGrade)) { array_push($errors, "Please indicate the grade you attained in your previous year"); }
if (empty($gradeAttachment)) { array_push($errors, "Please attach your result slip"); }

// first check the database to make sure
// a user does not already exist with the same username and/or email
$regno = $_SESSION['username'];


$user_check_query = "SELECT * FROM personal_information WHERE regNumber= '$regno' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);


if ($user) { // if user exists
  if ($user['regNumber'] === $regno) {
    array_push($errors, "You have already submitted your application");
    
  }
}
// Finally, register user if there are no errors in the form

if (count($errors) == 0) {

// Uploads loan attachment file
if (isset($_POST['submit_application_btn'])) { // if save button on the form is clicked
  // name of the uploaded file
  $filename1 = $_FILES['loanattachment']['name'];
  $filename2 = $_FILES['bursaryattachment']['name'];
  $filename3=  $_FILES['gradeattachment']['name'];

  // destination of the file on the server
  $destination1 = 'uploads/' . $filename1;
  $destination2 = 'uploads/' . $filename2;
  $destination3 = 'uploads/' . $filename3;

  // get the file extension
  $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
  $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
  $extension3 = pathinfo($filename3, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $file1 = $_FILES['loanattachment']['tmp_name'];
  $size1 = $_FILES['loanattachment']['size'];

  $file2 = $_FILES['bursaryattachment']['tmp_name'];
  $size2 = $_FILES['bursaryattachment']['size'];

  $file3 = $_FILES['gradeattachment']['tmp_name'];
  $size3 = $_FILES['gradeattachment']['size'];

  $loanAttachmentMove=move_uploaded_file($file1, $destination1);
  $bursaryAttachmentMove=move_uploaded_file($file2, $destination2);
  $academicAttachmentMove=move_uploaded_file($file3, $destination3);

  if($loanAttachmentMove===false){
    $filename1="No loan Attachment";
  }
  if($bursaryAttachmentMove===false){
    $filename2="No bursary Attachment";
  }
 


  if (!in_array($extension1 or $extension2 or $extension3, ['pdf']) ) {
      echo "You file extension must be .pdf";
  } else if ($_FILES ['loanattachment']['size'] > 4000000 or ['bursaryattachment'] ['size'] > 4000000 or ['gradeattachment'] ['size'] > 4000000)  { // file shouldn't be larger than 4Megabyte
      echo "File too large!";
  } else {
      // move the uploaded (temporary) file to the specified destination
      if($academicAttachmentMove){
        $FirstName=$row['firstName'];
        $LastName=$row['lastName'];
        $Email=$row['emailAddress'];
        $Phone=$row['phoneNumber'];
        $regno = $_SESSION['username'];
      
        $_SESSION['firstname'] = $FirstName;
          $_SESSION['lastname'] =$LastName;
          $_SESSION['emailaddress'] =$Email;
          $_SESSION['phonenumber'] =$Phone;
$query = "INSERT INTO `personal_information`
        (`regNumber`,`firstName`,`lastName`,`phone`,`email`,`yearofStudy`,`programme`, `department`, `county`, `constituency`,
        `governmentSponsored`,`orphan`,`disabled_parents`,`singleParent`,`unemployedParents`,`otherFamilyStatus`, `loanAmount`,
        `awardingOrganization`, `loanAttachment`, `bursaryAmount`, `awardingBursaryOrg`, `bursaryAttachment`, `previousGrade`, 
        `gradeAttachment`)
 VALUES ('$regno','$FirstName','$LastName','$Phone','$Email','$yearofStudy','$degreeProgramme','$department','$county',
 '$constituency','$sponsor', '$orphan','$disabled','$singleparent','$unemployedparents','$other_family_status','$loanAmount',
 '$loanAwardingOrg','$filename1','$bursaryAmount','$bursaryAwardingOrg','$filename2','$academicGrade','$filename3')";


  $info = mysqli_query($db, $query);
  if($info){
    echo "Application Successful";
  }
  else{
    
    echo "Application Not successful!!!";
  }


    }else {
          echo "Failed to move academic attachment";
      }

  }
}
  // $_SESSION['firstname'] = $firstname;
  // $_SESSION['regNumber'] = $regno;
  // $_SESSION['success'] = "Application Successful";
}
else{

  echo count($errors);
  echo "<br/>";
 }
}


?>

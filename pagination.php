<?php

if (isset($_POST['previous-btn'])) {
    $previous_value  =mysqli_real_escape_string($db, $_POST['previous-value']);
    $page_session=$_SESSION['no_of_values'];

    
    // echo $page_session;
    $_SESSION['no_of_values']=$page_session-$_SESSION['limit_number'];
    if($_SESSION['no_of_values']<=0){
        $_SESSION['no_of_values']=0;
      }
}
if (isset($_POST['next-btn'])) {
    $next_value  =mysqli_real_escape_string($db, $_POST['next-value']);
    $page_session=$_SESSION['no_of_values'];
    $_SESSION['no_of_values']=$page_session+$_SESSION['limit_number'];
}





?>
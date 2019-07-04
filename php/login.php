<?php
   include("DBConnector.php");
   // session_start();
   $error = "Your Email or Password is invalid";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form 
      
      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);      
      $mypassword = md5($mypassword);
      $officeArray = array("SSD", "Student Affairs Office", "Security Office");
      
      $sql = "SELECT * FROM accounts WHERE email = '$myemail' and Password = '$mypassword'";
      $notCus = "SELECT * FROM accounts WHERE Office NOT LIKE 'Custodian''s office' AND User_type LIKE 'admin'";
      $result = mysqli_query($conn,$sql);
      // $notCusResult = mysqli_query($conn,$notCus);
      $notCusResult = mysqli_query($conn,$notCus);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $notCusRow = mysqli_fetch_array($notCusResult,MYSQLI_ASSOC);
      // $active = $row['active'];
      // echo $notCusRow['Office'];
      $count = mysqli_num_rows($result);
      // If result matched $myemail and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['email'] = "email";
         $_SESSION['login_user'] = $myemail;
      
         if($row['User_type'] == 'admin'){
                  if ($row['Office'] == 'SAO' || $row['Office'] == 'SecOffice' || $row['Office'] == 'DeanOffice'){
                     header("location: ../pages/office/home_office.php");
                  }else {
                     header("location: ../pages/admin/home_admin.php");
                  }
         }else{
            header("location: ../pages/client/home_client.php");
         }
      }else {
         echo $error;
      }
   }
?>
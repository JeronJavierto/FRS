   <?php
   include('DBConnector.php');
   // session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT First_name, Last_name FROM accounts WHERE email = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['First_name'];
   $login_lastname = $row['Last_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: ../index.php");
   }


      echo "Name: ", $login_session," ", $login_lastname;


 
?>
<html>
<head>
   <title>
   </title>
</head>
<body>


</body>

</html>
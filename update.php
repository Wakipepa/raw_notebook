<?php
  include_once "connection.php";

 
  if(isset($_POST['update'])){

    $userId = $_GET['ID'];
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $usernumber = $_POST['number'];

  $sql = "UPDATE note_book SET user_name='{$username}', user_email='{$useremail}', user_number='{$usernumber}' WHERE id='{$userId}'";
    $result = mysqli_query($conn,$sql);
    if( $result){
        header("location:display.php");
    }
  }
  else{
    header("location:display.php");
  } 
        
?>
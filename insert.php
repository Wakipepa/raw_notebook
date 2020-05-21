<?php
  include_once "connection.php";

  if(isset($_POST['add'])){
      if(empty($_POST['name'])|| empty($_POST['email'])||empty($_POST['number'])){
          echo "Please fill in the form";
      }
      else{
          $username = mysqli_real_scape_string($conn,$_POST['name']);
          $useremail = mysqli_real_scape_string($conn,$_POST['email']);
          $usernumber =  mysqli_real_scape_string($conn,$_POST['number']);
          $sql = "INSERT INTO note_book(user_name,user_email,user_number) VALUES(' $username',' $useremail',' $usernumber')";
          mysqli_query($conn,$sql);
          header("location:index.php");
         }
  }
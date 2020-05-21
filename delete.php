<?php
  include_once "connection.php";

  if(isset($_GET['delNumber'])){
    $userId = $_GET['delNumber'];
 
  $sql = "DELETE FROM note_book WHERE id='{$userId}'";
    $result = mysqli_query($conn,$sql);
    if( $result){
        header("location:display.php");
    }
  }
  else{
    header("location:display.php");
  } 
        
?>
<?php
  include_once ("heading.php");
  include_once "connection.php";

  $saveMessage = "";
  $username=$useremail=$usernumber="";
  $errors = array("nameError"=>"","emailError"=>"","numberError"=>"");
  if(isset($_POST['add'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if(empty($_POST["name"]))
    {
        $errors["nameError"] = "Fill in your name";
    }
    else{
        $username = test_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $errors["nameError"] = "Only letters and white space allowed";
          }
    }
    if(empty($_POST["email"]))
    {
        $errors["emailError"] = "Fill in your email";
    }
    else{
        $useremail = test_input($_POST['email']);
        if (!filter_var($useremail,FILTER_VALIDATE_EMAIL)) {
            $errors["emailError"] = "Invalid email format";
          }
    }
    if(empty($_POST["number"]))
    {
        $errors["numberError"] = "Fill in your number";
    }
    else{
        $usernumber = test_input($_POST['number']);
        if (!is_numeric($usernumber)) {
            $errors["numberError"] = "Only number allowed";
          }
    }
    if(array_filter( $errors ))
    {
        #
    }
    else {
        $sql = "INSERT INTO note_book(user_name,user_email,user_number) VALUES(' $username',' $useremail',' $usernumber')";
        if(mysqli_query($conn,$sql)){
            $saveMessage = "<div class='alert alert-danger'> Data saved <a class='close' data-dismiss='alert'>&times;</a></div>";
        }
    }   
  }
  mysqli_close($conn);
?>       
        <section class="container">
            <div class="row" >
    
                <div class="col-md-6 m-auto">   
                <div class="card wow zoomIn" >
                    <div class="card-title">
                        <h2 class="bg-success text-center text-white py-3">ADD A PERSON </h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                               <p><?php echo $saveMessage;?></p>
                               <span class="text-danger"><?php  echo $errors["nameError"];?></span>
                                <input type="text" class="form-control mb-2" placeholder="Enter name" name="name">
                                <span class="text-danger"><?php  echo $errors["emailError"];?></span>
                                <input type="email" class="form-control  mb-2" placeholder="Enter email" name="email">
                                <span class="text-danger"><?php  echo $errors["numberError"];?></span>
                                <input type="text" class="form-control  mb-2"  placeholder="Enter phone number" name="number">                              
                               <button type="submit" class="btn btn-success btn-md mt-3"  name="add">Add a person</button>
                        </form>
                    </div>                 
                 </div>

                </div>
            </div>
        </section>     
        <?php include "footer.php";?>
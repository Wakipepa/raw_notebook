<?php
  include_once ("heading.php");
  include_once "connection.php";

  $userId = mysqli_real_scape_string($conn,$_GET['idNumber']);

$sql = "SELECT * FROM note_book  WHERE id={$userId}";
  $result = mysqli_query($conn,$sql);
  
 while($row = mysqli_fetch_assoc($result)){
   $username= $row['user_name'];
   $useremail= $row['user_email'];
   $usernumber= $row['user_number'];
 }          
?>
        
        <section class="container" >
            <div class="row">

                <div class="col-md-6 m-auto" >
                <div class="card wow fadeInUp">
                    <div class="card-title">
                        <h3 class="bg-success text-center text-white py-3">UPDATING A PERSON </h3>
                    </div>
                    <div class="card-body m-2">
                        <form action="update.php?ID=<?php echo $userId;?>" method="post">
                                <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="<?php echo htmlspecialchars($username);?>">
                                <input type="email" class="form-control  mb-2" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($useremail);?>" >
                                <input type="text" class="form-control  mb-2"  placeholder="Enter phone number" name="number" value="<?php echo htmlspecialchars($usernumber);?>">
                               <button type="submit" class="btn btn-success btn-md mt-3"  name="update">Update</button>
                        </form>
                    </div>                 
                 </div>

                </div>
            </div>

        </section>

       

    <?php include "footer.php";?>

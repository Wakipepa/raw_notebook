<?php
  include_once ("heading.php");
  include_once "connection.php";
 
    $sql = "SELECT * FROM note_book";
    $result = mysqli_query($conn,$sql);
  
?>      
        <section class="container">
            <div class="row">
           
                <div class="col m-auto " >
                <div class="card wow zoomIn" >
                    <div class="card-title">
                        <h2 class="bg-success text-center text-white py-3">ALL PEOPLES </h2>
                    </div>
                
                    <div class="card-body m-2">
                    <?php if(mysqli_num_rows($result)>0):?>
                        <table class="table table-hover table-sm table-responsive-sm">
                            <thead class=" py-2">
                                <tr>
                                   
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>NUMBER</th>
                                    <th colspan=2>ACTION</th>
                                </tr>
                                </thead> 
                                <?php while($row = mysqli_fetch_assoc($result)):?>           
                                    <tbody>
                                        <tr>                                   
                                            <td><?php echo ucwords($row['user_name']);?></td>
                                            <td><?php echo $row['user_email'];?></td>
                                            <td><?php echo $row['user_number'];?></td>
                                            <td><a href="edit.php?idNumber=<?php echo $row['id'];?>" name="edit" class="btn btn-success btn-sm">Edit</a></td>
                                            <td><a href="delete.php?delNumber=<?php echo $row['id'];?>" name="delete" class="btn btn-danger  btn-sm">Delete</a></td>
                                        </tr>
                                       
                                    </tbody>
                                <?php endwhile;?>
                              

                        </table>
                        <?php else:?> 
                <div class='alert alert-danger'> Database is empty <a class='close' data-dismiss='alert'>&times;</a></div>;
                 <?php endif;?>
                        <a class="btn btn-success btn-md mt-3" href="index.php">Add a person</a>
                    </div> 
                              
                 </div>

                </div>
                </div>      
        </section>
       
        <?php include "footer.php";?>
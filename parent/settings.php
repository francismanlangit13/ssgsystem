<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

<div class="container-fluid px-4 mt">
<ol class="breadcrumb mb-4 mt-4">    
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active">Edit My Account</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>My Account</h5>
                    </div>
                    <div class="card-body">
                    <h2 hidden="true"><?php echo $_SESSION['auth_user']['user_id']; ?></h2>
                    <?php

                    $user_id = $_SESSION['auth_user']['user_id'];
                    $users = "SELECT * FROM `user` WHERE user_id=$user_id";
                    $users_run = mysqli_query($con, $users);
                            ?>
                            <?php
                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
            
                    <form action="code.php" method="POST" enctype="multipart/form-data">  
                    <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">
                    <div class="row"> 

                    <div class="col-md-4 mb-3">
                                    <label for="">First Name</label>
                                    <input required type="text" Placeholder="Enter First Name" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                                    <label for="">Middle Name</label>
                                    <input required type="text" Placeholder="Enter Middle Name" name="mname" value="<?= $user['mname']; ?>" class="form-control">
                    </div>

                    
                    <div class="col-md-4 mb-3">
                                    <label for="">Last Name</label>
                                    <input required type="text" Placeholder="Enter Last Name" name="lname" value="<?= $user['lname']; ?>" class="form-control">
                    </div>

                    
                    <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input required type="email" Placeholder="Enter Email Address" name="email" value="<?= $user['email']; ?>" class="form-control">
                    </div>

                    
                    <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input required type="password" Placeholder="Enter Password" name="password" value="<?= $user['password']; ?>" class="form-control">
                    </div>

                                   
                    <div class="col-md-6">
                                <label for="front">ID Picture(Front): </label>
                                <input type="file" name="front" id="front" accept=".jpg, .jpeg, .png" value="">
                    </div>

                    

                    <div class="col-md-6">
                                <label for="back">ID Picture(Back): </label>
                                <input type="file" name="back" id="back" accept=".jpg, .jpeg, .png" value="">
                    </div>


                    <div class="col-md-6">
                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['front']).'" 
                                        alt="image" style="height: 250px; max-width: 310px; object-fit: cover;">';
                                        ?>
                    </div>

                    <div class="col-md-6">
                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['back']).'" 
                                        alt="image" style="height: 250px; max-width: 310px; object-fit: cover;">';
                                        ?>
                    </div>

                     </div>   

                     <div class="text-right">
                                <a href="index.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_account" class="btn btn-primary">Save</button>
                                </div>
                               
                            </form>
                            <?php
                                }
                            }
                            else
                            {
                                ?>
                                <h4>No Record Found!</h4>
                                <?php
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php include('includes/footer.php');?>
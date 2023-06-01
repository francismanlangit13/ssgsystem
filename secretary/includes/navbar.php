<nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary noprint">
    <!-- Navbar Brand-->
    <div style="margin-left:1rem">
        <a href="<?php echo base_url ?>secretary/home/"><img id="cimg" class="img-fluid card-img-top" style="margin-right:-0.3rem;" src="<?php echo base_url ?>assets/files/images/system/ssg.png" alt="" class="img-fluid"></a>
        <a class="navbar-brand ps-2" href="<?php echo base_url ?>secretary/home/" style="font-size:13px; margin-bottom:1rem;">Supreme Student Government</a>
    </div>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group" hidden="true">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <?php if(isset($_SESSION['auth_user']))  ?>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                        $userID = $_SESSION['auth_user'] ['user_id'];
                        $query = "SELECT * FROM user where user_id = $userID";
                        $query_run = mysqli_query($con, $query);
                        $user = mysqli_num_rows($query_run) > 0;

                        if($user){
                            while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <img id="cimg" class="img-fluid card-img-top" src="<?php
                        if(isset($row['photo'])){
                            if(!empty($row['photo'])) {
                                echo base_url . 'assets/files/images/users/' . $row['photo'];
                        } else { echo base_url . 'assets/files/images/system/no-image.png'; } }
                    ?>"  alt="user-avatar">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?=$row['fname']?> <?=$row['lname']?></span>
                    <?php } } ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="settings"><i class="fas fa-user"></i> My Account</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
        </li>
    </ul>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        </button>
      </div>
      <div class="modal-body"> Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="<?php echo base_url ?>admin/home/code.php" method="POST">
          <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
    img#cimg{
        text-align: center;
        height: 2.3rem;
        width: 2.3rem;
        object-fit: cover;
        border-radius: 100% 100%;
        margin-right: 0.5rem;
        background-color: #fff;
        max-width: 100%;
    }
</style>
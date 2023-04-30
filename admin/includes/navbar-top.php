<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3"><H1 style="font-size: 15px; color: white;">Supreme Student Government</H1></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        $userID = $_SESSION['auth_user'] ['user_id'];
                        $query = "SELECT user.front FROM user where user_id = $userID";
                        $query_run = mysqli_query($con, $query);
                        $user = mysqli_num_rows($query_run) > 0;

                        if($user){
                            while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                        <img id="cimg" class="img-fluid card-img-top" src="data:image;base64,<?php echo base64_encode($row['front']) ?>"  alt="user-avatar">
                        <?php } } ?>
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['auth_user'] ['user_name'];  ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">My Account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        
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
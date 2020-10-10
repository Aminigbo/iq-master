<style type="text/css">
    a:hover{
        text-decoration: none;
        color: grey !important;
    }

    ::-webkit-scrollbar{
  width: 5px;
}

::-webkit-scrollbar-track{
  background-color: white;
}

::-webkit-scrollbar-thumb{
  background-color:#343a40;;
}

::-webkit-scrollbar-thumb:hover{
  background-color: #343a40;;
}


</style>


<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#343a40;">
    <a class="navbar-brand" href="./" style="font-weight:bold;font-size:25px;"><span style="color: crimson">IQ</span>Masta</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->

    <!--<a class="sideBar-back-btn" style="color: white;margin-left: 60px;font-weight: bold;font-size: 19px;" href="./"><i class="fa fa-angle-double-left"></i> <span style="font-size: ;">Back</span></a>

    <a class="sideBar-home-btn" style="color: white;margin-left: 60px;font-weight: bold;font-size: 19px;" href="../"><i class="fa fa-angle-double-left"></i> <span style="font-size: ;">Home</span></a>-->

    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Enter course code here..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div> 
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
             $session=$_SESSION['user']['id'];
             $sql1 = "SELECT * FROM dp WHERE user='$session'"; 
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1)) {
                 while ($row1=mysqli_fetch_assoc($result1)) {
                    $dp=$row1['dp'];

                    echo '<img src="'.$dp.'"  class="profile-img" style="height:20px;width:20px;border-radius:20px;" />';
                }
            }else{
                 echo '<img src="defaultimage1.png"  class="profile-img" style="height:20px;width:20px;border-radius:20px;" />';
            }

            ?>
                            
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="settings.php?ProfileSetting">Settings</a><a class="dropdown-item" href="activity.php">Activity Log</a>
                <div class="dropdown-divider"></div>
                <?php if (isLoggedIn()) {
                    ?><form method="POST">
                    <button name="Logout" type="submit" class="dropdown-item">Logout</button>
                </form><?php
                }else{
                    echo "<a href='../auth/login.php'>Sign In</a> ";
                } ?>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">




    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color:#343a40;color:white;">
            <div class="sb-sidenav-menu">
                <div class="nav">


                    <!-- user profile start -->
                    <div style="width:100%;display:flex;justify-content:center;margin-top:10px;margin-bottom:10px;">

                        <?php
                        $session=$_SESSION['user']['id'];
                        $sql1 = "SELECT * FROM dp WHERE user='$session'"; 
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1)) {
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $dp=$row1['dp'];

                                echo '<img src="'.$dp.'"  class="profile-img" />';
                            }
                        }else{
                            echo '<img src="defaultimage1.png"  class="profile-img" />';
                        }

                        ?>
                        

                        <script>
                            function preview_images(event) 
                            {
                                var reader = new FileReader();
                                reader.onload = function()
                                {
                                    var output = document.getElementById('add_preview_image');
                                    output.src = reader.result;
                                }
                                reader.readAsDataURL(event.target.files[0]);
                                $('.add-photo').show();
                                $('.ads-img2').show();
                                $('.input').hide();
                            }
                        </script>

                    </div>
                    <div style="width:100%;text-align:center;font-weight:bold;"><?php if (isLoggedIn()) {
                        echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];
                    } ?>

                    </div> 
 

                    <form method="POST" enctype="multipart/form-data"  action="scripts.php" style="text-align: center;">
                        <label style="cursor: pointer;margin-bottom: 40px;" class="input">
                            <input class="image-input-holder"  id="image-input-holder" accept="image/*" onchange="preview_images(event)" name="ad-image" type="file" style="display: none;">
                            <span style="font-weight: bold;font-size: 20px;" class="fa fa-camera" ></span>
                        </label>

                        <div class="add-photo" style="margin-bottom: 38px;display: none;background-color: white;">
                            <img id='add_preview_image' class='ads-img2' style="height: 60px;width: 60px;border-radius: 60px;">
                            <input type="submit" value="CONTINUE" style="margin-left: 10px;background-color: #1f253d;color: white;border:none;padding: 5px;border-radius: 10px;" class="add-photo" name="add-photo">
                        </div>
                    </form>

                    
                    <!-- user profile end -->


                    

                    <div class="sb-sidenav-menu-heading" style="border-top:1px solid #eee;margin-top: -10px;">Core</div>
                    <?php 

                    if (isset($_GET['prfile'])) {

                        echo '<a class="nav-link" style="color:white;opacity:;background-color:#eee;color:black;cursor:pointer;">
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                        Profile
                    </a>';

                    }else{

                        echo '<a class="nav-link" href="profiles.php?prfile" style="color:white;opacity:0.7;">
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                        Profile
                    </a>';

                    }

                    



                    if (isset($_GET['results'])) {

                        echo '<a class="nav-link" style="color:white;opacity:;background-color:#eee;color:black;cursor:pointer;">
                        <div class="sb-nav-link-icon"><i class="fa fa-pen"></i></div>
                        Results
                    </a>';

                    }else{

                        echo '<a class="nav-link" href="result-show.php?results" style="color:white;opacity:0.7;">
                        <div class="sb-nav-link-icon"><i class="fa fa-pen"></i></div>
                        Results
                    </a>';

                    }

                    ?>



                    <div class="sb-sidenav-menu-heading" style="margin-top: -1px;">Courses</div>
                    <a class="nav-link collapsed" style="color:white;opacity:0.7;" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                        Courses
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <?php
                                $sql = "SELECT * FROM xtra_categories WHERE type!='league' ORDER BY RAND() "; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) { 
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $category_code=$row['category_code'];
                                    $category=$row['category'];
                                    $status=$row['status'];
                                    $date=$row['date'];

                                        ?><a href="view-category.php?id=<?php echo $category_code; ?>" style="color: white;margin-top: 10px;"> <i class="fa fa-check" style="font-size: 1px;"></i> <span style="border: ;padding: 3px;color: white;border-radius: ;">
                                        <?php echo $category; ?></span>
                                        </a><?php

                                
                                } }
                                ?>
                            
                        </nav>
                    </div>
                    <a class="nav-link collapsed" style="color:white;opacity:0.7;" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                       IQ Leagues
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                             <?php
                                $sql = "SELECT * FROM xtra_categories WHERE type='league' ORDER BY RAND() "; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) { 
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $category_code=$row['category_code'];
                                    $category=$row['category'];
                                    $status=$row['status'];
                                    $date=$row['date'];

                                        ?><a href="league/?id=<?php echo $category_code; ?>" style="color:white;margin-top: ;">
                                            <div style="border-bottom: ;padding-left:20px;background-color:  ;height: 40px;padding-top:10px;"> <i class="fa fa-check-circle" style="font-size: 10px;"></i> <span style="border: ;padding: 3px;color: white;border-radius: ;">
                                        <?php echo $category; ?></span></div>
                                        </a><?php

                                
                                } }
                                ?>


                        </nav>
                    </div>
                    <br><br>

                    <form method="POST" style="text-align: center;">
                        <input style="width: 100px;background: crimson;border:none;padding: 10px 0px;color: white;font-weight: bold;border-radius:7px; " type="submit" name="Logout" value="Logout">
                    </form> 

                </div>
            </div>
        </nav>
    </div>
<?php 
session_start();
 /*
$dbservername = 'localhost';
 
 $dbusername = 'u0818697_viral';
 
 $dbpassword = 'viral123@';
 
 $dbname = 'u0818697_shareviral';
 $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
*/ 
$dbservername = 'localhost';
 
 $dbusername = 'root';
 
 $dbpassword = '';
 
 $dbname = 'shareviral'; 
 $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

 if (!isLoggedIn()) {
    header("location:../auth/login.php");
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header("location:../");
}



function isLoggedIn() 
  {
    if (isset($_SESSION['user'])) {
      return true;
    }else{
      return false;
    }
  }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        * {
            margin: 0;
            padding: 0;
        }


        /** start of other stylings **/






        /** end of other stylings **/





        /** start of  smaller screen*/
        @media only screen and (max-width: 690px) {

            .desktop-view-container {
                display: none;
            }

            table {
                display: ;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}


            .span{
                font-size: 20px;
                padding-top: 10px;

            }

            .profile-img {
                width: 50px;
                height: 50px;
                border-radius: 50px;
            }

            .ad-container {
                width: 90%;
                margin: auto;
                height: ;
                background-color: ;
            }

            .breadcrumb{
                margin-left: 10px;
            }

            .ad-img {
                width: 100%;
                max-height: 300px;
            }

            .ad-vid {
                width: 100%;
                max-height: 300px;
                margin-left: 10px;
            }

            .info-btn {
                padding: 5px;
                background-color: white;
                color: #009970;
                border: 1px solid #009970;
                border-radius: 50px;
                margin-left: 15px;
                margin-bottom: 10px;
                width: 100%;
            }

            .ad-description {
                width: 100%;
                padding: 10px;

            }

            .share-btn {
                width: 80%;
                padding: 10px;
                background-color: #009970;
                color: white;
                border: none;
                border-radius: 4px;
                box-shadow: 0px 5px 10px lightgrey;
            }

            .withinput{
                width: 60%;
            }

            .loader{
                padding:65% 0px;
            }
            .sideBar-home-btn{
    display: none;
}

.sideBar-back-btn{
    display: none;
} 

        }

        /** end of smaller screen **/



        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {

            .mobile-view-container {
                display: none;
            }

            .profile-img {
                width: 100px;
                height: 100px;
                border-radius: 100px;
            }

            table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}


            .ad-container {
                width: 70%;
                margin: auto;
                height: ;
                background-color: ;
            }

            .ad-img {
                width: 100%;
                max-height: 300px;
            }

            .ad-vid {
                width: 100%;
                max-height: 300px;
            }

            .info-btn {
                padding: 5px;
                background-color: white;
                color: #009970;
                border: 1px solid #009970;
                border-radius: 50px;
                margin-left: 13px;
                margin-bottom: 10px;
                width: 30%;
            }
            



            .ad-description {
                width: 100%;
                padding: 10px;

            }
            .span{
                font-size: 35px;padding-top: 10px;

            }
            .advertiser{margin-left:28px;}

            .share-btn {
                width: 80%;
                padding: 10px;
                background-color: #009970;
                color: white;
                border: none;
                border-radius: 4px;
                box-shadow: 0px 5px 10px lightgrey;
                font-weight: bold;
                font-size: 20px;
            }


            .withinput{
                width: 40%;
            }
            .loader{
                padding: 25% 0px;
            }

            .all-transactions{
                padding-right:;
            }

.sideBar-home-btn{
    display: none;
}

        }



        /** end of bigger screen **/
    </style>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - ShareViral</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">


    <?php include 'sidebar.php'; ?>




    <div id="layoutSidenav_content">
        <main>
            






            <!-- start of ads container -->
            <div class="row" style="width: 100% !important;">

<div class="container-fluid" style="padding: ;">
                <h1 class="span" style="">Viral Extra Summary</h1>
                <ol class="breadcrumb mb-4" style="width: 100% !important;">
                    <li class="breadcrumb-item active">
                       ...<?php 
                                    $get=$_GET['cat'];
                                    $session_user=$_SESSION['user']['id'];


                                    $sql1 = "SELECT * FROM xtra_categories WHERE category_code='$get' "; 
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1)) {
                                        while ($row1=mysqli_fetch_assoc($result1)) {
                                            $category=$row1['category'];
                                            echo $category;
                                        }
                                    }

                                    ?>.
                    </li>
                </ol>
            </div>

                <!-- start of ads details -->
                <div class="col-sm-8" style="margin-bottom:50px;">
                    <div class="ad-container" style="width: 100% !important;text-align: center !important;">

                        <div style="width: ;height:;background-color:;position: relative;left:5%;border-radius: 10px;padding: 15px 2px;">

                            <?php

                            if (isset($_GET['trialComplete'])) {
                                ?><a class="" id="" data-category="<?php echo $_GET['cat']; ?>" data-user="<?php echo $_SESSION['user']['id']; ?>" style="padding: 5px 10px;background-color:#eee ;color: black;border-radius: 7px;cursor: pointer;cursor: no-drop;">Trial Completed</a><?php
                            }else{
                                ?><a href="test.php?cat=<?php echo $_GET['cat']; ?>" class="increase-counters" id="increase-counters" data-category="<?php echo $_GET['cat']; ?>" data-user="<?php echo $_SESSION['user']['id']; ?>" style="padding: 5px 10px;background-color:mediumseagreen ;color: white;border-radius: 7px;cursor: pointer;">RETRY</a><?php
                            }

                            ?>

                            <a  href="./" class="add-category" id="add-category" style="padding: 5px 10px;background-color:orange ;color: white;border-radius: 7px;cursor: pointer;margin-left: 10px;">CATEGORIES</a>

                        </div> <br>

                        <div class="all_cat" style="height: 400px;background-color: white;position: relative;width: ;left: 3%;text-align: left;padding-left: 5px;">
                            


                            <div style="font-weight: bold;border-bottom: 0.6px solid #eee;padding-bottom: 30px;">
                                <span style="color: orange;"><span>
                                    <?php 
                                    $sql2 = "SELECT * FROM answers WHERE category='$get' AND user='$session_user' "; 
                                    $result2 = mysqli_query($conn, $sql2);
                                    echo mysqli_num_rows($result2);
                                    ?>

                                </span> <span>Questtions</span> </span> 
                                <span style="margin-left:;float: right;color: mediumseagreen"><span>

                                    <?php 
                                    $sql2 = "SELECT * FROM answers WHERE category='$get' AND user='$session_user' AND remark='CORRECT' AND claim=0 "; 
                                    $result2 = mysqli_query($conn, $sql2);
                                     $sql1 = "SELECT * FROM xtra_categories WHERE category_code='$get' "; 
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1)) {
                                        while ($row1=mysqli_fetch_assoc($result1)) {
                                            $points=$row1['points'];
                                            $no_of_coins= mysqli_num_rows($result2)*$points;
                                            echo $no_of_coins;
                                            
                                        }
                                    }

                                     
                                    ?>

                                </span> <span>COINS</span>
                                <?php 
                                if (mysqli_num_rows($result2)) {
                                    if (isset($_GET['trialComplete'])) {
                                       ?><form method="POST" action="scripts.php">
                                    <button name="claim" type="submit" style="padding: 4px;background-color: mediumseagreen;color: white;font-weight: lighter;font-size: 12px;border-radius: 7px;cursor: pointer;margin-left: 20px;border:none;">CLAIM</button>
                                    <input style="display: none;" type="text" name="cat" value="<?php echo $_GET['cat']; ?>">
                                    <input style="display: none;" type="text" name="user" value="<?php echo $_SESSION['user']['id']; ?>">
                                    <input style="display: none;" type="text" name="amount" value="<?php echo $no_of_coins; ?>">
                                </form><?php
                                    }

                            /*if (isset($_POST['claim'])) {
                                $category  = mysqli_real_escape_string($conn, $_GET['cat']) ;
                                $user  = mysqli_real_escape_string($conn, $_SESSION['user']['id']) ;
                                $query = "UPDATE answers SET claim='1' WHERE category='$category' AND user='$user' AND remark='CORRECT' ";
                                mysqli_query($conn, $query);
                            }*/
                        }
                    ?>
                                
                            </span>
                                    
                            </div><br><br>

                            <div style="font-weight: bold;text-align: center;color: mediumseagreen;border-bottom: 0.6px solid #eee;padding-bottom: 30px;">
                                <span style="font-size: 30px;">

                                    <?php 
                                    $sql2 = "SELECT * FROM answers WHERE category='$get' AND user='$session_user' AND remark='CORRECT' "; 
                                    $result2 = mysqli_query($conn, $sql2);
                                    echo mysqli_num_rows($result2);
                                    ?>

                                </span> <span style="margin-left:15px;">CORRECT</span> <span style="" class="fa fa-check"></span>  
                                <?php 
                                    $sql2 = "SELECT * FROM answers WHERE category='$get' AND user='$session_user' AND remark='CORRECT' AND claim=1 "; 
                                    $sql3 = "SELECT * FROM answers WHERE category='$get' AND user='$session_user' AND remark='CORRECT'";

                                    $result2 = mysqli_query($conn, $sql2);
                                    $result3 = mysqli_query($conn, $sql3);

                                    $rs3=mysqli_num_rows($result2)*3;

                                if (mysqli_num_rows($result2)) { 
                                    echo "<br><span style='color:orange;margin-left:10px;font-size: 14px;font-weight:lighter;'>( ".$rs3."coins claimed )</span>";
                                }  ?>

                            </div><br><br>

                            <div style="font-weight: bold;text-align: center;color: crimson;border-bottom: 0.6px solid #eee;padding-bottom: 30px;">
                                <span style="font-size: 30px;">
                                    
                                    <?php 
                                    $sql2 = "SELECT * FROM answers WHERE category='$get' AND user='$session_user' AND remark='WRONG' "; 
                                    $result2 = mysqli_query($conn, $sql2);
                                    echo mysqli_num_rows($result2);
                                    ?>


                                </span> <span style="margin-left:15px;">WRONG</span>  <span style="" class="fa fa-times"></span>
                            </div>

                            <br><br>

                            <div style="font-weight: bold;text-align: right;color: crimson">

                                <a  href="../" class="add-category" id="add-category" style="padding: 5px 10px;background-color:#1f253d ;color: white;border-radius: 7px;cursor: pointer;margin-left: 10px;">BACK TO HOME</a>

                            </div>
                            
                        </div>
                        
                        



                        

                    </div>
                </div>
                <!-- end of ads details -->

                <!-- start of advertiser details -->
                <div class="col-sm-4" style="text-align: center!important;">



                    <!-- Illustrations -->
                    <div class="card shadow mb-4" style="width: 100% !important;margin-left: 3.4%;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span style="color:black;">Today's Leaders Board</span>
                            </h6>
                        </div>
                        <div class="card-body" style="padding: 0px;">

                               <?php
                               $get=$_GET['cat'];
                               $date=date("Y-m-d");
                               
                                $sql2 = "SELECT * FROM qst_counter WHERE category='$get' AND date='$date' ORDER BY rating DESC"; 
                                $result2 = mysqli_query($conn, $sql2);
                                if (mysqli_num_rows($result2)) {
                                while ($row1=mysqli_fetch_assoc($result2)) {
                                    $user=$row1['user'];
                                    $rating=$row1['rating'];
                                    $sql = "SELECT * FROM users WHERE id='$user'; "; 
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result)) {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            $firstname=$row['firstname'];
                                            $level=$row['level']; ?>

                                            <div style="text-align: left;font-weight: bold;margin-bottom: 10px;border:0.5px solid #eee;padding: 10px;">
                                                <span><?php echo $firstname ?></span>
                                                <?php
                                                if ($level=="NOVICE") {
                                       ?><div style="display: inline-block;height: 13px;width: 13px;border-radius: 13px;background-color: crimson;"></div><?php
                                    }elseif ($level=="PRO") {
                                       ?><div style="display: inline-block;height: 13px;width: 13px;border-radius: 13px;background-color: #009970;"></div><?php
                                    }elseif ($level=="EXPERT") {
                                        ?><div style="display: inline-block;height: 13px;width: 13px;border-radius: 13px;background-color: yellow;"></div><?php
                                    }elseif ($level=="MASTER") {
                                       ?><div style="display: inline-block;height: 13px;width: 13px;border-radius: 13px;background-color: blue;"></div><?php
                                    }elseif ($level=="LEGEND") {
                                        ?><div style="display: inline-block;height: 13px;width: 13px;border-radius: 13px;background-color: purple;"></div><?php
                                    }elseif ($level=="ULTIMATE") {
                                        ?><div style="display: inline-block;height: 13px;width: 13px;border-radius: 13px;background-color: #1f253d;"></div><?php

                                    }

                                                ?>
                                            
                                            <span style="float: right;margin-right: 15px;"><?php echo $rating ?></span>
                                            </div>

                                            <?php
                                        }
                                    }

                                }
                            }else{
                                echo "<div style='padding:120px 1px;text-align:center;font-weight:bold;color:crimson;'>NO PERTICIPANT</div>";
                            }

                                
                                ?>
                        </div>
                    </div>


                </div>
                <!-- end of advertiser details -->

            </div>
            <!-- end of ads container -->






        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; ShareViral</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
<i class="data" style="display: none;"></i>

<input type="text" value="<?php echo $_SESSION['user']['id'] ?>" class="userId" style="display: none;">
<div class="loader" style="position: fixed;background-color: rgb(0,0,0,0.5);height: 100%;width: 100%;left: 0px;bottom: 0px;z-index: 2000;text-align: center;display: none;">
    <img src="../auth/images/loader.gif" class="loaderimg" style="width:50px;height:50px;display:;">
</div>


<span class="data"></span>

    <input style="display: none;"  type="text" id="session_id" value="<?php 
    if (isLoggedIn()) {
        echo $_SESSION['user']['id'];
    }else{
        echo "";

    }

    ?>">

    
    <script>
         $(document).ready(function() {
            //alert("Hello");
            //alert("Hello");
            autoCheck();



function autoCheck(){
    userId=$('.userId').val(); 
        $.ajax({
            url:"scripts.php",
            method:"POST",
            async:false,
            data:{

                "userId":userId,
                "autoCheck":1
            },
            success:function(data){
                $('.data').html(data);
                //alert(user+"--"+number+"--"+name+"--"+type+"--"+bank);
            },
 
        });
}








 progressBar();
            //alert("ready");
            function progressBar(){
                session_id=$('#session_id').val();
                $.ajax({
                url:"../dashboard/scripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "session_id":session_id,
                    "progress":1,
                },
                success:function(data){
                    $('.data').html(data);
                    
                },
 
            });
            }


// setting interval for page reload.
            setInterval(function(){
                sessionDuration();
            }, 108000000)

            function sessionDuration(){
                session_id=$('#session_id').val();
                $.ajax({
                url:"../auth/script.php",
                method:"POST",
                async:false,
                data:{ 

                    "session_id":session_id,
                    "sessionDuration":1,
                },
                success:function(data){
                    $('.data').html(data);
                    
                },
 
            }); 
            }
            


            ///  progressing users level when they click on ads
            $(".increase-counter").click(function() {
                var increase_counter = $(this).attr('id');
                var category = $(this).data('category');
                var user = $(this).data('user');
                $.ajax({
                url:"scripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "increase_counter":increase_counter,
                    "category":category,
                    "user":user
                },
                success:function(data){
                    //alert(category+"--"+user);
                },
 
            }); 

            })





})

    </script>
</body>

</html>
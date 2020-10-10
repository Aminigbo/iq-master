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



function convertHarshtags($str){
    $regex="/#+([a-zA-Z0-9_]+)/";
    $str= preg_replace($regex, '<a style="font-weight:bold;font-size:16px;color:rgb(56,114,114);" href="tags.php?tag=$1">$0</a>', $str);
    return ($str);
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
                display: none;
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

.float{ 
    width: 96%;
    height: 130px;
    border-radius: ;
    background-color: ;
    position: relative;
    bottom: 2%;
    left: 6%;
    z-index: ;
}  

.sideBar-home-btn{
    display: none;
}



        }

        /** end of smaller screen **/



        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
        .float{ 
            width: 96%;
            height: 150px;
            border-radius: ;
            background-color: ;
            position: relative;
            bottom: 2%;
            left: 4%;
            z-index: ;
        }  
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
                <h1 class="span" style="">
                    <a style="color: #1f253d;cursor: pointer;font-weight: bold;font-size: 20px;">
                        #<?php echo $_GET['tag']; ?>
                    </a>
                </h1>
                <ol class="breadcrumb mb-4" style="width: 100% !important;">
                    <li class="breadcrumb-item active">
                        More than what you expect...
                    </li>
                </ol>
            </div>

                <!-- start of ads details -->
                <div class="col-sm-8" style="margin-bottom:50px;">


                        <div style="max-height: ;background-color: ;position: relative;width: 100%;overflow: auto;padding: 10px;">
                            <?php
                            $get="#".$_GET['tag'];
                                $sql = "SELECT * FROM coments WHERE coment LIKE '%$get%' ORDER BY id DESC"; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) {
                                    while ($row=mysqli_fetch_assoc($result)) {
                                        $date=$row['date'];
                                        $user=$row['user'];
                                        $category=$row['category'];
                                        $coment1=$row['coment'];
                                        $coment=convertHarshtags($coment1);

                                        $sql1 = "SELECT * FROM users WHERE id='$user'  "; 
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1)) {
                                            while ($row1=mysqli_fetch_assoc($result1)) {
                                                $firstname=$row1['firstname'];
                                                $level=$row1['level'];
                                                $user2=$row1['id'];

                                                $sql1 = "SELECT * FROM dp WHERE user='$user2'  "; 
                                                $result1 = mysqli_query($conn, $sql1);
                                                if (mysqli_num_rows($result1)) {
                                                    while ($row1=mysqli_fetch_assoc($result1)) {
                                                        $dp=$row1['dp']; ?>
                                                        <div style="margin-bottom: 20px;border-bottom: 0.5px solid #eee;padding: 10px;">
                                                            <div>
                                                                <img src="<?php echo $dp; ?>" style="height: 30px;width: 30px;border-radius: 30px;">
                                                                <span style="font-weight: bold;">
                                                                    <?php echo $firstname; ?>
                                                                </span>
                                                                <span>
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
                                                                </span>
                                                            </div>
                                                            <div style="padding-top: 4px;padding-left: 30px;font-weight: lighter;font-size: 14px;">
                                                                <?php echo $coment; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            ?>
                        </div>

                </div>
                <!-- end of ads details -->

                <!-- start of advertiser details -->
                <div class="col-sm-4" style="text-align: center!important;">




<?php
                                $sql = "SELECT * FROM xtra_categories"; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) { 
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $category_code=$row['category_code'];
                                    $category=$row['category'];
                                    $status=$row['status'];
                                    $date=$row['date']; ?>

                                    <!-- Illustrations -->
                    <div class="card shadow mb-4" style="width: 100% !important;margin-left: 3.4%;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span style="color:#1f253d;font-size: 20px;">Leaders Board</span>
                                <div style="font-size: 12px;font-weight: lighter;">
                                    ( <?php echo $category; ?> )
                                </div>
                            </h6>
                        </div>
                        <div class="card-body" style="padding: 0px;">
                            <?php
                            $date=date("Y-m-d");
                            $sql2 = "SELECT * FROM qst_counter WHERE  date='$date' AND category='$category_code' ORDER BY rating DESC"; 
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
                                            $level=$row['level'];
                                            $sql1 = "SELECT * FROM dp WHERE user='$user'"; 
                                            $result1 = mysqli_query($conn, $sql1);
                                            

                        ?>

                                            <div style="text-align: left;font-weight: bold;margin-bottom: 10px;border:0.5px solid #eee;padding: 10px;">
                                                <?php
                                                if (mysqli_num_rows($result1)) {
                                                while ($row1=mysqli_fetch_assoc($result1)) {
                                                $dp=$row1['dp'];

                                                echo '<img src="../viralextra/'.$dp.'"  class="profile-img"  style="height:30px;width:30px;border-radius:30px;"/> ';
                                            }
                                            }else{
                                                echo '<img src="../auth/images/defaultimage1.png"  class="profile-img" style="height:30px;width:30px;border-radius:30px;" /> ';
                                            }

                                                ?>
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

                                <?php
                                } }
                                ?>




                    

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
                url:"scripts.php",
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
            $(".progress1").click(function() {
                var progress1 = $(this).attr('id');
                session_id=$('#session_id').val();
                $.ajax({
                url:"scripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "session_id":session_id,
                    "progress1":progress1,
                },
                success:function(data){
                    
                },
 
            }); 

            })





})

    </script>
</body>

</html>
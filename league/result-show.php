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
 
 $dbname = 'iq_master'; 
 $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

 if (!isLoggedIn()) {
    header("location:login.php");
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header("location:login.php");
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

.float{ 
    width: 96%;
    max-height: 130px;
    border-radius: ;
    background-color: ;
    position: relative;
    bottom: 2%;
    left: 6%;
    z-index: ;
}

.category-holder{
    background-color: #eee;
    border-radius: 4px;
    padding: 10px;
    margin-bottom: 19px;
    margin-left: 4%;
    display:;
}

            .sideBar-home-btn{
    display: none;
}

.sideBar-back-btn{
    display: none;
}  

.desk-view{
    display: none;
}


}

        /** end of smaller screen **/



        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
        .float{ 
            width: 50%;
            max-height: 150px;
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

            .category-holder{background-color: #eee;border-radius: 4px;padding: 10px;margin-bottom: 19px;margin-left: 4%;display: inline-block;}

            .mob-view{
                display: none;
            }




        }
.sideBar-back-btn{
    display: none;
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




    <div id="layoutSidenav_content" style="height: 100vh !important;">
        <main>
            






            <!-- start of ads container -->
            <div class="row" style="width: 100% !important;">

                <!-- start of ads details -->
                <div class="col-sm-8" style="margin-bottom:50px;margin-top: 10px;">
                    <div class="ad-container" style="width: 100% !important;text-align: left !important;padding-bottom: 30px;margin-bottom: 20px;padding-left:20px;background-color: ">
                        


                        <!-- user profile start -->
                    <div style="width:100%;justify-content:;margin-top:10px;margin-bottom:10px;display: inline-block;">

                        <?php
                        $session=$_SESSION['user']['id'];
                        $sql1 = "SELECT * FROM dp WHERE user='$session'"; 
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1)) {
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $dp=$row1['dp'];

                                echo '<img src="../'.$dp.'"  class="profile-img" />';
                            }
                        }else{
                            echo '<img src="../defaultimage1.png"  class="profile-img" />';
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

                    <span style="font-weight: bold;margin-left: 20px;font-size: 22px;">
                        <?php if (isLoggedIn()) {
                        echo $_SESSION['user']['firstname']." ".$_SESSION['user']['lastname'];
                        } ?>
                    </span>

                 </div>   
                    
                    </div>

                    <div class="desk-view" style="background-color:;height: ;margin-left: 7%;box-shadow:;padding: 20px;opacity:;color: #343a40;">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="font-size: 15px;">
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Unit</th>
                                        <th>Score</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $user=$_SESSION['user']['id'];
                                $get=$_GET['id'];
                                $sql = "SELECT * FROM course_taken WHERE user='$user' AND category='$get' ORDER BY id DESC "; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) {
                                    while ($row=mysqli_fetch_assoc($result)) {
                                        $category=$row['category'];
                                        $user=$row['user'];
                                        $status=$row['status'];

                                        $sql2 = "SELECT * FROM answers WHERE category='$category' AND user='$user' AND remark='CORRECT' "; 
                                        $result2 = mysqli_query($conn, $sql2);
                                        if (mysqli_num_rows($result2)) {

                                            $count=mysqli_num_rows($result2); }else{
                                                $count=0;
                                            }


                                                
                                        $sql2 = "SELECT * FROM xtra_categories WHERE category_code='$category' "; 
                                        $result2 = mysqli_query($conn, $sql2);
                                        if (mysqli_num_rows($result2)) {
                                        while ($row=mysqli_fetch_assoc($result2)) {
                                        $category=$row['category'];
                                        $category_code=$row['category_code'];
                                        $points=$row['points'];
                                        $date=$row['date']; ?>

                                                <tr>
                                                    <td><?php echo $category_code; ?></td>

                                                    <td><?php echo $category; ?></td>

                                                    <td><?php echo $points; ?></td>
                                                    <td><?php echo $count; ?></td>
                                                    <td></td>
                                                    <td>Approved</td>
                                                </tr>


                                                <?php
                                            
                                        }
                                    }
                                }
                            }
                                



                                    ?>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    
                    <div class="mob-view" style="background-color:;height: ;margin-left: ;box-shadow:;padding: 20px;opacity:;color: #343a40;width: 340px;">

                        <div>
                            Your Resuls
                        </div>
                         <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="font-size: 15px;">
                                        <th>Code</th>
                                        <th>Title</th>
                                        <th>Unit</th>
                                        <th>Score</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $user=$_SESSION['user']['id'];
                                $sql = "SELECT * FROM course_taken WHERE user='$user' ORDER BY id DESC "; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) {
                                    while ($row=mysqli_fetch_assoc($result)) {
                                        $category=$row['category'];
                                        $user=$row['user'];
                                        $status=$row['status'];

                                        $sql2 = "SELECT * FROM answers WHERE category='$category' AND user='$user' AND remark='CORRECT' "; 
                                        $result2 = mysqli_query($conn, $sql2);
                                        if (mysqli_num_rows($result2)) {

                                            $count=mysqli_num_rows($result2); }else{
                                                $count=0;
                                            }


                                                
                                        $sql2 = "SELECT * FROM xtra_categories WHERE category_code='$category' "; 
                                        $result2 = mysqli_query($conn, $sql2);
                                        if (mysqli_num_rows($result2)) {
                                        while ($row=mysqli_fetch_assoc($result2)) {
                                        $category=$row['category'];
                                        $category_code=$row['category_code'];
                                        $points=$row['points'];
                                        $date=$row['date']; ?>

                                                <tr>
                                                    <td><?php echo $category_code; ?></td>

                                                    <td><?php echo $category; ?></td>

                                                    <td><?php echo $points; ?></td>
                                                    <td><?php echo $count; ?></td>
                                                    <td></td>
                                                    <td>Approved</td>
                                                </tr>


                                                <?php
                                            
                                        }
                                    }
                                }
                            }
                                



                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    

                </div>
                <!-- end of ads details -->

                <!-- start of advertiser details -->
                <div class="col-sm-4" style="text-align: center!important;">

                                    <!-- Illustrations -->
                    <div class="card shadow mb-4" style="width: 100% !important;margin-left: 3.4%;height: 400px !important;margin-top: 10px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span style="color:#1f253d;font-size: 20px;">Available Courses:</span>
                                
                            </h6>
                        </div>

                        <div class="card-body" style="padding: 0px;text-align: left; overflow: auto;">
                            
                            <?php
                                $sql = "SELECT * FROM xtra_categories ORDER BY RAND() "; 
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result)) { 
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $category_code=$row['category_code'];
                                    $category=$row['category'];
                                    $status=$row['status'];
                                    $date=$row['date'];

                                        ?><a href="view-category.php?id=<?php echo $category_code; ?>" style="color: #343a40;margin-top: ;">
                                            <div style="border-bottom: 0.5px solid #eee;padding-left:20px;background-color:  ;height: 40px;padding-top:10px;"> <i class="fa fa-check" style="font-size: 10px;"></i> <span style="border: ;padding: 3px;color: #343a40;border-radius: ;">
                                        <?php echo $category; ?></span></div>
                                        </a><?php

                                
                                } }
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
                    <div class="text-muted">Copyright &copy; <span style="color: crimson;">IQ</span>Master</div>
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







 $(".show-comment").click(function() {
    $('.send-comment').fadeIn(); 
    $('.comment-input').fadeIn();
    $('.comment-input').focus();
    $('.show-comment').hide();

})


///  updating bank details
    $(".send-comment").click(function() {
        var btn = $(this).attr('id');
        comment=$('.comment-input').val(); 
        user=$('#session_id').val();
        $.ajax({
            url:"scripts.php",
            method:"POST",
            async:false,
            data:{
                "send-comment":btn,
                "user":user,
                "comment":comment
            },
            success:function(data){
                $('.data').html(data);
                allComments();
                //alert(user+"--"+btn+"--"+comment);
            },
 
        });

    })


// setting interval for page reload.
setInterval(function(){
    allComments();
}, 1000)

allComments();
function allComments(){
    $.ajax({
        url:"scripts.php",
        method:"POST",
        async:false,
        data:{
            "allComments":1
        },
        success:function(data){
            $('.all_comments').html(data);
            //alert(user+"--"+number+"--"+name+"--"+type+"--"+bank);
        },
    });
}








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








})

    </script>
</body>

</html>
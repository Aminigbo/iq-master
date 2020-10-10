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

            .align{
                margin-left: 20%;
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
                <h1 class="span" style="">IQMaster Admin Panel</h1>
                <ol class="breadcrumb mb-4" style="width: 100% !important;">
                    <li class="breadcrumb-item active">
                        Control the IQMaster...
                    </li>
                </ol>
            </div>

                <!-- start of ads details -->
                <div class="col-sm-8" style="margin-bottom:50px;">
                    <div class="ad-container" style="width: 100% !important;text-align: center !important;">
                           
                        <?php
                        $get=$_GET['code'];
                        $sql = "SELECT * FROM xtra_categories WHERE category_code='$get' "; 
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                $date=$row['date'];
                                $category=$row['category'];
                                $no_of_qst=$row['no_of_qst'];
                                $status=$row['status'];
                                $category_code=$row['category_code'];
                           
                        ?>

                        <div style="width: 290px;height:;background-color: #eee;position: relative;left:5%;border-radius: 10px;padding: 15px 2px;">
                           Added : <?php echo $date; ?>
                           <br>
                           <span> <?php  ?></span>
                        </div> <br>

                        <div class="" style="height: 500px;background-color: ;position: relative;width: ;left: 3%;text-align: left;padding-left: 5px;padding-bottom: 200px;">
                            <div style="font-weight: bold;color: grey;">
                                ADD A QUESTION
                            </div><br>


                            <div class="align" style="width: 290px;height:;background-color: ;position: relative;left:5%;border-radius: 10px;padding: 15px 2px;text-align: center;">

                                 <textarea class="category-input" type="text" placeholder="Enter your question here" id="" class="" style="margin-left:;width: 100%;height: 90px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;"></textarea><br><br>

                                 <input class="option1" type="text" placeholder="option 1" id="" class="" style="margin-left:8%;width: 90%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;"><br><br>

                                 <input class="option2" type="text" placeholder="option 2" id="" class="" style="margin-left:8%;width: 90%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;"><br><br>

                                 <input class="option3" type="text" placeholder="option 3" id="" class="" style="margin-left:8%;width: 90%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;"><br><br>

                                 <input class="option4" type="text" placeholder="option 4" id="" class="" style="margin-left:8%;width: 90%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;"><br><br>

                                 <select  class="correct-answer" type="text" placeholder="option 4" id="" class="" style="margin-left:8%;width: 40%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;font-size: 14px;">
                                     <option>--ANSWER--</option>
                                     <option>1</option>
                                     <option>2</option>
                                     <option>3</option>
                                     <option>4</option>
                                 </select>

                                 
                                 
                                  <select  class="sN" type="text" placeholder="" id="" class="" style="margin-left:8%;width: 40%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;">
                                     
                                 </select><br><br>

                                 <input style="display:none;" class="category" type="text" value="<?php echo $_GET['code']; ?>">

                                 <input value="Add question" class="add-question" type="button" id="add-question" style="margin-left:8%;width:;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;background-color: #1f253d;color: white;"><br><br>



                            </div>
                            
                        </div>
                        
                        <?php

                        } }


                        ?>


                    </div>
                </div>
                <!-- end of ads details -->

                <!-- start of advertiser details -->
                <div class="col-sm-4" style="text-align: center!important;">



                    <!-- Illustrations -->
                    <div class="card shadow mb-4" style="width: 100% !important;margin-left: 3.4%;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span style="color:black;">Sharing Info</span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="assets/img/undraw_share.svg" alt="" />
                            </div>
                            <p style="text-align: left;">
                                You can share a maximum of 5 different ads per day on Facebook.<br>
                                Make sure to provide your Facebook profile link before requesting for withdrawal.
                            </p>
                            <a target="_blank" rel="nofollow" href="https://undraw.co/">Read up about shareViral &rarr;</a>
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


   ///  progressing users level when they click on ads
            $(".add-question").click(function() {
                var add_question = $(this).attr('id');
                question=$('.category-input').val();
                option1=$('.option1').val();
                option2=$('.option2').val();
                option3=$('.option3').val();
                option4=$('.option4').val();
                category=$('.category').val();
                sN=$('.sN').val();
                correct_answer=$('.correct-answer').val();
                $.ajax({
                url:"leagueScripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "add_question":add_question,
                    "question":question,
                    "option1":option1,
                    "option2":option2,
                    "option3":option3,
                    "option4":option4,
                    "category":category,
                    "sN":sN,
                    "correct_answer":correct_answer
                },
                success:function(data){
                    $('.data').html(data);
                    autoSn();
                    $('.category-input').val("");
                    $('.option1').val("");
                    $('.option2').val("");
                    $('.option3').val("");
                    $('.option4').val("");

                    
                },
 
            }); 

            })


autoSn();

function autoSn(){
    category=$('.category').val(); 
        $.ajax({
            url:"leagueScripts.php",
            method:"POST",
            async:false,
            data:{

                "category":category,
                "autoSn":1
            },
            success:function(data){
                $('.sN').html(data);
                //alert(user+"--"+number+"--"+name+"--"+type+"--"+bank);
            },
 
        });
}


})

    </script>
</body>

</html>
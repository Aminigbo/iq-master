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

            .profile-img {
                width: 50px;
                height: 50px;
                border-radius: 50px;
            }


            .category-title {
                width: 100%;
                padding: 10px;
                color: black;
                text-align: center;
                font-weight: 600;
                font-size: 30px;
            }


            .category-container {
                width: 90%;
                padding: 10px;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;
                margin: auto;
            }

            .category-box {
                padding: 10px;
                border: 1px solid lightgrey;
                border-radius: 7px;
                margin-right: 10px;
                font-size: 18px;
                margin-bottom: 10px;
            }

            .category-box:hover {
                background-color: #009970;
                color: white;
                cursor: pointer;

            }

            .active {
                border: 1px solid #009970;
            }

            .category-box-title {
                padding: 10px;
                text-align: center;

            }






            .category-box2 {
                padding: 10px;
                border: 1px solid lightgrey;
                border-radius: 7px;
                margin-right: 10px;
                font-size: 18px;
                margin-bottom: 10px;
            }

            .category-box2:hover {
                background-color: crimson;
                color: white;
                cursor: pointer;

            }

            .active {
                border: 1px solid #009970;
            }

            .category-box-title {
                padding: 10px;
                text-align: center;

            }


            .comment-title {
                padding: 10px;
                color: black;
                font-weight: 600;
                font-size: 20px;
                margin-top: 30px;
            }

            .comment-container {
                width: 100%;
                padding: 10px;
            }

            .comment-field {
                width: 80%;
                margin: auto;
            }

            .comment-submit-btn {
                padding: 7px;
                background-color: #009970;
                color: white;
                border: none;
                border-radius: 3px;
            }

            .commenter-box {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
            }

            .commenter-img {
                width: 40px;
                height: 40px;
                border-radius: 40px;
            }

            .commenter-name {
                font-weight: 600;
                position: relative;
            }

            .commenter-message {
                width: 100%;
                padding: 10px;
                color: rgb(70, 70, 70);
            }
            .sideBar-home-btn{
    display: none;
}

.sideBar-back-btn{
    display: none;
}

.all_comments{
    margin-left:;
    width: 110%;
}

.sidebar{
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


            .category-title {
                width: 100%;
                padding: 10px;
                color: black;
                text-align: center;
                font-weight: 600;
                font-size: 30px;
            }


            .category-container {
                width: 80%;
                padding: 10px;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;
                margin: auto;
            }

            .category-box {
                padding: 10px;
                border: 1px solid lightgrey;
                border-radius: 7px;
                margin-right: 10px;
                font-size: 20px;
                margin-bottom: 10px;
            }

            .category-box:hover {
                background-color: #009970;
                color: white;
                cursor: pointer;

            }

            .active {
                border: 1px solid #009970;
            }

            .category-box-title {
                padding: 10px;
                text-align: center;

            }




            .category-box2 {
                padding: 10px;
                border: 1px solid lightgrey;
                border-radius: 7px;
                margin-right: 10px;
                font-size: 20px;
                margin-bottom: 10px;
            }

            .category-box2:hover {
                background-color: crimson;
                color: white;
                cursor: pointer;

            }

            .active {
                border: 1px solid #009970;
            }

            .category-box-title {
                padding: 10px;
                text-align: center;

            }



            .comment-title {
                width: 50%;
                margin: auto;
                padding: 10px;
                color: black;
                font-weight: 600;
                font-size: 20px;
                margin-top: 30px;
                margin-right: 50%;
            }

            .comment-container {
                width: 70%;
                margin: auto;
                padding: 10px;
                margin-right: 30%;

            }



            .comment-submit-btn {
                padding: 7px;
                background-color: #009970;
                color: white;
                border: none;
                border-radius: 3px;
                font-size: 18px;
            }

            .comment-field {
                width: 50%;
                margin: auto;
                background-color: red;
            }

            .commenter-box {
                width: 100%;
                padding: 10px;
                margin-bottom: 5px;
            }

            .commenter-img {
                width: 40px;
                height: 40px;
                border-radius: 40px;
            }

            .commenter-name {
                font-weight: 600;
                position: relative;
            }

            .commenter-message {
                width: 100%;
                padding: 10px;
                color: rgb(70, 70, 70);
            }
            .sideBar-back-btn{
    display: none;
}

.all_comments{
    margin-left: 0%;
    width: 100%;
}

.cat_holder{
    display: none;
}

        }



        /** end of bigger screen **/


a:hover{
    text-decoration: none !important;
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
            


            
            <div class="sidebar" style="background-color: ;width: 25%;height: 100%;border-left: 0.5px solid #eee;position: fixed;right: 0px;z-index: 0;overflow: auto;padding-left: 10px;padding-bottom:9%;top: 0px;padding-top: 5%;">

                <div class="category-title" style="position: fixed;background-color: white;right: 0px;width: 23%;text-align: left;font-weight: lighter;color: grey;font-size: 16px;">COURSE DESCRIPTION</div>
                <br><br><br>
                <?php
                        $get=$_GET['id'];
                        $sql = "SELECT * FROM xtra_categories WHERE category_code='$get' "; 
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                $date=$row['date'];
                                $category=$row['category'];
                                $no_of_qst=$row['no_of_qst'];
                                $status=$row['status'];
                                $points=$row['points'];
                                $category_code=$row['category_code'];
                                $host=$row['host'];

                                $sql1 = "SELECT * FROM users WHERE id='$host'  "; 
                                $result1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($result1)) {
                                    while ($row1=mysqli_fetch_assoc($result1)) {
                                        $firstname=$row1['firstname'];
                                        $lastname=$row1['lastname'];
                                    }
                                }
                                ?>
                                

                                <div style="margin-top: 20px;text-align: left;padding-left: ;">

                                    <span>Code</span> <span style="margin-left: 45px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $category_code; ?></span><br>

                                    <span>Title</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $category; ?></span><br>

                                    <span>Question</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $points; ?></span><br>

                                    <span>Duration</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;">300sec</span><br><br>

                                    <span>Examiner</span>:<br> <span style="margin-left: 20px;font-weight:bold ;font-size: ;color: #343a40;"><?php echo $firstname; ?> <?php echo $lastname; ?> </span>

                                </div>


                                <?php 
                            }
                        }
                           
                        ?>

            </div>


            <!-- start of ads container -->
            <div class="row" style="width: 100% !important;padding: 30px;display: inline-block;">

            

                <div class="cat_holder" style="display: ;text-align: right !important;background-color: ;">
                


    
    
    <!-- start of category container -->
    <div class="category-container" style="height:;background-color: ;box-shadow: 0px 2px 4px grey;width: 100%;margin-left: 3%;border-radius: 5px;text-align: left;margin-bottom: 20px;">

        <div class="category-title" style="font-weight: bold;font-size: 17px;">COURSE DESCRIPTION</div>
         <?php
                        $get=$_GET['id'];
                        $sql = "SELECT * FROM xtra_categories WHERE category_code='$get' "; 
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                $date=$row['date'];
                                $category=$row['category'];
                                $no_of_qst=$row['no_of_qst'];
                                $status=$row['status'];
                                $points=$row['points'];
                                $category_code=$row['category_code'];
                                $host=$row['host'];

                                $sql1 = "SELECT * FROM users WHERE id='$host'  "; 
                                $result1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($result1)) {
                                    while ($row1=mysqli_fetch_assoc($result1)) {
                                        $firstname=$row1['firstname'];
                                        $lastname=$row1['lastname'];
                                    }
                                }
                                ?>
                                

                                <div style="margin-top: 20px;text-align: left;padding-left: ;">

                                    <span>Code</span> <span style="margin-left: 45px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $category_code; ?></span><br>

                                    <span>Title</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $category; ?></span><br>

                                    <span>Question</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $points; ?></span><br>

                                    <span>Duration</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;">300sec</span><br><br>

                                    <span>Examiner</span>:<br> <span style="margin-left: 20px;font-weight:bold ;font-size: ;color: #343a40;"><?php echo $firstname; ?> <?php echo $lastname; ?> </span>

                                </div>


                                <?php 
                            }
                        }
                           
                        ?>
    </div>
    </div>
    <!-- end of category container -->




    <!-- start of comments section -->
    
    <div class="comment-container">

<div style="height: ;background-color:;width: 100%;color: crimson;">

    Read carefully the instructions before taking the test...<br>
    30 questions in total. Each question carries 2 marks.<br>
    300sec/ course

    <div style="width: 40%;border:2px solid maroon;margin-top: 10px;"></div>


</div>


<div style="width: ;height:;background-color: ;position: relative;left:5%;border-radius: 10px;padding: 15px 2px;font-weight: bold;font-size: 18px;">
                           <?php
                        $get=$_GET['id'];
                        $user=$_SESSION['user']['id'];
                        $sql = "SELECT * FROM answers WHERE category='$get' AND user='$user' "; 
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {

                           ?>
                           <br>
                           <a href="result-show.php?id">
                            <input value="See Result" class="add-question" type="button" id="add-question" style="margin-left:;width:;height: 40px;border-radius: 7px;border:0.5px solid orange;padding: 2px 4px;background-color: orange;color: white;opacity:;cursor:pointer;">
                        </a>

                            <a class="start retryExa" data-category="<?php echo $get; ?>" data-user="<?php echo $user; ?>" href="test.php?cat=<?php echo $get ?>"><input value="Retry Exam" class="add-question" type="button" id="add-question" style="margin-left:;width:;height: 40px;border-radius: 7px;border:0.5px solid mediumseagreen;padding: 2px 4px;background-color:mediumseagreen;color: white;"></a>

                            <?php

                        }else{

                            ?>
                            <br>
                            <a class="start" data-category="<?php echo $get; ?>" data-user="<?php echo $user; ?>" href="test.php?cat=<?php echo $get ?>"><input value="Start Examination" class="add-question" type="button" id="add-question" style="margin-left:;width:;height: 40px;border-radius: 7px;border:0.5px solid mediumseagreen;padding: 2px 4px;background-color:mediumseagreen;color: white;"></a>
                            <?php

                        }
                           
                        ?>
                        
                        </div>




<div class="comment-title"><i> <i class="i2"></i> Comments</i></div>
        <textarea class="form-control comment-field comment-input" style="" placeholder="type a comment.."></textarea>
        <div style="width:100%;margin:auto;margin-top:10px;">
            <button class="comment-submit-btn  send-comment"  id="send-comment" >submit</button><br>
            <span style="margin-left: 10px;color: mediumseagreen;display: none;" class="success" >Comment sent..</span>
            <span style="margin-left: 10px;color: crimson;display: none;" class="error" >Empty field..</span>
        </div>
        <br>


        <div class="all_comments" style="box-shadow: 0px 2px 4px grey;">

             <!-- comment 1-->

        </div>
       


    </div>
    <!-- end of comments section -->



            </div>
            <!-- end of ads container -->






        </main>
        <footer class="py-4 bg-light mt-auto" style="z-index: 200 !important;">
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




            $(".start").click(function() {
                var category = $(this).data('category');
                var user = $(this).data('user');
                var qst = "0";
                var ans ="0";
                choice="1";

                //alert(Inc);

                $.ajax({
                url:"scripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "auto_insert_answered_questions":1,
                    "qst":qst,
                    "choice":choice,
                    "ans":ans,
                    "category":category,
                    "user":user
                },
                success:function(data){
                },
 
            });

                })



$(".retryExa").click(function() {
    var category = $(this).data('category');
    var user = $(this).data('user');
    $.ajax({
    url:"scripts.php",
    method:"POST",
    async:false,
    data:{

        "clear_cach":category,
        "user":user
    },
    success:function(data){
        $('.data').html(data);
        //alert("hello");
    },
 
    });
})






 $(".coming-soon").click(function() {
    alert("Will be made active soon");

 })


 $(".show-comment").click(function() {
    $('.send-comment').fadeIn(); 
    $('.comment-input').fadeIn();
    $('.comment-input').focus();
    $('.show-comment').hide();

})





///  updating bank details
    $(".qst_counter").click(function() {
        var qst_counter = $(this).attr('id');
        user=$('#session_id').val();
        $.ajax({
            url:"scripts.php",
            method:"POST",
            async:false,
            data:{
                "qst_counter":qst_counter,
                "user":user,
            },
            success:function(data){
            },
 
        });

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
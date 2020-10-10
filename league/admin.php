<?php 
session_start();
 /*
$dbservername = 'localhost';
 
 $dbusername = 'u0818697_diqmaster';
 
 $dbpassword = 'iqmaster123@';
 
 $dbname = 'u0818697_iqmaster';
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
                display: ;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

.col-sm-4{
    margin-top: -290px !important;
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
                <h1 class="span" style="">Admin Panel</h1>
                <ol class="breadcrumb mb-4" style="width: 100% !important;">
                    <li class="breadcrumb-item active">
                        Control the ViralExtra...
                    </li>
                </ol>
            </div>

                <!-- start of ads details -->
                <div class="col-sm-8" style="margin-bottom:3px;">
                    <div class="ad-container" style="width: 100% !important;text-align: center !important;">

                        <div style="width: 310px;height:;background-color: #eee;position: relative;left:5%;border-radius: 10px;padding: 15px 2px;">
                            <input class="category-input" type="text" placeholder="Enter category" id="" class="" style="width: 70%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;">

                             <input class="point-input" type="number" placeholder="Points" style="width: 30%;height: 40px;border-radius: 7px;border:0.5px solid #1f253d;padding: 2px 4px;">

                            <span class="add-category" id="add-category" style="padding: 5px 10px;background-color:#1f253d ;color: white;border-radius: 7px;cursor: pointer;">DONE</span>
                        </div> <br>

                        <div class="all_cat" style="height: 500px;background-color: ;position: relative;width: ;left: 3%;text-align: left;padding-left: 5px;">
                            
                        </div>
                        
                        


                    </div>
                </div>
                <!-- end of ads details -->


            </div>
            <!-- end of ads container -->






        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy;  <span style="color: crimson;">IQ</span>Master</div>
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







 progressBar();
            //alert("ready");
            function progressBar(){
                session_id=$('#session_id').val();
                $.ajax({
                url:"leagueScripts.php",
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

            function all_category(){
                $.ajax({
                url:"leagueScripts.php",
                method:"POST",
                async:false,
                data:{ 
                    "all_category":1,
                },
                success:function(data){
                    $('.all_cat').html(data);
                    
                },
 
            }); 
            }

            all_category();





            ///  progressing users level when they click on ads
            $(".add-category").click(function() {
                var add = $(this).attr('id');
                input=$('.category-input').val();
                point=$('.point-input').val();
                $.ajax({
                url:"leagueScripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "add":add,
                    "input":input,
                    "point":point,

                },
                success:function(data){
                    //alert(input)
                    all_category();
                    $('.category-input').val("");
                    $('.point-input').val("");
                    $('.data').html(data);
                    
                },
 
            }); 

            })





})

    </script>
</body>

</html>
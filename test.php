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
            .preloader{
                width: 30%;
            }

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


        }

        /** end of smaller screen **/



        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .preloader{
                width: 5%;
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


<!-- webcam API -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

</head>

<body class="sb-nav-fixed">


    <?php //include 'sidebar.php'; ?>




    <div id="layoutSidenav_content">
        <main>
            






            <!-- start of ads container -->
            <div class="row" style="width: 100% !important;">

                <div class="container-fluid" style="padding: ;">
                <h1 class="span" id="timer" style="display: inline-block;"></h1>


                <!--<span class="question-counters">

                    <h1  style='margin-left:120px;font-size:20px;font-weight:bold;text-align:left;color:white;display:inline-block;background-color:crimson;padding:7px;border-radius:8px;'>
                        <span class="qst-cntr">1 </span>
                        <span style='margin-left:;'> / </span><span style='margin-left:;'>15</span></h1>
                    
                </span>-->

                <div id="camera" style="float: right;border-radius: 70px;position: fixed;bottom: 0px;right: 0px;z-index: 10000"><br>

                    <!-- <p><button id="btnStart">START RECORDING</button><br/>
                    <button id="btnStop">STOP RECORDING</button></p> -->

                    <video controls id="vid1" style="display: ;"></video>
        
                    <video id="vid2" controls style="display: none"></video>
                </div>


                <input value="1" type="text" class="sn" style="margin-left: 30px;display:none;">
                    


                <ol class="breadcrumb mb-4" style="width: 100% !important;">
                    <li class="breadcrumb-item active">
                        Once you leave this page, it is assumed that you are done with this examination
                        <span class="ctn"></span>
                    </li>
                </ol>
            </div>

                <!-- start of ads details -->
                <div class="col-sm-8" style="margin-bottom:50px;">
                    <div class="ad-container" style="width: 100% !important;text-align: center !important;">

                        <input type="text" value="" class="choice" id="choice" style="display: none;">

                        
                        <div class="question-holder" style="width: ;height:;background-color: ;position: relative;left:5%;border-radius: 10px;padding: 15px 2px;font-weight: bold;font-size: 18px;">
                           <?php
                        $get=$_GET['cat']; 
                        $session_user=$_SESSION['user']['id'];
                        echo $get;

                        
                        ?>
 
                </div> <br><br>


                    </div>
                </div>
                <!-- end of ads details -->

                <!-- start of advertiser details -->
                <div class="col-sm-4" style="text-align: center!important;">



                    <!-- Illustrations -->
                    <div class="card shadow mb-4" style="width: 100% !important;margin-left: 3.4%;height: 400px !important;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <span style="color:black;">COURSE DESCRIPTION</span>
                            </h6>
                        </div>
                        <div class="card-bodys" style="padding: 0px;">
                            <?php
                        $get=$_GET['cat'];
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
                                

                                <div style="margin-top: 20px;text-align: left;padding-left: 20px;">

                                    <span>Code</span> <span style="margin-left: 45px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $category_code; ?></span><br><br>

                                    <span>Title</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $category; ?></span><br><br>

                                    <span>Unit</span> <span style="margin-left: 50px;font-weight: bold;font-size: 16px;color: #343a40;"><?php echo $points; ?></span><br><br>

                                    <span>HOST</span>:<br> <span style="margin-left: 20px;font-weight:bold ;font-size: ;color: #343a40;"><?php echo $firstname; ?> <?php echo $lastname; ?> </span><br><br>

                                </div>


                                <?php 
                            }
                        }
                           
                        ?>
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

  


<input type="text" value="<?php echo $_GET['cat'] ?>" class="qst_category" style="display: none;">
<input type="text" value="<?php echo $_SESSION['user']['id']; ?>" class="user" style="display: none;">

<div class="time-up" style="position: fixed;width: 100%;padding:20% 30px;background-color: rgb(0,0,0,0.7);color: white;left: 0px;top: 0%;height: 100%;text-align: center;font-weight: bold;font-size: 30px;z-index: 1000;display: none;">
  <span class="report">TIME UP.</span><br>
  <img class="preloader" src="preloader.gif" style="width:;display: none;">
</div>

<script>

let constraintObj = { 
            audio: true,
            download: true,
            video: { 

                facingMode: "user", 
                width: { min: 120, ideal: 120, max: 120 },
                height: { min: 90, ideal: 90, max: 90 } 
            } 
        }; 
        // width: 1280, height: 720  -- preference only
        // facingMode: {exact: "user"}
        // facingMode: "environment"
        
        //handle older browsers that might implement getUserMedia in some way
        if (navigator.mediaDevices === undefined) {
            navigator.mediaDevices = {};
            navigator.mediaDevices.getUserMedia = function(constraintObj) {
                let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
                if (!getUserMedia) {
                    return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
                }
                return new Promise(function(resolve, reject) {
                    getUserMedia.call(navigator, constraintObj, resolve, reject);
                });
            }
        }else{
            navigator.mediaDevices.enumerateDevices()
            .then(devices => {
                devices.forEach(device=>{
                    console.log(device.kind.toUpperCase(), device.label);
                    //, device.deviceId
                })
            })
            .catch(err=>{
                console.log(err.name, err.message);
            })
        }

        navigator.mediaDevices.getUserMedia(constraintObj)
        .then(function(mediaStreamObj) {
            //connect the media stream to the first video element
            let video = document.querySelector('video');
            if ("srcObject" in video) {
                video.srcObject = mediaStreamObj;
            } else {
                //old version
                video.src = window.URL.createObjectURL(mediaStreamObj);
            }
            
            video.onloadedmetadata = function(ev) {
                //show in the video element what is being captured by the webcam
                video.play();
            };
            
            //add listeners for saving video/audio
            // let start = document.getElementById('btnStart');
            // let stop = document.getElementById('btnStop');
            let vidSave = document.getElementById('vid2');
            let mediaRecorder = new MediaRecorder(mediaStreamObj);
            let chunks = [];

            $(document).ready(function() {
                mediaRecorder.start();
                console.log(mediaRecorder.state);
                $('#vid2').hide();
            })


            
            // start.addEventListener('click', (ev)=>{
            //     mediaRecorder.start();
            //     console.log(mediaRecorder.state);
            // })

            // stop.addEventListener('click', (ev)=>{
            //     mediaRecorder.stop();
            //     console.log(mediaRecorder.state);
            //     $('#vid1').hide();
            //     $('#vid2').show();
            // });




document.getElementById('timer').innerHTML = 00+":"+15;
 startTimer();
 
 function startTimer() {
 var presentTime = document.getElementById('timer').innerHTML;
 var timeArray = presentTime.split(/[:]+/);
 var m = timeArray[0];
 var s = checkSecond((timeArray[1] - 1));
 //if(s==59){m=m-1}
 //if(m<0){alert('timer completed')}
 
 document.getElementById('timer').innerHTML =
 00 + ":" + s;
 //console.log(m)
 setTimeout(startTimer, 1000);
 }
 
 function checkSecond(sec) {
 if (sec < 10 && sec >= 0) {sec = "" + sec}; // add zero in front of numbers < 10
 if (sec < 0) {
    $(".time-up").fadeIn();


mediaRecorder.ondataavailable = function(ev) {
                chunks.push(ev.data);
            }
            mediaRecorder.onstop = (ev)=>{
                let blob = new Blob(chunks, { 'type' : 'video/mp4;' });
                chunks = [];
                // console.log(blob);
                let videoURL = window.URL.createObjectURL(blob);
                vidSave.src = videoURL;
                console.log(vidSave.src);
                // vidSave.save();
            }


    setTimeout(show_loader, 2000);
    function show_loader(){
        $(".preloader").fadeIn();
    }

    setTimeout(redirect, 4000);
    function redirect(){ 
        // window.location= vidSave.src;
        window.location = "result-show.php?id";
    }

    mediaRecorder.stop();
    console.log(mediaRecorder.state);
    $('#vid1').hide();
    $('#vid2').show();

    exit();




};
 return sec;
 }








            
        })
        .catch(function(err) { 
            console.log(err.name, err.message); 
        });




















$(document).ready(function() {




allQuestions();

questionCounter();
leadersBoard()

 

 function allQuestions(){
                qst_category=$(".qst_category").val();
                user=$(".user").val();
                sn=$(".sn").val();

                $.ajax({
                url:"scripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "allQuestions":1,
                    "qst_category":qst_category,
                    "sn":sn,
                    "user":user,
                },
                success:function(data){
                    $('.question-holder').html(data);
                    alert(qst_code+"--"+choice+"--"+ans+"--"+user);
                    //alert("choice");



                    
                },
 
            });
            }


 


})

    </script>
</body>

</html>
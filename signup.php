<?php 
session_start();
/*
$dbservername = 'localhost';
 
 $dbusername = 'u0818697_campus';
 
 $dbpassword = 'camptrend123@';
 
 $dbname = 'u0818697_camptrend';
 $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
 */
$dbservername = 'localhost';
 
 $dbusername = 'root';
 
 $dbpassword = '';
 
 $dbname = 'iq_master'; 
 $conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);



 if (isset($_POST['login-in'])) {
// grap form values
    $email = mysqli_real_escape_string($conn, $_POST['phone-email']) ;
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']) ;

    // make sure form is filled properly
    if (empty($email) || empty($pwd)) {

    }else{

      $pwd1 = md5($pwd);

      $query = "SELECT * FROM users WHERE phone='$email'  AND password='$pwd1' OR email='$email'  AND password='$pwd1' LIMIT 1";
      $results = mysqli_query($conn, $query);

      if (mysqli_num_rows($results)) { // user found
        $logged_in_user = mysqli_fetch_assoc($results);
        $_SESSION['user'] = $logged_in_user;
        $_SESSION['success']  = "You are now logged in";
        if (isset($_GET['redr'])) {
          if (isset($_GET['id'])) {
            $id=$_GET['id'];
            header("location:views.php?id=".$id); 
          }
        }elseif (isset($_GET['solution'])) {
          header("location:classWorks/add-solution.php");//
        }elseif (isset($_GET['getsolution'])) {
          $get=$_GET['getsolution'];
          header("location:classWorks/seeSolutions.php?sln=".$get);
        }elseif (isset($_GET['project'])) {
          
          header("location:classWorks/projects.php");
        }
        elseif (isset($_GET['classworks'])) {
          
          header("location:classWorks/?dpt=". $_SESSION['user']['dpt']);
        }
        else{
          header("location:./"); 
        }
      }else{
        
      }

    }

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
                display:  ;
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

.ad-container{
    padding: 5% 4px;
} 

.ad-containers{
    height:90vh;
}

.icon-div{
}


.desk-view{
    display: none;
}

.bg{
    z-index: 0;
    left: 0px;
}


.views{
    padding: 20px;
    width: 100%;
    z-index: 1000;
    margin-left: 3%;
    background-color: none !important;
    font-weight: bold;
    font-size: 40px;
}

.title{
    margin-top: -120px !important;
    width: 100% !important;
}
.bgImgDexk{
    display: none;
}

input{
    width: 90%;
    height: 45px;
    padding: 5px;
    border-radius: 5px;
    margin-top:10px !important;
}
button{
    width: 100%;
    background-color: mediumseagreen;
    color: white;
    border-radius: 5px;
    border:none;
}

.loader{
    padding-top: 70%;
}
.loader-img{
    width: 30%;
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

        
.sideBar-back-btn{
    display: none;
}



.ad-container{
    padding: 25% 0px;
    text-align: left;
}
.ad-containers{
    height:450px;
}
.icon-div{

}


.views{
    padding: 20px;opacity:;color: #343a40;width: 675px;z-index: 1000;
    font-weight: bold;
    font-size: 55px;

}
.bgImgMob{
    display: none;
}


.bg{
    left:;
    z-index: 0;
}

input{
    width: 190px;
    height: 45px;
    padding: 5px;
    border-radius: 5px;
}
button{
    width: 380px;
    background-color: mediumseagreen;
    color: white;
    border-radius: 5px;
    border:none;
}

.title{
    margin-top: -90px !important;
    width: 100% !important;
}

.loader{
    padding-top: 17%;
}
.loader-img{
    width: 10%;
}

.input-holder{
    width: 50%;
    margin-left: 25%;
}


.suc-pop-holder{
    width: 60%;
    margin-left: 20%;
    margin-top: -120px;
}



}      /** end of bigger screen **/

a:hover{
    text-decoration: none !important;
}

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


    <?php //include 'sidebar.php'; ?>





        <!-- start of ads container -->
            <div class="" style="width:;padding: none;height:;">

                <!-- start of ads details -->
                <div class="" style="margin-bottom:50px;margin-top: 10px;background-color: ;">

                   
                   

                   <div class="card shadow mb-4 views" style="background-color: rgb(0,0,0,0) !important;border:none !important;color: white !important;width:90%;margin-left: 5% !important;">

                        <div style="text-align: center;margin-left: ;position: relative;height: 200px;;">
                            <span style="color: crimson;">IQ</span>Master
                        </div>

                        <div style="font-size: 20px;font-weight: lighter;text-align: center;">
                           
                           <div class="title">

                            <div style="text-align: center;font-weight: bold;font-size: 20px;margin-top: 15px;">
  CREATE AN ACCOUNT
  </div>

<div class="input-holder">
<label for="name" style="width: 45%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class=" " type="text" placeholder="First name" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;display: none;">
</label>
      

<label for="name" style="width: 45%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class=" " type="text" placeholder="Last name" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;display: none;">
</label>





<label for="name" style="width: 45%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="" type="text" placeholder="Phone" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;display: none;">
</label>

<label for="name" style="width: 45%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="" type="text" placeholder="Phone" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;display: none;">
</label>


<label for="name" style="width: 47%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="firstname" type="text" placeholder="Firstname" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;">
</label>

<label for="name" style="width: 47%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="lastname" type="text" placeholder="Lastname" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;">
</label>





<label for="name" style="width: 47%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="phone" type="text" placeholder="Phone" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;">
</label>

<label for="name" style="width: 47%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="email" type="text" placeholder="Email" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;">
</label>

<label for="name" style="width: 47%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="pwd1" type="text" placeholder="Password" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;">
</label>

<label for="name" style="width: 47%;text-align: center;height: ;font-weight: lighter;font-size: 13px;">
  <input class="pwd2" type="text" placeholder="Repeat" style="border:none;background-color: ;border-bottom: 1px solid #eeeeee;height: 40px;width: 100%;padding: none;">
</label>


  <select class="sex" style="border:none;background-color: rgb(251,253,253);border-bottom: 1px solid #eeeeee;width: 50%;height: 45px;margin-left: 6px;border-radius: ;color: ;font-weight: bold;">
    <option>
      MALE
    </option>
    <option>
      FEMALE
    </option>
  </select>


</label>



      <button class=" signup" id="signup" type="submit"   style="color: white;font-weight: bold;font-size: 16px;border-radius: 4px;width: 60%;background-color:mediumseagreen;height: 40px;margin-top: 20px;padding: 0px;">Create an account </button><br>
      

</div>
</div>


<div class="success-error-msg">
    
</div>


<div style="width: 35%;border-bottom: 0.5px solid #eee;display: inline-block;margin-left: ;margin-top: 40px;"></div>
  OR
<div style="width: 35%;border-bottom: 0.5px solid #eee;display: inline-block;margin-top: 40px;"></div>


<div style="margin-top: 20px;">
  <a href="login.php"><span style="color: crimson;font-weight: bold;">SIGN-IN</span></a>
</div>





 </div>

    </div>

</div>



<img class="bg bgImgDexk" src="top2.jpeg" style="width: 100%;position: fixed;height: 100%;top: 0px;opacity:;">

<img class="bg bgImgMob" src="top3.jpeg" style="width: 100%;position: fixed;height: 100%;top: 0px;opacity:;">

<div class="bg" style="width: 100%;position: fixed;height: 100%;top: 0px;opacity:;background-color: rgb(0,0,0,0.7);">
</div>
                <!-- end of ads details -->


</div>





<div class="request-not-sent" style="position: fixed;width: 100%;padding:20% 30px;background-color: rgb(0,0,0,0.9);color: mediumseagreen;left: 0px;top: 0%;height: 100%;text-align: center;font-weight: bold;font-size: 30px;z-index: 309000;display: none;">
  
  <div class="suc-pop-holder">
      Account created successfully.<br><br>

  <div style="font-weight: lighter;font-size: 17px;">
    <div style="color: white;">Your details</div>
  <div class="show-name" style="text-align: left;margin-bottom: 4px;"></div>
  <div class="show-institution" style="text-align: left;margin-bottom: 4px;"></div>
  <div class="show-email" style="text-align: left;margin-bottom: 4px;"></div>
  <div class="show-phone" style="text-align: left;margin-bottom: 4px;"></div>
  
  <div class="show-pwd" style="text-align: left;margin-bottom: 4px;"></div>
  
  </div>

  <form method="POST" style="font-weight: lighter;font-size: 18px;margin-top: 20px;">
    <span style="color: white;">Login to continue</span><br>
    

    <input class="login-mail" name="phone-email" type="text" placeholder="Phone or email" style="border:none;background-color:rgb(251,253,253) ;border-bottom: 1px solid #eeeeee;height: 40px;width: 48%;padding: 4px;font-size:15px;border-radius: 5px;display: none;">
    
    <input class="login-pwd"  name="pwd" type="password" placeholder="password" style="border:none;background-color:rgb(251,253,253) ;border-bottom: 1px solid #eeeeee;height: 40px;width: 48%;padding: 4px;font-size:15px;border-radius: 5px;display: none;">


    <button class="continue" id="continue" type="submit" name="login-in"   style="color: white;font-weight: bold;font-size: 14px;border-radius: 4px;width: 100%;background-color: rgb(56,114,114);height: 40px;margin-top: 10px;padding: 0px;">Login</button><br>
  </form>
  </div>

</div>
 





<div class="loader" style="position: fixed;height: 100%;width: 100%;left: 0px;top: 0px;text-align: center;background-color: rgb(0,0,0,0.3);z-index: 200000 !important;display:none;">
  <img src="preloader.gif" class="loader-img" style="z-index: 30000;">
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

function continueReg(){
  $(".container").hide();
}

function hideLoader(){
  $(".loader").hide();
}
function container(){
  $(".container").show();
}
setTimeout(continueReg, 2000);
  setTimeout(container, 2000);
  setTimeout(hideLoader, 1000);









$(document).on('click', '.signup', function(){
  var btn = $(this).attr('id');
  firstname=$(".firstname").val();
 lastname= $(".lastname").val();
  phone=$(".phone").val();
  email=$(".email").val();
  pwd1=$(".pwd1").val();
  pwd2=$(".pwd2").val();
  sex=$(".sex").val();
  if (firstname=="" || firstname==" ") {
    $(".firstname").css({ "border": "1px solid crimson", });
    $(".firstname").focus();


    $(".lastname").css({ "border-bottom": "1px solid #eee", });
    $(".phone").css({ "border-bottom": "1px solid #eee", });
    $(".email").css({ "border-bottom": "1px solid #eee", });
    $(".pwd1").css({ "border-bottom": "1px solid #eee", });
    $(".pwd2").css({ "border-bottom": "1px solid #eee", });

  }else if (lastname=="" || lastname==" ") {
    $(".lastname").css({ "border": "1px solid crimson", });
    $(".lastname").focus();


    $(".firstname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none", });
    $(".phone").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none", });
    $(".email").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none", });
    $(".pwd1").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none", });
    $(".pwd2").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none", });
    

  }else if (phone=="" || phone==" ") {
    $(".phone").css({ "border": "1px solid crimson", });
    $(".phone").focus();

    $(".firstname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none", });
    $(".lastname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".email").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd1").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd2").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });

  }else if (email=="" || email==" ") {
    $(".email").css({ "border": "1px solid crimson", });
    $(".email").focus();

     $(".firstname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".lastname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".phone").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd1").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd2").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });

  }else if (pwd1=="" || pwd1==" ") {
    $(".pwd1").css({ "border": "1px solid crimson", });
    $(".pwd1").focus();

     $(".firstname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".lastname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".email").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".phone").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd2").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    
  }else if (pwd2=="" || pwd2==" ") {
    $(".pwd2").css({ "border": "1px solid crimson", });
    $(".pwd2").focus();


     $(".firstname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".lastname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".email").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd1").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".phone").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    
  }else{

    $(".pwd2").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
     $(".firstname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".lastname").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".email").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".pwd1").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });
    $(".phone").css({ "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",  });

    //AJAX
    $.ajax({
 url:"ajax.php",
 method:"POST",
 async:false,
 data:{
  "btn":btn,
  "firstname":firstname,
  "lastname":lastname,
  "phone":phone,
  "email":email,
  "pwd1":pwd1,
  "sex":sex,
  "pwd2":pwd2
 },
 success:function(data){
  $('.success-error-msg').html(data);
  alert(firstname+"--"+lastname+"--"+phone+"--"+email+"--"+pwd1+"--"+pwd2);

 },
 
});

  }

})






})

    </script>
</body>

</html>
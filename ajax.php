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



/////  making post
 if (isset($_POST['make-profile-post'])) {
   $_get_id=$_SESSION['user']['id'];
   $institution=$_SESSION['user']['school'];
   
$surv_team_2_dp  = $_FILES['file']['name'];
  $filetmpname4 = $_FILES['file']['tmp_name'];
  $fileSize =$_FILES['file']['size'];
  $fileError =$_FILES['file']['error'];
  $fileType =$_FILES['file']['type'];
  $surv_team_2_dp = "events-photo/".$surv_team_2_dp;
  move_uploaded_file($filetmpname4, $surv_team_2_dp);

$date=date("Y-m-d");
$post_text  = mysqli_real_escape_string($conn, $_POST['post-text']) ;

if (!empty($post_text)) {
  $query = "INSERT INTO feeds (date, post, img, user, acty, institution) 
      VALUES('$date','$post_text', '$surv_team_2_dp', '$_get_id', '', '$institution')";
      $success= mysqli_query($conn, $query);
}


header("location:profiles.php?id=".$_get_id);
 }






/////  registering users  
if (isset($_POST['btnss'])) {


  // GENERATE A UNIQUE USERNAME FOR EVERY brand
             function checkKeys($conn, $randStr){
              $sql = "SELECT * FROM users"; 
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result)) {

              while ($row=mysqli_fetch_assoc($result)) {
                if ($row['username']== $randStr) { 
                  $keyExist = true;
                  break;

                }else{  
                  $keyExist = false; 
                }
              }
              return $keyExist;
            }
              //return $keyExist; 
            }

            function generateKey($conn){
              $keyLenght = 4;
              $str = "J5K4H55B6LE5L7K6";
              $randStr =substr(str_shuffle($str), 0, $keyLenght);

              $checkKey =checkKeys($conn, $randStr); 

              while ( $checkKey==true) {
                $randStr =substr(str_shuffle($str), 0, $keyLenght);
                $checkKey =checkKeys($conn, $randStr);
              }

              return $randStr;

            }

$code=generateKey($conn);



  $firstname  = mysqli_real_escape_string($conn, $_POST['firstname']) ;
  $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']) ;
  $phone  = mysqli_real_escape_string($conn, $_POST['phone']) ;
  $email  = mysqli_real_escape_string($conn, $_POST['email']) ;
  $pwd1  = mysqli_real_escape_string($conn, $_POST['pwd1']) ;
  $pwd2  = mysqli_real_escape_string($conn, $_POST['pwd2']) ;
  $sex  = mysqli_real_escape_string($conn, $_POST['sex']) ;
  $username=$lastname.".".$code;
  $date=date("Y-m-d");
  if (empty($phone)||empty($firstname)||empty($email)||empty($pwd1)||empty($pwd2)||empty($lastname)) {
    echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>Sorry! you missed a field</div>";
  }else{
    if ($pwd1!==$pwd2) {
      echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>password dont  matches</div>";
      ?><script>
          $('html,body').animate({
          scrollTop: $(".pwd2").offset().top}, 900);
          $(".pwd2").css({ "border": "1px solid crimson", });
          $(".pwd2").focus();
        </script><?php

    }else{
      ?>
      <script>
          $(".pwd2").css({  "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",   });
        </script><?php

      $sql1 = "SELECT * FROM users WHERE phone='$phone' "; 
      $result1 = mysqli_query($conn, $sql1);
      $sql2 = "SELECT * FROM users WHERE email='$email' "; 
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result1)) {
        echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>Sorry, phone already exists</div>";
        ?><script>
          $('html,body').animate({
          scrollTop: $(".phone").offset().top}, 900);
          $(".phone").css({ "border": "1px solid crimson", });
          $(".phone").focus();
        </script><?php

      }elseif(mysqli_num_rows($result2)){
        echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>Sorry, email already exists</div>";
        ?><script>
          $('html,body').animate({
          scrollTop: $(".email").offset().top}, 900);
          $(".email").css({ "border": "1px solid crimson", });
          $(".email").focus();
        </script><?php


      }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>Invalid email format</div>";  

        ?><script>
          $('html,body').animate({
          scrollTop: $(".email").offset().top}, 900);
          $(".email").css({ "border": "1px solid crimson", });
          $(".email").focus();
        </script><?php

        
      }elseif (strlen($phone)!=11) {
        echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>Invalid phone number</div>";

        ?><script>
          $('html,body').animate({
          scrollTop: $(".phone").offset().top}, 900);
          $(".phone").css({ "border": "1px solid crimson", });
          $(".phone").focus();
        </script><?php

      }

      else{
        
        ?>
      <script>
          $(".email").css({  "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",   });

          $(".phone").css({  "border-bottom": "1px solid #eee","border-top": "none","border-left": "none","border-right": "none",   });
          $(".loader").show();
        </script>
        <?php


        $password = md5($pwd1);
      $query = "INSERT INTO users(date, firstname, lastname,username,phone,email,password)
      VALUES('$date','$firstname', '$lastname','$username','$phone','$email','$password')";
      $success= mysqli_query($conn, $query);

      if ($success) {
       
        ?>
      <script>

        setTimeout(success, 3000);
        function success(){
          $(".loader").hide();
          $(".request-not-sent").show();
          $(".login-pwd").val("<?php echo $pwd1; ?>");
          $(".login-mail").val("<?php echo $email; ?>");

          $(".show-name").html("<?php echo $firstname.' '.$lastname ; ?>");
          $(".show-phone").html("<span style='color:white;font-size:16px;font-weight:lighter;'>Phone: </span> <?php echo $phone ; ?>");
          $(".show-email").html("<?php echo $email ; ?>");
          $(".show-pwd").html("<span style='color:white;font-size:16px;font-weight:lighter;'>Password: </span> <?php echo $pwd1 ; ?>");
        }
        
      </script>
        <?php

      }else{
        "<div style='color:maroon;background-color:rgb(255,168,168);padding: 6px;border-radius: 10px;'>Sorry, an error occured</div>";
        
      }
      }



      /**/
    }
  }

}







/////  registering users  
if (isset($_POST['btn'])) {


  // GENERATE A UNIQUE USERNAME FOR EVERY brand
             function checkKeys($conn, $randStr){
              $sql = "SELECT * FROM users"; 
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result)) {

              while ($row=mysqli_fetch_assoc($result)) {
                if ($row['username']== $randStr) { 
                  $keyExist = true;
                  break;

                }else{  
                  $keyExist = false; 
                }
              }
              return $keyExist;
            }
              //return $keyExist; 
            }

            function generateKey($conn){
              $keyLenght = 4;
              $str = "J5K4H55B6LE5L7K6";
              $randStr =substr(str_shuffle($str), 0, $keyLenght);

              $checkKey =checkKeys($conn, $randStr); 

              while ( $checkKey==true) {
                $randStr =substr(str_shuffle($str), 0, $keyLenght);
                $checkKey =checkKeys($conn, $randStr);
              }

              return $randStr;

            }

$code=generateKey($conn);



  $firstname  = mysqli_real_escape_string($conn, $_POST['firstname']) ;
  $lastname  = mysqli_real_escape_string($conn, $_POST['lastname']) ;
  $phone  = mysqli_real_escape_string($conn, $_POST['phone']) ;
  $email  = mysqli_real_escape_string($conn, $_POST['email']) ;
  $pwd1  = mysqli_real_escape_string($conn, $_POST['pwd1']) ;
  $pwd2  = mysqli_real_escape_string($conn, $_POST['pwd2']) ;
  $sex  = mysqli_real_escape_string($conn, $_POST['sex']) ;
  $username=$lastname.".".$code;
  $date=date("Y-m-d");
  if (empty($phone)||empty($firstname)||empty($email)||empty($pwd1)||empty($pwd2)||empty($lastname)) {

    echo "<div style='color:maroon;background-color:;padding: 6px;border-radius: ;'>Sorry! you missed a field</div>";
  }else{
    if ($pwd1!==$pwd2) {


    }else{


      $sql1 = "SELECT * FROM users WHERE phone='$phone' "; 
      $result1 = mysqli_query($conn, $sql1);
      $sql2 = "SELECT * FROM users WHERE email='$email' "; 
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result1)) {

        echo "Phone already taken";

      }elseif(mysqli_num_rows($result2)){

        echo "Email already taken";

      }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

        echo "Email not valid";
        
      }elseif (strlen($phone)<11) {
        
        echo "Not a valid phone";
      }

      else{


        $password = md5($pwd1);
      $query = "INSERT INTO users(date, firstname, lastname,username,phone,email,password)
      VALUES('$date','$firstname', '$lastname','$username','$phone','$email','$password')";
      $success= mysqli_query($conn, $query);

      echo "<span style='color:mediumseagreen;'>ACCOUNT CREATED SUCCESSFULLY</span>";

      ?>

      <script>
        $(".loader").show();
        setTimeout(success, 3000);
        function success(){
          $(".loader").hide();
          $(".request-not-sent").show();
          $(".login-pwd").val("<?php echo $pwd1; ?>");
          $(".login-mail").val("<?php echo $email; ?>");

          $(".show-name").html("<?php echo $firstname.' '.$lastname ; ?>");
          $(".show-phone").html("<span style='color:white;font-size:16px;font-weight:lighter;'>Phone: </span> <?php echo $phone ; ?>");
          $(".show-email").html("<?php echo $email ; ?>");
          $(".show-pwd").html("<span style='color:white;font-size:16px;font-weight:lighter;'>Password: </span> <?php echo $pwd1 ; ?>");
        }
      </script>

      <?php


      }



      /**/
    }
  }

}







///////  updating profile picture


if (isset($_POST['update-dp'])) {
  $_get_id=$_SESSION['user']['id'];
  $surv_team_2_dp  = $_FILES['profile']['name'];
  $filetmpname4 = $_FILES['profile']['tmp_name'];
  $fileSize =$_FILES['profile']['size'];
  $fileError =$_FILES['profile']['error'];
  $fileType =$_FILES['profile']['type'];
 
  $fileExt = explode('.', $surv_team_2_dp);
  $fileActualExt = strtolower(end($fileExt));
  $allowed  = array('png', 'jpg', 'jpeg' );
  if (in_array($fileActualExt, $allowed)) {

    $fileNameNew = $_get_id.".".uniqid('', true).".".$surv_team_2_dp;
         $surv_team_2_dp = "dp/".$fileNameNew;
  $success_move=move_uploaded_file($filetmpname4, $surv_team_2_dp);
  if ($success_move) {
    $query="UPDATE users SET dp='$surv_team_2_dp' WHERE id='$_get_id' ";
    $update_success=mysqli_query($conn, $query);
    if ($update_success) {
      header("location:./profiles.php?id=".$_get_id."");
    }
  }
}
header("location:./profiles.php?id=".$_get_id."");
}




if (isset($_POST['dp'])) {
  $_get_id=$_SESSION['user']['id'];
  $surv_team_2_dp  = $_FILES['dp']['name'];
  $filetmpname4 = $_FILES['dp']['tmp_name'];
  $fileSize =$_FILES['dp']['size'];
  $fileError =$_FILES['dp']['error'];
  $fileType =$_FILES['dp']['type'];
 
  $fileExt = explode('.', $surv_team_2_dp);
  $fileActualExt = strtolower(end($fileExt));
  $allowed  = array('png', 'jpg', 'jpeg' );
  if (in_array($fileActualExt, $allowed)) {

    $fileNameNew = $_get_id.".".uniqid('', true).".".$surv_team_2_dp;
         $surv_team_2_dp = "dp/".$fileNameNew;
  $success_move=move_uploaded_file($filetmpname4, $surv_team_2_dp);
  if ($success_move) {
    $query="UPDATE users SET dp='$surv_team_2_dp' WHERE id='$_get_id' ";
    $update_success=mysqli_query($conn, $query);
    if ($update_success) {
      header("location:./");
    }
  }
}
}



/////  registering users  
if (isset($_POST['create_tutor'])) {
  $date=date("m-d-y");
  $classname  = mysqli_real_escape_string($conn, $_POST['classname']) ;
  $user  = mysqli_real_escape_string($conn, $_POST['user']) ;
  $specialization  = mysqli_real_escape_string($conn, $_POST['specialization']) ;
  $service_charge  = mysqli_real_escape_string($conn, $_POST['service_charge']) ;

  $query = "INSERT INTO tutor(date, service_charge, classname,specialization,user)
  VALUES('$date','$service_charge','$classname','$specialization','$user')";
  $success= mysqli_query($conn, $query);
}
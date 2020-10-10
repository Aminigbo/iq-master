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




function convertHarshtags($str){
    $regex="/#+([a-zA-Z0-9_]+)/";
    $str= preg_replace($regex, '<a style="font-weight:bold;font-size:16px;color:rgb(56,114,114);" href="tags.php?tag=$1">$0</a>', $str);
    return ($str);
}




if (isset($_POST['add'])) {
	$date=date("d-m-y");
	$input  = mysqli_real_escape_string($conn, $_POST['input']) ;
    $points  = mysqli_real_escape_string($conn, $_POST['point']) ;
// GENERATE A UNIQUE USERNAME FOR EVERY brand 
function checkKeys($conn, $randStr){
$sql = "SELECT * FROM ads"; 
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {

while ($row=mysqli_fetch_assoc($result)) {
if ($row['ad_code']== $randStr) { 
    $keyExist = true;
    break;

    }else{  
        $keyExist = false; 
    }
    }
}
    return $keyExist; 
}

function generateKey($conn){
    $keyLenght = 5;
    $str = "J5K4H55B6LE5L7K6";
    $randStr =substr(str_shuffle($str), 0, $keyLenght);

    $checkKey =checkKeys($conn, $randStr); 

    while ( $checkKey==true) {
    $randStr =substr(str_shuffle($str), 0, $keyLenght);
    $checkKey =checkKeys($conn, $randStr);
    }

    return $randStr;

}

$id=generateKey($conn);
$date=date("Y-m-d");

if (empty($input)) {
    ?>
    <script>
        alert("Empty field detected");
    </script>
    <?php
}else{
    $query = "INSERT INTO xtra_categories (date, category, no_of_qst, status, category_code,points,type)VALUES('$date','$input', '', 'inactive', '$id','$points','league')";
mysqli_query($conn, $query);
}


}




if (isset($_POST['all_category'])) {
	$sql = "SELECT * FROM xtra_categories WHERE type='league' ORDER BY id DESC  "; 
$result = mysqli_query($conn, $sql); ?>

<table class="table table-bordered" id="" width="100%" cellspacing="0">
	<thead>
    <tr>
        <th>Code</th>
        <th>Category</th>
        <th>Status</th>
        <th>Date</th>
        <th>Coin</th>
    </tr>
</thead>
<tbody>
	<?php
if (mysqli_num_rows($result)) { ?>


<?php
    while ($row=mysqli_fetch_assoc($result)) {
      $category_code=$row['category_code'];
      $category=$row['category'];
      $status=$row['status'];
      $date=$row['date'];
      $points=$row['points']; ?>

<tr>
 <td><a href="categories.php?code=<?php echo $category_code; ?>"><?php echo $category_code; ?></a></td>
 <td><?php echo $category; ?></td>
 <td style="">
    <form method="POST" action="scripts.php">
        <input type="text" name="cat" value="<?php echo $category_code; ?>" style="display: none;">
        <?php if ($status=="active") {
     ?>
        
         <input type="submit" name="turn-inactive" value="Deactivate" style="height: 100%;width: 100%;background-color: mediumseagreen ;padding:;border:none;border-radius: 10px;font-weight: bold;color: white;" >
     
     <?php 
 }else{
    ?>
        <input type="submit" name="turn-active" value="Activate" style="height: 100%;width: 100%;background-color:crimson;padding:;border:none;border-radius: 10px;font-weight: bold;color: white;" >
    
    <?php 
 } ?></form></td>
 <td><?php echo $date; ?></td>

  <td><?php echo $points; ?></td>
      
</tr>
    <?php
  }  

  ?></tbody>
  </table>
  <?php
}
}




if (isset($_POST['turn-active'])) {
    $cat  = mysqli_real_escape_string($conn, $_POST['cat']) ;
    $query = "UPDATE xtra_categories SET status='active' WHERE category_code='$cat' ";
    mysqli_query($conn, $query);
    header("location:admin.php");
}

if (isset($_POST['turn-inactive'])) {
    $cat  = mysqli_real_escape_string($conn, $_POST['cat']) ;
    $query = "UPDATE xtra_categories SET status='inactive' WHERE category_code='$cat' ";
    mysqli_query($conn, $query);
    header("location:admin.php");
}


//turn-inactive























/////  adding questions
if (isset($_POST['add_question'])) {

	// GENERATE A UNIQUE USERNAME FOR EVERY brand 
function checkKeys($conn, $randStr){
$sql = "SELECT * FROM qst_hub"; 
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {

while ($row=mysqli_fetch_assoc($result)) {
if ($row['question_code']== $randStr) { 
    $keyExist = true;
    break;

    }else{  
        $keyExist = false; 
    }
    }
}
    return $keyExist; 
}

function generateKey($conn){
    $keyLenght = 5;
    $str = "J5K4H55B6LE5L7K6";
    $randStr =substr(str_shuffle($str), 0, $keyLenght);

    $checkKey =checkKeys($conn, $randStr); 

    while ( $checkKey==true) {
    $randStr =substr(str_shuffle($str), 0, $keyLenght);
    $checkKey =checkKeys($conn, $randStr);
    }

    return $randStr;

}

$id=generateKey($conn);

	$date=date("d-m-y");
	$question  = mysqli_real_escape_string($conn, $_POST['question']) ;
	$option1  = mysqli_real_escape_string($conn, $_POST['option1']) ;
	$option2  = mysqli_real_escape_string($conn, $_POST['option2']) ;
	$option3  = mysqli_real_escape_string($conn, $_POST['option3']) ;
	$option4  = mysqli_real_escape_string($conn, $_POST['option4']) ;
	$category  = mysqli_real_escape_string($conn, $_POST['category']) ;
	$sN  = mysqli_real_escape_string($conn, $_POST['sN']) ;
	$correct_answer  = mysqli_real_escape_string($conn, $_POST['correct_answer']) ;

if (empty($question) ||empty($option1)|| empty($option2)|| empty($option3)|| empty($option4) ) {
    ?>
    <script>
        alert("Empty field detected");
    </script>
    <?php
}else{
    $query = "INSERT INTO qst_hub (date, category, question_code, question, one,two,three,four,correct,sn)VALUES('$date','$category', '$id', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_answer','$sN')";
mysqli_query($conn, $query);
}

}




/////  auto getting serial numbers
if (isset($_POST['autoSn'])) {
	$category  = mysqli_real_escape_string($conn, $_POST['category']) ;
	$sql = "SELECT * FROM qst_hub WHERE category='$category' "; 
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result)+1;
    echo "<option>".$count."</option>";
}




///////////  wuestion couter

if (isset($_POST['question_counter'])) {
    $qst_category  = mysqli_real_escape_string($conn, $_POST['qst_category']) ;
    $user  = mysqli_real_escape_string($conn, $_POST['user']) ;
    $date=date("Y-m-d");
    $sql2 = "SELECT * FROM qst_counter WHERE category='$qst_category' AND user='$user' AND date='$date' "; 
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2)) {
        while ($row2=mysqli_fetch_assoc($result2)) {
            $counter=$row2['counter'];
            $counter1=$counter+1;

            echo "<h1  style='margin-left:120px;font-size:20px;font-weight:bold;text-align:left;color:white;display:inline-block;background-color:crimson;padding:7px;border-radius:8px;'>".$counter1."<span style='margin-left:;'> / </span><span style='margin-left:;'>75</span></h1>";
        }
    }else{
         echo "<h1  style='margin-left:120px;font-size:20px;font-weight:bold;text-align:left;color:white;display:inline-block ;background-color:crimson;padding:7px;border-radius:8px;'>1<span style='margin-left:;'> / </span><span style='margin-left:;'>75</span></h1>";
    }
}









if (isset($_POST['allQuestions'])) {
    $qst_category  = mysqli_real_escape_string($conn, $_POST['qst_category']) ;
    $user  = mysqli_real_escape_string($conn, $_POST['user']) ;
    $sn  = mysqli_real_escape_string($conn, $_POST['sn']) ;


if ($sn>2) {

    ?>
    <script>
        $(".time-up").fadeIn();
        $("#timer").hide();
        $(".question-counters").html("");
        $(".report").html("League Ended.");

    setTimeout(show_loader, 2000);
    function show_loader(){
        $(".preloader").fadeIn();
    }

    setTimeout(redirect, 4000);
    function redirect(){
        window.location="result-show.php?id=<?php echo $qst_category; ?>";
    }
    </script>
    <?php


 }else{   

$date=date("Y-m-d");

$sql = "SELECT * FROM qst_hub WHERE category='$qst_category' AND sn='$sn' "; 
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    while ($row=mysqli_fetch_assoc($result)) {
        $date=$row['date'];
        $category=$row['category'];
        $question_code=$row['question_code'];
        $question=$row['question'];
        $one=$row['one'];
        $two=$row['two'];
        $three=$row['three'];
        $four=$row['four'];
        $correct=$row['correct'];
        ?>

        <div style="padding: 20px;font-size: 17px;font-weight: bold;">
            <?php  echo $question; ?>
        </div>
        <div style="margin-top: 25px;text-align: left;">

        <div class="options oneOption" data-category="<?php echo $qst_category; ?>" data-qst="<?php echo $question_code ?>" data-ans="<?php echo $correct ?>" data-user="<?php echo $user; ?>"   style="border-bottom:;background-color:;cursor: pointer;">
        <span style="font-weight: lighter;">a </span>
        <div class="one" style="background-color: #eee;padding: 5px;border-radius: 5px;font-weight: bold;font-size: 17px;width: 250px;padding: 3px;display: inline-block;text-align: ;padding-left: 10px;">
            <?php  echo $one; ?>
        </div>
        </div><br>

        <div class="options twoOption" data-category="<?php echo $qst_category; ?>" data-qst="<?php echo $question_code ?>" data-ans="<?php echo $correct ?>" data-user="<?php echo $user; ?>"   style="border-bottom:;background-color:;cursor: pointer;">
        <span style="font-weight: lighter;">b </span>
        <div class="two" style="background-color: #eee;padding: 5px;border-radius: 5px;font-weight: bold;font-size: 17px;width: 250px;padding: 3px;display: inline-block;text-align: ;padding-left: 10px;">
            <?php  echo $two; ?>
        </div>
        </div><br>

        <div class="options threeOption" data-category="<?php echo $qst_category; ?>" data-qst="<?php echo $question_code ?>"  data-ans="<?php echo $correct ?>" data-user="<?php echo $user; ?>"   style="border-bottom:;background-color:;cursor: pointer;">
        <span style="font-weight: lighter;">c </span>
        <div class="three" style="background-color: #eee;padding: 5px;border-radius: 5px;font-weight: bold;font-size: 17px;width: 250px;padding: 3px;display: inline-block;text-align: ;padding-left: 10px;">
            <?php  echo $three; ?>
        </div>
        </div><br>

        <div class="options fourOption" data-category="<?php echo $qst_category; ?>" data-qst="<?php echo $question_code ?>" data-ans="<?php echo $correct ?>" data-user="<?php echo $user; ?>"  style="border-bottom:;background-color:;cursor: pointer;">
            <span style="font-weight: lighter;">d </span>
            <div class="four" style="background-color: #eee;padding: 5px;border-radius: 5px;font-weight: bold;font-size: 17px;width: 250px;padding: 3px;display: inline-block;text-align: ;padding-left: 10px;">
                <?php  echo $four; ?>
            </div>
        </div><br>



        
        </div>
        <?php
    }
}

}
                    


                            /*}elseif ($counter==14) {
                                ?>
                                <script>
                                    window.location="result-show.php?cat=<?php echo $qst_category; ?>";
                                </script>
                                <?php
                            }
                        
                        }*/






























    ?>
<input type="text" value="<?php echo $question_code; ?>" class="qst_code" style="display: none;">
        <input type="text" value="<?php echo $category ?>" class="qst_category" style="display: none;">
        <input type="text" value="<?php echo $correct ?>" class="ans" style="display: none;">
        <input type="text" value="<?php echo $user; ?>" class="user" style="display: none;">
        <input type="text" value="" class="choice" style="display: none;">
<script>




function leadersBoard(){
    qst_category=$(".qst_category").val();
    $.ajax({
    url:"leagueScripts.php",
    method:"POST",
    async:false,
    data:{ 

        "qst_category":qst_category,
        "leadersBoard":1,
    },
    success:function(data){
        $('.card-body').html(data);
                    
    },
 
    }); 
}






    function allQuestions(){
                qst_category=$(".qst_category").val();
                user=$(".user").val();
                sn=$(".sn").val();

                $.ajax({
                url:"leagueScripts.php",
                method:"POST",
                async:false,
                data:{ 

                    "allQuestions":1,
                    "qst_category":qst_category,
                    "sn":sn,
                    "user":user
                },
                success:function(data){
                    $('.question-holder').html(data);
                    //alert(qst_code+"--"+choice+"--"+ans+"--"+user);
                    //alert("choice");
                    
                    
                },
 
            });
            }

    
            $(".oneOption").click(function() {
                var category = $(this).data('category');
                var qst = $(this).data('qst');
                var ans = $(this).data('ans');
                var user = $(this).data('user');
                $(".choice").val("1");
                choice=$(".choice").val();
                setTimeout(changeQuestion, 500);
                function changeQuestion(){
                    //document.getElementById('timer').innerHTML = 00 + ":" + 4;
                    allQuestions();
                    $(".qst-cntr").html(Inc);
                    //Autoinsert();
                     //alert(qst+"--"+ans+"--"+category+"--"+choice+" --"+user);
                }
                 if (ans==1) {
    $(".one").css({
        "background-color": "mediumseagreen",
        "color": "white",
    });

}else if (ans==2) {
    $(".two").css({
        "background-color": "mediumseagreen",
        "color": "white", });
    $(".one").css({
        "background-color": "crimson",
        "color": "white", });

}else if (ans==3) {
    $(".three").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".one").css({
        "background-color": "crimson",
        "color": "white", });
                

}else if (ans==4) {
    $(".four").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".one").css({
        "background-color": "crimson",
        "color": "white", });
                

}

                Sn=$(".sn").val();
                Inc=Number(Sn)+1;
                NewSn=$(".sn").val(Inc);
                
                //alert(Inc);

                $.ajax({
                url:"leagueScripts.php",
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
                    //$('.question-holder').html(data);
                    //alert(qst+"--"+choice+"--"+ans+"--"+user);
                    //alert("choice");
                    
                },
 
            });
                
                

                 })




            $(".fourOption").click(function() {
                var category = $(this).data('category');
                var qst = $(this).data('qst');
                var ans = $(this).data('ans');
                var user = $(this).data('user');
                $(".choice").val("4");
                choice=$(".choice").val();
                setTimeout(changeQuestion, 500);
                function changeQuestion(){
                    //document.getElementById('timer').innerHTML = 00 + ":" + 4;
                    allQuestions();
                    $(".qst-cntr").html(Inc);
                    //alert(qst+"--"+ans+"--"+category+"--"+choice+" --"+user);
                }
                 if (ans==4) {
    $(".four").css({
        "background-color": "mediumseagreen",
        "color": "white",
    });

}else if (ans==2) {
    $(".two").css({
        "background-color": "mediumseagreen",
        "color": "white", });
    $(".four").css({
        "background-color": "crimson",
        "color": "white", });

}else if (ans==3) {
    $(".three").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".four").css({
        "background-color": "crimson",
        "color": "white", });
                

}else if (ans==1) {
    $(".one").css({
    "background-color": "mediumseagreen",
    "color": "white",});
   $(".four").css({
        "background-color": "crimson",
        "color": "white", });
                

}

                Sn=$(".sn").val();
                Inc=Number(Sn)+1;
                NewSn=$(".sn").val(Inc);
                
                //alert(Inc);

                $.ajax({
                url:"leagueScripts.php",
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
                    //$('.question-holder').html(data);
                    //alert(qst+"--"+choice+"--"+ans+"--"+user);
                    //alert("choice");
                    
                },
 
            });

                })

            $(".threeOption").click(function() {
                var category = $(this).data('category');
                var qst = $(this).data('qst');
                var ans = $(this).data('ans');
                var user = $(this).data('user');
                $(".choice").val("3");
                choice=$(".choice").val();
                setTimeout(changeQuestion, 500);
                function changeQuestion(){
                    //document.getElementById('timer').innerHTML = 00 + ":" + 4;
                    allQuestions();
                    $(".qst-cntr").html(Inc);
                    //alert(qst+"--"+ans+"--"+category+"--"+choice+" --"+user);
                }

                 if (ans==3) {
    $(".three").css({
        "background-color": "mediumseagreen",
        "color": "white",
    });
    

}else if (ans==2) {
    $(".two").css({
        "background-color": "mediumseagreen",
        "color": "white", });
    $(".three").css({
        "background-color": "crimson",
        "color": "white", });

}else if (ans==1) {
    $(".one").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".three").css({
        "background-color": "crimson",
        "color": "white", });
                

}else if (ans==4) {
    $(".four").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".three").css({
        "background-color": "crimson",
        "color": "white", });
                

}

                Sn=$(".sn").val();
                Inc=Number(Sn)+1;
                NewSn=$(".sn").val(Inc);
                
                //alert(Inc);

                $.ajax({
                url:"leagueScripts.php",
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
                    //$('.question-holder').html(data);
                    //alert(qst+"--"+choice+"--"+ans+"--"+user);
                    //alert("choice");
                    
                },
 
            });

                })

            $(".twoOption").click(function() {
                var category = $(this).data('category');
                var qst = $(this).data('qst');
                var ans = $(this).data('ans');
                var user = $(this).data('user');
                $(".choice").val("2");
                choice=$(".choice").val();
                setTimeout(changeQuestion, 500);
                function changeQuestion(){
                    //document.getElementById('timer').innerHTML = 00 + ":" + 4;
                    allQuestions();
                    $(".qst-cntr").html(Inc);
                    //alert(qst+"--"+ans+"--"+category+"--"+choice+" --"+user);
                }

                 if (ans==2) {
    $(".two").css({
        "background-color": "mediumseagreen",
        "color": "white",
    });
    

}else if (ans==1) {
    $(".one").css({
        "background-color": "mediumseagreen",
        "color": "white", });
    $(".two").css({
        "background-color": "crimson",
        "color": "white", });

}else if (ans==3) {
    $(".three").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".two").css({
        "background-color": "crimson",
        "color": "white", });
                

}else if (ans==4) {
    $(".four").css({
    "background-color": "mediumseagreen",
    "color": "white",});
    $(".two").css({
        "background-color": "crimson",
        "color": "white", });
                

}

                Sn=$(".sn").val();
                Inc=Number(Sn)+1;
                NewSn=$(".sn").val(Inc);

                //alert(Inc);

                $.ajax({
                url:"leagueScripts.php",
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
                    //$('.question-holder').html(data);
                    //alert(qst+"--"+choice+"--"+ans+"--"+user);
                    //alert("choice");
                    
                },
 
            });

                })


</script> 

<?php 

}



if (isset($_POST['auto_insert_answered_questions'])) {
    $date=date("Y-m-d");
    $qst  = mysqli_real_escape_string($conn, $_POST['qst']) ;
    $choice  = mysqli_real_escape_string($conn, $_POST['choice']) ;
    $ans  = mysqli_real_escape_string($conn, $_POST['ans']) ;
    $qst_category  = mysqli_real_escape_string($conn, $_POST['category']) ;
    $user  = mysqli_real_escape_string($conn, $_POST['user']) ;
    if ($ans==$choice) {
        $remark="CORRECT";
        $count="1";
    }else{
        $remark="WRONG";
        $count="0";
    }

    $query = "INSERT INTO answers (date, category, question, user, choice,answer,remark,count)VALUES('$date','$qst_category', '$qst', '$user', '$choice', '$ans', '$remark','$count')";
mysqli_query($conn, $query);



$sql1Z = "SELECT * FROM course_taken WHERE category='$qst_category' AND user='$user'"; 
$result1Z = mysqli_query($conn, $sql1Z);
if (mysqli_num_rows($result1Z)) {

}else{
    $query = "INSERT INTO course_taken (date, category, user, status)VALUES('$date','$qst_category', '$user', 'TAKEN')";
mysqli_query($conn, $query);
}



$sql1 = "SELECT * FROM qst_counter WHERE category='$qst_category' AND user='$user' AND date='$date' "; 
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1)) {
    while ($row1=mysqli_fetch_assoc($result1)) {
        $counter=$row1['counter'];
        $rating=$row1['rating'];
        $newCounter=$counter+1;
        $newRating=$rating+1;

        if ($ans==$choice) {
            $query = "UPDATE qst_counter SET rating='$newRating' WHERE category='$qst_category' AND user='$user'  AND date='$date' ";
        mysqli_query($conn, $query);
        }else{
            $query = "UPDATE qst_counter SET rating='$rating' WHERE category='$qst_category' AND user='$user'  AND date='$date' ";
        mysqli_query($conn, $query);

        }

        $query = "UPDATE qst_counter SET counter='$newCounter' WHERE category='$qst_category' AND user='$user'  AND date='$date' ";
        mysqli_query($conn, $query);
    }
}else{
    if ($ans==$choice) {
        $query = "INSERT INTO qst_counter (category, date, counter, user,rating)VALUES('$qst_category','$date', '1', '$user','1')";
        mysqli_query($conn, $query);
    }else{
        $query = "INSERT INTO qst_counter (category, date, counter, user,rating)VALUES('$qst_category','$date', '1', '$user','0')";
        mysqli_query($conn, $query);
    }
    

$sql = "DELETE  FROM answers WHERE category='$qst_category' and user ='$user' AND date !='$date'  ";
  mysqli_query($conn, $sql);

  $sql2 = "DELETE  FROM qst_counter WHERE category='$qst_category' and user ='$user' AND date !='$date'  ";
  mysqli_query($conn, $sql2);


}



}








if (isset($_POST['leadersBoard'])) {
    $qst_category  = mysqli_real_escape_string($conn, $_POST['qst_category']) ;

    $date=date("Y-m-d");
    $sql2 = "SELECT * FROM qst_counter WHERE category='$qst_category' AND date='$date' ORDER BY rating DESC"; 
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
                $lastname=$row['lastname'];
                $id=$row['id'];
                 ?>

                <div style="text-align: left;font-weight: bold;margin-bottom: 10px;border:0.5px solid #eee;padding: 10px;">

                    <?php
                        $sql1 = "SELECT * FROM dp WHERE user='$id'"; 
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1)) {
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $dp=$row1['dp'];

                                echo '<img src="'.$dp.'"  class="profile-img" style="height:40px;width:40px;border-radius:40px;" />';
                            }
                        }else{
                            echo '<img src="defaultimage1.png"  class="profile-img" style="height:40px;width:40px;border-radius:40px;" />';
                        }

                        ?>
                    <span><?php echo $firstname ?></span> <span><?php echo $lastname ?></span>
                        
                <span style="float: right;margin-right: 15px;"><?php echo $rating ?></span>
                </div>

                <?php
            }
        }

    }}else{
    echo "<div style='padding:120px 1px;text-align:center;font-weight:bold;color:crimson;'>NO PERTICIPANT</div>";
}
                            
}






///////////////  getting coin balance
if (isset($_POST['coinBalance'])) {
	$user  = mysqli_real_escape_string($conn, $_POST['session_id']) ;
	$category  = mysqli_real_escape_string($conn, $_POST['get']) ;

	$sql2 = "SELECT * FROM answers WHERE category='$category' AND user='$user' AND remark='CORRECT' AND claim=0 "; 
    $result2 = mysqli_query($conn, $sql2);
    echo mysqli_num_rows($result2)*3;
}














////////////////////  increasing question counter for another phase of quiz
if (isset($_POST['increase_counter'])) {
	$user  = mysqli_real_escape_string($conn, $_POST['user']) ;
	$category  = mysqli_real_escape_string($conn, $_POST['category']) ;
	$sql1 = "SELECT * FROM qst_counter WHERE category='$category' AND user='$user'  "; 
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1)) {
    while ($row1=mysqli_fetch_assoc($result1)) {
        $counter=$row1['counter'];
        $newCounter=$counter+1;
        $query = "UPDATE qst_counter SET counter='$newCounter' WHERE category='$category' AND user='$user' ";
mysqli_query($conn, $query);
    }
}
}














///  claiming coins
if (isset($_POST['claim'])) {
    $category  = mysqli_real_escape_string($conn, $_POST['cat']) ;
    $user  = mysqli_real_escape_string($conn, $_POST['user']) ;
    $amount  = mysqli_real_escape_string($conn, $_POST['amount']) ;
    $query = "UPDATE answers SET claim='1' WHERE category='$category' AND user='$user' AND remark='CORRECT' ";
    mysqli_query($conn, $query);

    $sql1 = "SELECT * FROM users WHERE id='$user'  "; 
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1)) {
    while ($row1=mysqli_fetch_assoc($result1)) {
        $viralCoin=$row1['viralCoin'];
        $progress=$row1['progress'];
        $progressAdd=$progress+0.2;
        $newCoin=$viralCoin+$amount;
        $query = "UPDATE users SET viralCoin='$newCoin' WHERE id='$user' ";
        mysqli_query($conn, $query);

        $query2 = "UPDATE users SET progress='$progressAdd' WHERE id='$user' ";
        mysqli_query($conn, $query2);

    }
}
    ?>
        <script>
             window.location="result-show.php?cat=<?php echo $category; ?>&trialComplete";
        </script>
    <?php
}




/////updating dp
 if (isset($_POST['add-photo'])) {
    $user=$_SESSION['user']['id'];
    $date=date("Y-m-d");

    $surv_team_2_dp  = $_FILES['ad-image']['name'];
    $filetmpname4 = $_FILES['ad-image']['tmp_name'];
    $fileSize =$_FILES['ad-image']['size'];
    $fileError =$_FILES['ad-image']['error'];
    $fileType =$_FILES['ad-image']['type'];
    $surv_team_2_dp = "dp/".$surv_team_2_dp;
    move_uploaded_file($filetmpname4, $surv_team_2_dp);


    $sql1 = "SELECT * FROM dp WHERE user='$user'"; 
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1)) {
        $query = "UPDATE dp SET dp='$surv_team_2_dp' WHERE user='$user'";
        mysqli_query($conn, $query);
    }else{
        $query = "INSERT INTO dp (date, user, dp)VALUES('$date', '$user', '$surv_team_2_dp')";
        mysqli_query($conn, $query);
    }

    ?>
    <script>
        window.location="./";
    </script>
    <?php
}









/////////  inserting comments
if (isset($_POST['send-comment'])) {
    $user  = mysqli_real_escape_string($conn, $_POST['user']) ;
    $comment  = mysqli_real_escape_string($conn, $_POST['comment']) ;
    $date=date("Y-m-d");
    if (empty($comment)) {
        ?>
        <script>
            $('.error').fadeIn();
            setTimeout(hide, 2000);
            function hide(){
                $('.error').hide();
            }
        </script>
        <?php
    }else{
        

        $query = "INSERT INTO coments (date, user, category,coment)VALUES('$date', '$user', '','$comment')";
        $success=mysqli_query($conn, $query);
        if ($success) {
            ?>
        <script>
            $('.success').fadeIn();
            setTimeout(hide, 2000);
            function hide(){
                $('.success').hide();
            }
            $('.comment-input').val("");
            $('html,body').animate({
                scrollTop: $(".comments-top").offset().top},
                1000);
        </script>
        <?php
        }
    }
}



///////////  viewing all messages
if (isset($_POST['allComments'])) {
    $sqls = "SELECT * FROM coments "; 
    $resultX = mysqli_query($conn, $sqls);
    $sql = "SELECT * FROM coments ORDER BY id DESC LIMIT 6 "; 
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        echo "<div style='padding: 10px;color:grey;'>Comments</div>";
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

                    ?>
                            <div style="margin-bottom: 5px;border-bottom: 0.5px solid #eee;padding: 10px;">
                                <div>

                                    
                                    <?php
                                    $sql12 = "SELECT * FROM dp WHERE user='$user'  "; 
                    $result12 = mysqli_query($conn, $sql12);
                    if (mysqli_num_rows($result12)) {
                        while ($row12=mysqli_fetch_assoc($result12)) {
                            $dp=$row12['dp']; ?>

                                    <img src="<?php echo $dp; ?>" style="height: 30px;width: 30px;border-radius: 30px;">
                                    <?php } }else{ echo '<img src="../auth/images/defaultimage1.png" style="height: 30px;width: 30px;border-radius: 30px;">'; } ?>
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
                            <div style="padding-top:;padding-left: 30px;font-weight: lighter;font-size: 14px;">
                                                                <?php echo $coment; ?>
                        </div>
                    </div>
                            <?php

                }
            }
         }


if (mysqli_num_rows($resultX)>6) {
  ?>
<div style="margin-top:7px;padding: 0px 5px;text-align: center;">
  
  <a href="all-comments.php" class="show-loader"><span  style="font-weight:lighter; font-size:20px; color:rgb(56,114,114);font-weight: bold;">See all comments <span class="" style="font-size: ;"></span></span><br>
</div>

<?php
}
    }
}














///////////  viewing all messages for all comments.php
if (isset($_POST['allComments1'])) {
    $sql = "SELECT * FROM coments "; 
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        echo "<div style='padding: 10px;color:grey;'>Comments</div>";
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
                    ?>
                            <div style="margin-bottom: 5px;border-bottom: 0.5px solid #eee;padding: 10px;">
                                <div>
                                     <?php
                                    $sql12 = "SELECT * FROM dp WHERE user='$user'  "; 
                    $result12 = mysqli_query($conn, $sql12);
                    if (mysqli_num_rows($result12)) {
                        while ($row12=mysqli_fetch_assoc($result12)) {
                            $dp=$row12['dp']; ?>

                                    <img src="<?php echo $dp; ?>" style="height: 30px;width: 30px;border-radius: 30px;">
                                    <?php } }else{ echo '<img src="../auth/images/defaultimage1.png" style="height: 30px;width: 30px;border-radius: 30px;">'; } ?>
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
                            <div style="padding-top:;padding-left: 30px;font-weight: lighter;font-size: 14px;">
                                                                <?php echo $coment; ?>
                        </div>
                    </div>
                            <?php


                }
            }
         }
    }
}
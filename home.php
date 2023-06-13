<?php
session_start(); 
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
//databaseconnection
$user=$_SESSION['username'];
$username="root";
$password="";
$servername="localhost";
$database="gokulprojectdb";
$conn=new mysqli($servername,$username,$password,$database);
//student profile
$studentname=$studentage=$studentbloodgroup=$classdetails=$contactno=$fathername=$mother=$adress="";
$displayvalues=$conn->query("SELECT * FROM student_details WHERE stud_id='$user'");
$studentdetails=$displayvalues->fetch_assoc();
if(isset($studentdetails)){
$studentname=$studentdetails['Student_name'];
$studentage=$studentdetails['Student Age'];
$studentbloodgroup=$studentdetails['Blood Group'];
$classdetails=$studentdetails['Class Details'];
$contactno=$studentdetails['Contact number'];
$fathername=$studentdetails['Father Name'];
$mother=$studentdetails['Mother Name'];
$adress=$studentdetails['Address'];
$image=$studentdetails['image'];
}
//sutent marks 
$studentname1=$tamil=$english=$maths=$science=$socialscience=$total=$result="";
$getresult1=$conn->query("SELECT * FROM studentmarkdetails_qa_10 WHERE stud_id='$user'");
$getresult=$getresult1->fetch_assoc();
if(isset($getresult)){
$studentname1=$getresult['student_name'];
$tamil=$getresult['tamil'];
$english=$getresult['english'];
$maths=$getresult['maths'];
$science=$getresult['science'];
$socialscience=$getresult['socialScience'];
$total=$getresult['totalMarks'];
$result=$getresult['result'];
}
//parent feedback
if(isset($_POST['parent_feed_btn'])){
 $parentname=$_POST['std_name'] ;
 $feedback=$_POST['parent_feedback'];
 $suggestion=$_POST['parent_suggestion'];
 $feed=$conn->query("INSERT INTO `parent_feedback`(`student_id`, `Student_name`, `feedback`, `suggestion`)
  VALUES ('$user','$parentname','$feedback','$suggestion')");
if($feed){
  echo "<script>alert('thanks for your valuable feed back')</script>";
}
}

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Student_portal</title>
    <meta name="descrption" content="login and sign up page">
    <meta name="keyword" content="login , home ,sign up">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="documentclassification" content="professional">
    <meta name="distripution" content="local">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="admin.css">
<style>
  body {
    margin:0;
  height:100vh;
  background:radial-gradient(100% 200% at right,white 0%,#01b0f0 50.1%);
  }
  .prof h3{
      padding:5px;
      background-color: aliceblue;
      text-align:center;
      color: blue;}
      .prof h4{
      padding:5px;
      background-color:lightblue;
      text-align:left;
      color: mediumblue;
      border-radius:10px;}
</style>
</head>
  <body>
  <div class="container-fluid title">
        <h3><img src="lotousimage.png" width="50px" height="50px">GLOBAL SCHOOLS  <a class="float-right text-danger" href="logout.php">logout</a></h3>
    </div>
    <div class="container-fluid text-light">
        <h3 > <?php  echo "welcome\t ";print_r($_SESSION['username']);?> </h3>
    </div>
    <div class="container ">
   <!-- <button class="btn btn-primary" id="menubtn">Menus</button>-->
        <div class="row   ">
          <!--  <div class="col-md-2 slist" id="hid">
              <ul>
                <li class="list-item"><a href="home.php">HOME</a></li>
                <li class="list-item"><a href="logout.php">ADMIN</a></li>
                <li class="list-item"><a href="logout.php">LOGIN</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
             </ul>
            </div>-->
        <div class="col-md-10 content">
        <nav class="navbar navbar-expand-sm bg-primary navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <button class="btn btn-success mr-3 "data-toggle="" data-target="" id="st_profile">Profile</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3">feesDeatils</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3" id="report">AcademicDetails</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3"data-toggle="collapse" data-target=""id="feed_btn">FeedBack</button>
    </li>
  </ul>
</nav>
<div class="container ">
   <div class="row " id="profile">
    <div class="col-8 prof">
       <h3><?php echo $studentname?></h3>
       <h4>DOB:  <?php echo $studentage?></h4>
       <h4>BloodGroup: <?php echo $studentbloodgroup?></h4>
       <h4>Studying:  <?php echo $classdetails?></h4>
       <h4>Contactno:  <?php echo $contactno?></h4>
       <h4>Father:  <?php echo $fathername?></h4>
       <h4>Mother:  <?php echo $mother?></h4>
       <h4>Adress: <?php echo $adress?></h4>

    </div>
    <div class="col-4">
     <img src="lotousimage.png"  alt="no_image" width="300px" height="300px">
    </div>
   </div>
   <!--feedbACK-->
   <div class="row" id="pr_feed" >
    <div class="col-6">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="a_student" class="form-group">
          <input type="text" name="std_name" placeholder="parent-name" class="form-control mt-2 mb-2" required>
          <textarea placeholder="your feedback" name="parent_feedback"class="form-control mt-2 mb-2" rows="4" cols="50" required ></textarea>
          <textarea placeholder="valuable suggestion" name="parent_suggestion"class="form-control mt-2 mb-2"rows="4" cols="50" required></textarea>
          <input type="submit" value="submit" name="parent_feed_btn" class="btn btn-primary mt-1 mb-3" >
         </form>
    </div>
  </div>
  <!---student report-->
  <div class="row " id="stud_report">
       <div class="col-md-10">
                  <h2><?php ECHO $user?></h2>
                  <div class="table-responsive-lg">
                    <table class="table table-striped table-primary table-hover ">
                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $studentname1?></h3></td>
                    </tr>
                    <tr>
                        <th>REPORT: </th>
                        <td><?php echo"Quarterly Exam";?></h4></td>
                    </tr>
                    <tr>
                        <th>TAMIL: </th>
                        <td><?php echo $tamil?></h4></td>
                    </tr>
                    <tr>
                        <th>ENGLISH: </th>
                        <td><?php echo $english?></h4></td>
                    </tr>
                    <tr>
                        <th>MATHS: </th>
                        <td><?php echo $maths?></h4></td>
                    </tr>
                    <tr>
                        <th>SCIENCE: </th>
                        <td><?php echo $science?></h4></td>
                    </tr>
                    <tr>
                        <th>SOCIALSCIENCE: </th>
                        <td><?php echo $socialscience?></h4></td>
                    </tr>
                    <tr>
                        <th>TOTAL: </th>
                        <td><?php echo $total?></h4></td>
                    </tr>
                    <tr>
                        <th>RESULT: </th>
                        <td><?php echo $result?></h4></td>
                    </tr>
                    

                      </table>
                  </div>
               </div>
         </div>
        </div>
        <script> 
$(document).ready(function(){
  $("#pr_feed").hide();
  $("#stud_report").hide();
  //for student personal profile
  $("#st_profile").click(function(){
        $("#pr_feed").hide();
        $("#stud_report").hide();
   $("#profile").animate({
    height:'toggle'
   },'slow');});
     //for inner staff profile page
  $("#feed_btn").click(function(){
       $("#profile").hide();
       $("#stud_report").hide();
   $("#pr_feed").animate({
    height:'toggle'
   },'slow');});
   //academic
   $("#report").click(function(){
       $("#profile").hide();
       $("#pr_feed").hide();
   $("#stud_report").animate({
    height:'toggle'
   },'slow');});
});
</script> 
   
  </body>
</html>
<?php 

?>
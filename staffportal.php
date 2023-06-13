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
$stafname=$stafage=$qualification=$experience=$subjects=$contact=$bloodgroup=$adress="";
$displayvalues=$conn->query("SELECT * FROM staff_details WHERE staff_id='$user'");
$stafdetails=$displayvalues->fetch_assoc();
if(isset($stafdetails)){
$stafname=$stafdetails['staff_name'];
$stafage=$stafdetails['staf_age'];
$qualification=$stafdetails['qualification'];
$experience=$stafdetails['experience'];
$subjects=$stafdetails['subjects_handeling'];
$contact=$stafdetails['contact_no'];
$bloodgroup=$stafdetails['bloodgroup'];
$adress=$stafdetails['Address'];
}
$displayfeedback=$conn->query("SELECT * FROM parent_feedback");
//student marks
$studentname1=$tamil=$english=$maths=$science=$socialscience=$total=$result=$studentid="";
if(isset($_POST['a_stud_mark_btn'])){
$studentid=$_POST['admin_mark_stud'];
$getresult1=$conn->query("SELECT * FROM studentmarkdetails_qa_10 WHERE stud_id='$studentid'");
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
}}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Staff_portal</title>
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
  }.prof h3{
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
    <div class="container-fluid ">
    <button class="btn btn-primary" id="menubtn">Menus</button>
        <div class="row   ">
            <div class="col-md-2 slist" id="hid">
              <ul>
                <li class="list-item"><a href="">HOME</a></li>
                <li class="list-item"><a href="logout.php">ADMIN</a></li>
                <li class="list-item"><a href="logout.php">LOGIN</a></li>
                <li class="list-item"><a href="stud_mark_upload.php">UPLOAD_STD_MARK</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
                <li class="list-item"><a href="#">ASDFDFG</a></li>
             </ul>
            </div>
        <div class="col-md-8 content">
        <nav class="navbar navbar-expand-sm bg-primary navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item ">
      <button class="btn btn-success mr-3 "data-toggle="" data-target="" id="sta_profile">Profile</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3">SalaryDetails</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3" id="st-mark">StudentMarkDetails</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3"data-toggle="" data-target=""id="feed_btn">FeedBack</button>
    </li>
    <li class="nav-item">
    <button class="btn btn-success mr-3"><a class="text-light" href="stud_mark_upload.php">updateMarks</a></button>
    </li>
  </ul>
</nav>
<div class="container" >
   <div class="row"id="profile">
    <div class="col-8 prof">
       <h3><?php echo $stafname?></h3>
       <h4>AGE:  <?php echo $stafage?></h4>
       <h4>BloodGroup: <?php echo $bloodgroup?></h4>
       <h4>Qualification:  <?php echo $qualification?></h4>
       <h4>Contactno:  <?php echo $contact?></h4>
       <h4>Experience:  <?php echo $experience?></h4>
       <h4>Subjects:  <?php echo $subjects?></h4>
       <h4>Adress: <?php echo $adress?></h4>

    </div>
    <div class="col-4">
     <img src="lotousimage.png"  alt="no_image" width="300px" height="300px">
    </div>

   </div>
         <!--student marks-->
         <div class="container-fluid "id="stud_report">
  <div class="row" >
    <div class="col-3">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="a_mark_student" class="form-group">
          <input type="text" name="admin_mark_stud" placeholder="student-ID" class="form-control mt-2 mb-2" required>
          <input type="submit" value="GetRecord" name="a_stud_mark_btn" class="btn btn-primary mt-1 mb-3" >
         </form>
    </div>
  </div>
  <div class="row " id="">
       <div class="col-md-10">
                  <h2><?php ECHO $studentid?></h2>
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
</div>
<!--end-->
<div class="container"id="feed">
   <div class="row">
    
  <?php while($feed=$displayfeedback->fetch_assoc()){
                    echo "<div class='col-12 bg-success mt-1 mb-1'>";
                     echo "<h5>".$feed['student_id']."</h5><br>";
                     echo "<h5>".$feed['Student_name']."</h5><br>";
                     echo "<h6>".$feed['feedback']."</h6><br>";
                     echo "<h6>".$feed['suggestion']."</h6><br><hr>";
                     echo "</div>";
                  
                    }?>
                    
                    </div>
</div>
         </div>
        </div>

        <script> 
$(document).ready(function(){
  $("#feed").hide();
  $("#stud_report").hide();
  $("#menubtn").click(function(){
    console.log("helloworld");
    $("#hid").animate({
      height: 'toggle'
    },"slow");
  });
  //for student personal profile
  $("#sta_profile").click(function(){
        $("#feed").hide();
        $("#stud_report").hide();
   $("#profile").animate({
    height:'toggle'
   },'slow');});
     //for inner staff profile page
  $("#feed_btn").click(function(){
       $("#profile").hide();
       $("#stud_report").hide();
   $("#feed").animate({
    height:'toggle'
   },'slow');});
   //
   $("#st-mark").click(function(){
    $("#profile").hide();
    $("#feed").hide();
      $("#stud_report").animate({
    height:'toggle'
   },'slow');});
});
</script> 
   
  </body>
</html>
<?php 

?>
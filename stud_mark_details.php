

<?php

if(!empty($_POST['button'])){
    session_start();
    $studentid=$_POST['std_id'];
      $studentage=$_POST['std_exam'];
  $tamil=$_POST['tamil'];
  $english=$_POST['english'];
  $maths=$_POST['maths'];
  $science=$_POST['science'];
  $ss=$_POST['ss'];
  $total=$tamil+$english+$maths+$science+$ss;
  if($tamil>=50 &&$english>=50 &&$maths>=50 &&$science>=50 &&$ss>=50){
     $result="Pass";
  }else{
    $result="Fail";
  }

  
//databaseconnection
$servername="localhost";
$username="root";
$password="";
$database="gokulprojectdb";
$conn=new mysqli($servername,$username,$password,$database);

if($conn==True){

  $datacheck1=$conn->query("SELECT * FROM student_details WHERE stud_id='$studentid'");
  
   if($datacheck1->num_rows==1){
    $studname=$datacheck1->fetch_assoc();
       if(isset($studname)){
         $stud_name=$studname['Student_name'];
                 $class=$studname['Class Details'];
                 $datacheck=$conn->query("SELECT stud_id FROM studentmarkdetails_qa_10 WHERE stud_id='$studentid'");
        if($datacheck->num_rows==1){
            $_SESSION['info1']= "<div class='alert alert-danger'>student mark detail already avilable</div>";
              header('location:stud_mark_upload.php');
           }else{
            $conn->query(" INSERT INTO `studentmarkdetails_qa_10`(`stud_id`, `student_name`, `studying`, `tamil`, `english`, `maths`, `science`, `socialScience`, `totalMarks`, `result`)
             VALUES ('$studentid','$stud_name','$class','$tamil','$english','$maths','$science','$ss','$total','$result')");
             $_SESSION['info1']= "<div class='alert alert-success'>mark update sucess</div>";
             header('location:stud_mark_upload.php');
           }
        }else{
            $_SESSION['info1']= "<div class='alert alert-danger'>student detail not avilable a</div>";
            header('location:stud_mark_upload.php');
        }
       }else{
    $_SESSION['info1']= "<div class='alert alert-danger'>student id not avilable</div>";
    header('location:stud_mark_upload.php');
}

} else{

}
}
?>


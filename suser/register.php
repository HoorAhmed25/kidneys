<?php session_start ();
require_once '../connection.php';
if(isset($_POST['submit'])){
    $nationalId = $_POST['nationalId'];
    $FnationalId = $_POST['FnationalId'];
    $nationality = $_POST['nationality'];
    $country = $_POST['country'];
    $uname = $_POST['uname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bmi = $weight / (($height/100)*($height/100));
    $diabetesCheck = $_POST['diabetesCheck'];
    $pressure = $_POST['systolic'].'/'.$_POST['diastolic'];
    $visit = $_POST['visit'];
    $date = date("Y/m/d");
    $location = $_POST['location'];
    $diabetes = $_POST['diabetes'];
    $bloodpressure = $_POST['bloodpressure'];
    $heartdisease = $_POST['heartdisease'];
    $smoking = $_POST['smoking'];
    $HbA1c = $_POST['HbA1c'];
    $triglycerides = $_POST['triglycerides'];
    $hdl = $_POST['hdl'];
    $egrf = $_POST['egrf'];
    $ldl = $_POST['ldl'];
    $creatinine = $_POST['creatinine'];
    $cholesterol = $_POST['cholesterol'];
    $gov = $_POST['gov'];
    
$ins="INSERT INTO patients (nationalId,FnationalId,nationality,nationalityc,name,gender,age,mobile,height,weight,BMI,visit,date,location,bloodpressure,diabetes,heartdisease,diabetesCheck,pressure,hba,triglycerides,hdl,egfr,ldl,creatinine,cholesterol,smoking,governorate)VALUES ('$nationalId','$FnationalId ','$nationality','$country','$uname','$gender','$age','$phone','$height','$weight','$bmi','$visit','$date','$location','$bloodpressure','$diabetes','$heartdisease','$diabetesCheck','$pressure','$HbA1c','$triglycerides','$hdl','$egrf','$ldl','$creatinine','$cholesterol','$smoking','$gov')";
$query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
if($query) 
{ 
       echo '<script type="text/javascript">';
     echo ' alert("تم التسجيل بنجاح");';
    echo '</script>';
  echo '<script type="text/javascript">';echo'window.location.href="form.php";';echo '</script>';
    
}
    else{
           echo '<script type="text/javascript">';
     echo ' alert("عفواً! لم يتم التسجيل");';
    echo '</script>';
         echo '<script type="text/javascript">';echo'window.location.href="form.php";';echo '</script>';
    }
}


?>
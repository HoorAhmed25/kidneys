<?php session_start (); include '../connection.php'; ?><html dir="rtl">
   <head>
      <title>وزارة الصحة و السكان - مبادرة فحص و علاج الامراض المزمنة</title>
       <meta charset="UTF-8">
        <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="../css/all.min.css">
      <link rel="stylesheet" href="../css/animate.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
       <link rel="stylesheet" href="../css/style.css">
       <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
      <body>
          <?php
if(isset($_GET['nationalId']) && !empty($_GET['nationalId'])){
    include ('../connection.php');
    $nationalID= $_GET['nationalId'];
    $location = $_GET['locationn'];
    $gov = $_GET['gov'];
    $query= "SELECT * FROM patients WHERE nationalId = '$nationalID' AND nationalId != '0' limit 1 ";
    $do= mysqli_query($conn,$query);
    $count= mysqli_num_rows($do);
    $countA = $conn->query("SELECT COUNT(DISTINCT visit) as visit FROM patients WHERE nationalId = '$nationalID' AND nationalId != '0' ");
    $custCountA = $countA->fetch_all(MYSQLI_ASSOC);
	$totalCustomer = $custCountA[0]['visit'] +1;
    if($count >0){
        while($result= mysqli_fetch_array($do)){?>
           <section class="container" id="result">
                  
                   <div class="col-3 mr-4 font-weight-bold"><p class="text-right"><?php echo "التاريخ  : " . date("Y/m/d"); ?></p></div>
               
        <h4 class="container-fluid headOfRep mb-2 pb-2" >البيانات الأساسية 
          <p id="showHide" onclick="toggleForm()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h4>
   <form name="Info" method="post" action="register.php">
     <input type="text" style="display:none;" value="<?php echo $location; ?>" name="location">
       <input type="text" style="display:none;" value="<?php echo $gov; ?>" name="gov">
<section>
    <div id="form-container" class="container">
         <div class="form-check col-6">
                <label class="form-check-label pt-2 pl-2">الجنسية : </label>
               <input onchange="foreignerCheck()" type="radio" name="nationality" id="egyptian" value="مصرى" checked >
                <label class="ml-3"  for="egyptian"> مصرى </label>
              
            </div>
            
        <div class="row">
           <div id="enational" class="mb-3 col-3">
    <label for="nationalId" class="form-label">الرقم القومى :</label>
    <input type="text" class="form-control w-75" name="nationalId" id="nationalId"  value="<?php echo $result['nationalId'];?>" readonly>
   
  </div> 
            
      
               <div id="fcountry" class="mb-3 col-3" style="display:none;">
    <label for="country" class="form-label">بلد الجنسية :</label>
   <input type="text" class="form-control w-75" name="country" id="country" maxlength="50" autocomplete="off" value="<?php echo $result['nationalityc'];?>" readonly>
            </div>
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم (كما هو مدون بالبطاقة أو وثيقة السفر)</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off" value="<?php echo $result['name'];?>" readonly>
    
  </div>
        </div>
        
        
        <div class="row">
       <div class="form-check col-3">
                <label class="form-check-label pt-2 pl-2">النوع : </label>
               <input  type="text" class="form-control w-75" name="gender" id="male" value="<?php echo $result['gender'];?>" readonly>
            </div>
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" value="<?php echo $result['age'];?>" readonly>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
    <input type="tel" class="form-control w-75" name="mobile" id="phone" value="<?php echo $result['mobile'];?>" onkeypress="return isNumberKey(event)" maxlength="11" autocomplete="off" readonly>
                </div>
                 <div class="mb-3 col-3">
    <label for="visit" class="form-label">رقم الزيارة :</label>
 <input type="text" class="form-control " name="visit" id="visit" value="<?php echo $totalCustomer;?>"  autocomplete="off" readonly>                              
  </div>
         </div>   
       
    </div>
 <hr>
    <h4 class="container-fluid headOfRep mb-2 pb-2" > التاريخ الطبي
          <p id="showHideRep" onclick="toggleFormRep()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h4>
        <div class="form-container-rep text-right" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
      
                
             <div  class="mb-3 col-4 mr-3">
    <label for="diabetes" class="form-label">هل يوجد إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onchange="blood1(); Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
                 <p id="diabetesError" style=" color:red;"></p>
  </div>        
                
                
               <div  class="mb-3 col-4">
    <label for="bloodpressure" class="form-label">هل يوجد إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange="blood(); Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
                   <p id="bloodError" style="color:red;"></p>
  </div>        
            </div>
            

              <div class="row pt-2 mb-4">
      
                
             <div  class="mb-3 col-4 mr-3">
    <label for="heartdisease" class="form-label">هل يوجد إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" onchange="heart();">
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
                 <p id="heartError" style="display:none; color:red;">* من فضلك اختر قيمة صحيحة</p>
  </div>        
                
                
               <div  class="mb-3 col-4">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="smoke();">
      <option value=" ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
                   <p id="smokingError" style="display:none; color:red;">* من فضلك اختر قيمة صحيحة</p>
  </div>        
            </div>

   
            </div>
   
    
   
    
   
    
     <hr>
  <h4 class="container-fluid headOfRep mb-2 pb-2" >الفحوصات الطبية
          <p id="showHideRep" onclick="toggleFormRep()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck(); Check()" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck(); Check()" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
  </div> 
               <div class="mb-3 pt-1 col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck(); Check()" required>
    <p id="heightError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); Check()" autocomplete="off" required>
             <p id="weightError"  style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label">  مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
                     <div class="row">
               <div class="mb-3 col-3 ">
    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck(); Check()" required>
                   <p id="diabetesError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
						 </div> 
            </div>
            <div class="row">
             <div class="mb-3 col-3" id="hba1cDiv"  style="display:none;">
    <label for="HbA1c" class="form-label">HbA1c :</label><br>
    <input type="number" class="form-control w-75" name="HbA1c" id="HbA1c" autocomplete="off" min="4"  max="16" onchange="Check1()"> 
   <p id="hba1cError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
  </div>
            
       <div id="egfrDiv" class="mb-3 col-3 " style="display:none;">
    <label for="egrf" class="form-label">eGFR :</label>
    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off">
                                  
						 </div> 
                            <div id="creatinineDiv" class="mb-3 col-3 " style="display:none;">
    <label for="creatinine" class="form-label">Creatinine :</label>
    <input type="text" class="form-control w-75 " name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off" onchange="Check1()">
                        <p id="creatinineError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>        
						 </div> 
			 </div>
            
               <div class="row">
           
             <div class="mb-3 col-3" id="triglycaridDiv" style="display:none;" >
    <label for="triglycerides" class="form-label">Triglycerides :</label><br>
    <input type="number" class="form-control w-75" name="triglycerides" id="triglycerides" autocomplete="off" min="50"  max="5000" onkeypress="return isNumberKey(event)" onchange="Check1()"> 
   <p id="triglyError" style="color:red;"></p>
  </div>
                 <div class="mb-3 col-3" id="hdlDiv" style="display:none;" >
    <label for="hdl" class="form-label">HDL :</label><br>
    <input type="number" class="form-control w-75 " name="hdl" id="hdl" autocomplete="off" onkeypress="return isNumberKey(event)" min="20"  max="100" onchange="Check1()"> 
                     <p id="hdlError" style="color:red;"></p>
  </div>
            
                          
                              <div id="ldlDiv" class="mb-3 col-3 " style="display:none;">
    <label for="ldl" class="form-label">LDL :</label>
    <input type="number" class="form-control w-75" name="ldl" id="ldl" min="30"  max="250"  onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="Check1()">
                                  <p id="ldlError" style="color:red;"></p>
						 </div> 
                            <div id="cholesterolDiv" class="mb-3 col-3 " style="display:none;">
    <label for="cholesterol" class="form-label">Total Cholesterol :</label>
    <input type="number" class="form-control w-75" name="cholesterol" id="cholesterol" min="50" max="500"  maxlength="3" autocomplete="off" onchange="Check1(); message(); ">
                                <p id="cholesterolError" style="color:red;"></p>
						 </div> 
            
            </div>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
    </div>
	   </section>
       
       <hr>
   <h3 class="container-fluid headOfRep mb-2 pb-2" >متابعة زيارات المريض 
          <p id="showHideRep" onclick="toggleFormRep()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h3>
       <div>
       
       <table id="tblData" class="table table-striped table-bordered">
	        	<thead>
                    <tr>  
                    <th>رقم الزيارة </th>
                    <th>تاريخ الزيارة</th>
                    <th>مكان الزيارة</th>
                    <th> مؤشر كتلة الجسم</th>
                    <th>السكر العشوائى</th>
                    <th>ضغط الدم</th> 
                      <th>HbA1c</th>   
                     <th>Triglycerides</th>   
                      <th>HDL</th>  
                    <th>eGFR</th>  
                        <th>LDL</th>
                        <th>Creatinine</th>
                        <th>Total Cholesterol</th>
                    </tr>    
           </thead>
                    <tbody>
                       <?php $result = $conn->query("SELECT * FROM patients where nationalId = '$nationalID' ORDER BY visit DESC");
	$customers = $result->fetch_all(MYSQLI_ASSOC);
                         foreach($customers as $customer) :  
                        ?>
                        <tr>
                        
                         <td> <?php echo $customer['visit'];?></td>
                         <td> <?php echo $customer['date'];?></td>
                        <td> <?php echo $customer['location'];?></td>
                         <td> <?php echo $customer['BMI'];?></td>
                         <td> <?php echo $customer['diabetesCheck'];?></td>
                         <td> <?php echo $customer['pressure'];?></td>
                            
                           <td> <?php echo $customer['hba'];?></td>
                         <td> <?php echo $customer['triglycerides'];?></td>
                         <td> <?php echo $customer['hdl'];?></td> 

                           <td> <?php echo $customer['egfr'];?></td>
                         <td> <?php echo $customer['ldl'];?></td>
                         <td> <?php echo $customer['creatinine'];?></td>  
                         <td> <?php echo $customer['cholesterol'];?></td>  
       </tr>   
                        <?php  endforeach;?>
           </tbody>
      
           </table>
        
       </div> 
       
    <button class="btn btn-lg text-white submitButton" type="submit" name="submit"  onclick="return confirm('هل جميع البيانات صحيحة؟');">حفظ  </button>
    <button class="btn btn-lg text-white backButton" type="button" name="back">
           <a href="../index.php">خروج</a></button>
		</form>
        </section>
          <?php
    ;}
        
    }
    else{?>
      <section class="container" id="result">
                  
                   <div class="col-3 mr-4 font-weight-bold"><p class="text-right"><?php echo "التاريخ  : " . date("Y/m/d"); ?></p></div>
                  
        <h4 class="container-fluid headOfRep mb-2 pb-2" >البيانات الأساسية 
          <p id="showHide" onclick="toggleForm()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h4>
        
   <form name="Info" method="post" action="register.php">
       <input type="text" style="display:none;" value="<?php echo $location; ?>" name="location">
       <input type="text" style="display:none;" value="<?php echo $gov; ?>" name="gov">
<section>
    <div id="form-container" class="container" >
         <div class="form-check col-6">
                <label class="form-check-label pt-2 pl-2">الجنسية : </label>
               <input onchange="foreignerCheck()" type="radio" name="nationality" id="egyptian" value="مصرى" checked >
                <label class="ml-3"  for="egyptian"> مصرى </label>
              <input onchange="foreignerCheck()" type="radio" name="nationality" id="foreigner" value="غير مصرى">
             <label for="foreigner">غير مصرى </label>
            </div>
        <div class="row">
           <div id="enational" class="mb-3 col-3">
    <label for="nationalId" class="form-label">الرقم القومى :</label>
    <input type="text" class="form-control w-75" name="nationalId" id="nationalId"  maxlength="14" autocomplete="off"  onchange="validationID()" value="<?php echo $nationalID; ?>">
        <p id="idError"  style="display:none; color:red;">*خطأ فى الرقم القومى</p>
  </div> 
            
          <div id="fnational" class="mb-3 col-3" style="display:none;">
    <label for="FnationalId" class="form-label">  رقم جواز السفر / رقم وثيقة اللجوء :</label>
    <input type="text" class="form-control w-75" name="FnationalId" id="FnationalId" onkeypress="return isNumberKey(event)" maxlength="15" autocomplete="off">
  </div> 
               <div id="fcountry" class="mb-3 col-3" style="display:none;">
    <label for="country" class="form-label">بلد الجنسية :</label>
    <select name="country" id="country" class="form-select w-75 form-control" >
      <option value=" "  selected>--اختر بلد الجنسية--</option>
        <?php
       require_once '../connection.php';
       $query= "select * from country";
       $do= mysqli_query($conn,$query)or die('error'.mysqli_error($conn));
       while($row=mysqli_fetch_array($do)){
      echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
       }
       ?>
    </select>                               
  </div>
         <div class="mb-3 col-6">
    <label for="uname" class="form-label">الاسم (كما هو مدون بالبطاقة أو وثيقة السفر) :</label>
    <input type="text" class="form-control w-75" name="uname" id="uname" maxlength="50" autocomplete="off" onfocus="validationID(); Check()" onkeypress="return CheckArabicCharactersOnly(event);" required>
    
  </div>
        </div>
        
        
        <div class="row">
       <div class="form-check col-3">
                <label class="form-check-label pt-2 pl-2">النوع : </label>
               <input  type="radio" name="gender" id="male" value="ذكر" checked >
                <label class="ml-3"  for="male"> ذكر </label><br>
           <label class="form-check-label pl-2" style="visibility:hidden;">النوع : </label>
              <input  type="radio" name="gender" id="female" value="أنثى">
             <label for="female">أنثى</label>
            </div>
              <div id="eage" class="mb-3  col-3">
    <label for="age" class="form-label">السن :</label>
    <input type="number" class="form-control w-75" name="age" id="age" required>
  </div>
            
            <div class="mb-3 col-3">
    <label for="phone" class="form-label">تليفون :</label>
    <input type="text" class="form-control w-75" name="phone" id="phone" onkeypress="return isNumberKey(event)" onchange="phoneValidation()" maxlength="11" autocomplete="off" required>
                <p id="phoneError" style="display:none; color:red;">* رقم هاتف غير صحيح </p>
                </div>
                    <div  class="mb-3 col-3">
    <label for="visit" class="form-label">رقم الزيارة :</label>
   <input type="number" class="form-control w-75" name="visit" id="visit" value="1" readonly>                       
  </div>
         </div>   
          
    </div>
    <hr>
     <h4 class="container-fluid headOfRep mb-2 pb-2" > التاريخ الطبي
          <p id="showHideRep" onclick="toggleFormRep()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h4>
        <div class="form-container-rep text-right" style="background-color:#eeeeee;">
            <div class="row pt-2 mb-4">
      
                
             <div  class="mb-3 col-4 mr-3">
    <label for="diabetes" class="form-label">هل يوجد إصابة بمرض السكر :</label>
    <select name="diabetes" id="diabetes" class="form-select w-75 form-control" onchange="blood1(); Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select> 
                 <p id="diabetesError" style=" color:red;"></p>
  </div>        
                
                
               <div  class="mb-3 col-4">
    <label for="bloodpressure" class="form-label">هل يوجد إصابة بمرض ضغط الدم :</label>
    <select name="bloodpressure" id="bloodpressure" class="form-select w-75 form-control" onchange="blood(); Check()">
      <option value=" "  >--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>     
                   <p id="bloodError" style="color:red;"></p>
  </div>        
            </div>
            

              <div class="row pt-2 mb-4">
      
                
             <div  class="mb-3 col-4 mr-3">
    <label for="heartdisease" class="form-label">هل يوجد إصابة بأمراض القلب :</label>
    <select name="heartdisease" id="heartdisease" class="form-select w-75 form-control" onchange="heart();">
      <option value=" ">--اختر--</option>
       <option value="نعم" >نعم</option>
         <option value="لا">لا</option>
    </select>  
                 <p id="heartError" style="display:none; color:red;">* من فضلك اختر قيمة صحيحة</p>
  </div>        
                
                
               <div  class="mb-3 col-4">
    <label for="smoking" class="form-label">التدخين :</label>
    <select name="smoking" id="smoking" class="form-select w-75 form-control" onchange="smoke();">
      <option value=" ">--اختر--</option>
       <option value="مدخن" >مدخن</option>
         <option value="غير مدخن">غير مدخن</option>
         <option value="مدخن سابق">مدخن سابق</option>
    </select> 
                   <p id="smokingError" style="display:none; color:red;">* من فضلك اختر قيمة صحيحة</p>
  </div>        
            </div>

   
            </div>
   
    
   
    
     <hr>
  <h4 class="container-fluid headOfRep mb-2 pb-2" >الفحوصات الطبية
          <p id="showHideRep" onclick="toggleFormRep()">
          <i class="fas fa-chevron-up"></i>  
        </p>  
            </h4>
        <div class="form-container-rep text-right pr-3" style="background-color:#eeeeee;">
               <div class="row">
                    <div class="mb-3 col-3" >
    <label for="pressureeCheck" class="form-label">الضغط :</label><br>
    <input type="number" class="form-control  d-inline" name="systolic" id="systolic" placeholder="systolic" autocomplete="off" onchange="errorCheck(); Check()" min="60" max="260" style="width:45%;"  required> <span class="font-weight-bold">/</span>
    <input type="number"  class="form-control  d-inline" name="diastolic" id="diastolic" placeholder="diastolic" autocomplete="off" onchange="errorCheck(); Check()" min="30" max="150" style="width:47%;" required>
                        <p id="pressureError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
  </div> 
               <div class="mb-3 pt-1 col-3 ">
    <label for="height" class="form-label"> الطول(سم):</label>
    <input type="number" class="form-control w-75 " name="height" id="height" min="50"  max="300" onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="errorCheck(); Check()" required>
    <p id="heightError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
  </div> 
         <div class="mb-3 col-3 ">
    <label for="weight" class="form-label"> الوزن(كجم) :</label>
    <input type="number" class="form-control w-75" name="weight" id="weight" min="40"  max="250" onkeypress="return isNumberKey(event)" maxlength="3" onchange="bmiCalculate(); errorCheck(); Check()" autocomplete="off" required>
             <p id="weightError"  style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
						 </div> 
   
                   
                     <div id="bmiDiv" class="mb-3 col-3" style="display:none;">
    <label for="bmi" class="form-label">  مؤشر كتلة الجسم:</label>
<p id="bmi" name="bmi" style="width:200px; height:40px; background-color:white;  border-radius: 5px; border:2px solid #FBE6C2; padding-top:8px; padding-bottom:8px; padding-right:2px; color:black;" maxlength="5"></p>
     
  </div>    
                    </div>
                     <div class="row">
               <div class="mb-3 col-3 ">
    <label for="diabetesCheck" class="form-label"> فحص السكر(العشوائى) :</label>
    <input type="number" class="form-control w-75" name="diabetesCheck" id="diabetesCheck" min="7"  max="600" onkeypress="return isNumberKey(event)" maxlength="4" autocomplete="off" onchange="errorCheck(); Check()" required>
                   <p id="diabetesError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
						 </div> 
            </div>
            <div class="row">
             <div class="mb-3 col-3" id="hba1cDiv"  style="display:none;">
    <label for="HbA1c" class="form-label">HbA1c :</label><br>
    <input type="number" class="form-control w-75" name="HbA1c" id="HbA1c" autocomplete="off" min="4"  max="16" onchange="Check1()"> 
   <p id="hba1cError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>
  </div>
            
       <div id="egfrDiv" class="mb-3 col-3 " style="display:none;">
    <label for="egrf" class="form-label">eGFR :</label>
    <input type="number" class="form-control w-75" name="egrf" id="egrf"  onkeypress="return isNumberKey(event)" maxlength="2" autocomplete="off">
                                  
						 </div> 
                            <div id="creatinineDiv" class="mb-3 col-3 " style="display:none;">
    <label for="creatinine" class="form-label">Creatinine :</label>
    <input type="text" class="form-control w-75 " name="creatinine" id="creatinine" min="0.1" max="15"  maxlength="4" autocomplete="off" onchange="Check1()">
                        <p id="creatinineError" style="display:none; color:red;">* من فضلك ادخل قيمة صحيحة</p>        
						 </div> 
			 </div>
            
               <div class="row">
           
             <div class="mb-3 col-3" id="triglycaridDiv" style="display:none;" >
    <label for="triglycerides" class="form-label">Triglycerides :</label><br>
    <input type="number" class="form-control w-75" name="triglycerides" id="triglycerides" autocomplete="off" min="50"  max="5000" onkeypress="return isNumberKey(event)" onchange="Check1()"> 
   <p id="triglyError" style="color:red;"></p>
  </div>
                 <div class="mb-3 col-3" id="hdlDiv" style="display:none;" >
    <label for="hdl" class="form-label">HDL :</label><br>
    <input type="number" class="form-control w-75 " name="hdl" id="hdl" autocomplete="off" onkeypress="return isNumberKey(event)" min="20"  max="100" onchange="Check1()"> 
                     <p id="hdlError" style="color:red;"></p>
  </div>
            
                          
                              <div id="ldlDiv" class="mb-3 col-3 " style="display:none;">
    <label for="ldl" class="form-label">LDL :</label>
    <input type="number" class="form-control w-75" name="ldl" id="ldl" min="30"  max="250"  onkeypress="return isNumberKey(event)" maxlength="3" autocomplete="off" onchange="Check1()">
                                  <p id="ldlError" style="color:red;"></p>
						 </div> 
                            <div id="cholesterolDiv" class="mb-3 col-3 " style="display:none;">
    <label for="cholesterol" class="form-label">Total Cholesterol :</label>
    <input type="number" class="form-control w-75" name="cholesterol" id="cholesterol" min="50" max="500"  maxlength="3" autocomplete="off" onchange="Check1(); message(); ">
                                <p id="cholesterolError" style="color:red;"></p>
						 </div> 
            
            </div>
            <p id="message" style="color:red; font-size:18px;"></p>
	        <p id="message1" style="color:red; font-size:18px;"></p>
            <p id="message2" style="color:red; font-size:18px;"></p>
            <p id="message3" style="color:red; font-size:18px;"></p>
    </div>
	   </section>
       
       <hr>

       
             <button class="btn btn-lg text-white submitButton" type="submit" name="submit"  onclick="return confirm('هل جميع البيانات صحيحة؟');">
                 حفظ  </button>
       <button class="btn btn-lg text-white backButton" type="button" name="back">
           <a href="../index.php">خروج</a></button>
 

    
       
		</form>
        </section>
        

          <?php
    }
}



else{
    
    echo 'Error';
}


?>

          
          <script src="../js/jquery-3.3.1.min.js"></script> 
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
       <script>
       
function validationID() {
    var str = document.getElementById("nationalId").value;
    var res = str.split('');
    var Array = res;
    var month = Array[3] + Array[4];
    var day = Array[5] + Array[6];
    console.log(res);
    console.log(Array);
     var length = str.length;
        if (length !== 14)
        {
            document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        }

        // Check the left most digit
		if (Array[0] != 2 && Array[0] != 3)
		{
			document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
		}
		if(month < 01 && month > 12){
           document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        }
		
     if(day < 01 && day > 31){
            document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        }
		
    var res1 = Array[0] * 2;
    var res2 = Array[1] * 7;
    var res3 = Array[2] * 6;
    var res4 = Array[3] * 5;
    var res5 = Array[4] * 4;
    var res6 = Array[5] * 3;
    var res7 = Array[6] * 2;
    var res8 = Array[7] * 7;
    var res9 = Array[8] * 6;
    var res10 = Array[9] * 5;
    var res11 = Array[10] * 4;
    var res12 = Array[11] * 3;
    var res13 = Array[12] * 2;
    var res14 = Array[13];
    console.log(res1);
    var totalres = (res1 + res2 + res3 + res4 + res5 + res6 + res7 + res8 + res9 + res10 + res11 + res12 + res13);
    console.log(totalres);
    var x = totalres / 11;
    var out = parseInt(x) * 11;
    var ot = totalres - out;
    console.log(ot);
    var y = 11 - ot;
    console.log(y);
    if (res14 == y) {
        document.getElementById("idError").style.display = "none";
    } else {
        document.getElementById("idError").style.display = "block";
        document.getElementById("idError").style.color = "red";
        return false;
    }
    if (Array[12] % 2 == 0) {
        document.getElementById("female").checked = true;
        console.log("female");

    } else {
        document.getElementById("male").checked = true;
        console.log("male");
    }
    if (Array[0] == 2) {
        var today = new Date();
        var currentYear = today.getFullYear();
        console.log (currentYear);
        var yearArray = 19 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        console.log(age);
        document.getElementById("age").value = age;
        console.log(birthday);
        console.log(yearArray);
    }

    if (Array[0] == 3) {
       var today = new Date();
        var currentYear = today.getFullYear();
        console.log (currentYear);
        var yearArray = 20 + Array[1] + Array[2];
        var month = Array[3] + Array[4];
        var day = Array[5] + Array[6];
        var birthday = month + '/' + day + '/' + yearArray;
        var age = currentYear - yearArray;
        console.log(age);
        document.getElementById("age").value = age;
        console.log(birthday);
        console.log(yearArray);
    }

} 
function phoneValidation(){
    var phone = document.getElementById("phone").value;
    var numbers = phone.split('');
    var ArrayPhone = numbers;
    var startPhone = ArrayPhone[0] + ArrayPhone[1];
    console.log(startPhone);
    if(phone.length != 11 || startPhone != 01){
        document.getElementById("phoneError").style.display = "block";
    }
    else{
        document.getElementById("phoneError").style.display = "none";
    }
}  
            function blood1(){
               var diabetes1 = document.getElementById("diabetes").value;
    if(diabetes1 === 'نعم' || diabetes1 === 'لا' ){
        console.log(diabetes1);
        
         document.getElementById("diabetesError").innerHTML = "";
    }
    else{
       document.getElementById("diabetesError").innerHTML = "* من فضلك اختر قيمة صحيحة";
    } 
            }   
              
function blood(){
        
    var bloodpressure = document.getElementById("bloodpressure").value;
               console.log(bloodpressure);
    if(bloodpressure === ' ' || bloodpressure === null){
        document.getElementById("bloodError").innerHTML = "* من فضلك اختر قيمة صحيحة";
    }
    else{
        document.getElementById("bloodError").innerHTML = " ";
   
    }
    }
function heart(){
    var heartdisease = document.getElementById("heartdisease").value;
                   console.log(heartdisease);
    if(heartdisease === ' ' || heartdisease === null){
        document.getElementById("heartError").style.display = "block";
    }
    else{
        document.getElementById("heartError").style.display = "none";
    }
                  
              }
function smoke(){
var smoking = document.getElementById("smoking").value;
                 console.log(smoking);
    if(smoking === ' ' || smoking === null){
        document.getElementById("smokingError").style.display = "block";
    }
    else{
        document.getElementById("smokingError").style.display = "none";
    }
                  
              }
function errorCheck(){
         var height = document.getElementById("height").value;
    var diastolic = document.getElementById("diastolic").value;
    var systolic = document.getElementById("systolic").value;
    var weight = document.getElementById("weight").value;
     var diabetesCheck = document.getElementById("diabetesCheck").value;
  if(diastolic < 30 || diastolic > 150 || systolic < 60 || systolic > 260){
   
        document.getElementById("pressureError").style.display = "block";
      console.log(height);
      console.log(weight);
    }
    else{
        document.getElementById("pressureError").style.display = "none";
    }
   if(weight > 250){
        document.getElementById("weightError").style.display = "block";
    }
    else{
        document.getElementById("weightError").style.display = "none";
    }
     if(height > 300){
        document.getElementById("heightError").style.display = "block";
    }
    else{
        document.getElementById("heightError").style.display = "none";
    }
     if(diabetesCheck > 600){
        document.getElementById("diabetesError").style.display = "block";
    }
    else{
        document.getElementById("diabetesError").style.display = "none";
    }
}
function Check(){
   var age = document.getElementById("age").value;
    var height = document.getElementById("height").value;
    var diabetesCheck = document.getElementById("diabetesCheck").value;
    var bloodpressure = document.getElementById("bloodpressure").value;
    var heartdisease = document.getElementById("heartdisease").value;
    var diastolic = document.getElementById("diastolic").value;
    var systolic = document.getElementById("systolic").value;
    var phone1 = document.getElementById("phone").value;
    var weight = document.getElementById("weight").value;
    var diabetes = document.getElementById("diabetes").value;
    console.log(phone1);
    console.log(weight);
    console.log(diabetes);
    console.log(bloodpressure);
if(age <= 18){
   document.getElementById("buttonSubmit").style.display = "none";
    console.log("less 18"); 
}
if(diabetesCheck >= 160 || bloodpressure == 'نعم' || diabetes == 'نعم' || heartdisease == 'نعم' || diastolic >= 90 || systolic >= 140 || age >= 60){
        document.getElementById("hba1cDiv").style.display = "block";
        document.getElementById("triglycaridDiv").style.display = "block";
        document.getElementById("hdlDiv").style.display = "block";
        document.getElementById("egfrDiv").style.display = "block";
        document.getElementById("ldlDiv").style.display = "block";
        document.getElementById("creatinineDiv").style.display = "block";
        document.getElementById("cholesterol").style.display = "block";
        document.getElementById("cholesterolDiv").style.display = "block";
    }
    else{
        document.getElementById("hba1cDiv").style.display = "none";
        document.getElementById("triglycaridDiv").style.display = "none";
        document.getElementById("hdlDiv").style.display = "none";
        document.getElementById("egfrDiv").style.display = "none";
        document.getElementById("ldlDiv").style.display = "none";
        document.getElementById("creatinineDiv").style.display = "none";
        document.getElementById("cholesterol").style.display = "none";
        document.getElementById("cholesterolDiv").style.display = "none";
    }
  
}
function Check1(){
     var hbA1c = document.getElementById("HbA1c").value;
     var creatinine = document.getElementById("creatinine").value;
     var triglycerides = document.getElementById("triglycerides").value;
     var hdl = document.getElementById("hdl").value;
     var ldl = document.getElementById("ldl").value;
     var cholesterol = document.getElementById("cholesterol").value;
    if(hbA1c < 4 || hbA1c > 16){
        document.getElementById("hba1cError").style.display = "block";
    }
    else{
        document.getElementById("hba1cError").style.display = "none";
    }
    if(creatinine < 0.1 || creatinine > 15){
        document.getElementById("creatinineError").style.display = "block";
    } 
    else{
        document.getElementById("creatinineError").style.display = "none";
    }
    if(triglycerides < 50 || triglycerides > 5000){
    document.getElementById("triglyError").innerHTML= "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("triglyError").innerHTML = " ";
    }
     if(hdl < 20 || hdl > 100){
       document.getElementById("hdlError").innerHTML= "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("hdlError").innerHTML = " ";
    }
    
     if(ldl < 30 || ldl > 250){
        document.getElementById("ldlError").innerHTML= "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("ldlError").innerHTML = " ";
    }
     if(cholesterol < 50 || cholesterol > 500){
        document.getElementById("cholesterolError").innerHTML= "* من فضلك ادخل قيمة صحيحة";
    }
    else{
        document.getElementById("cholesterolError").innerHTML = " ";
    }
   
}
           function message(){
     var hbA1c = document.getElementById("HbA1c").value;
     var creatinine = document.getElementById("creatinine").value;
     var triglycerides = document.getElementById("triglycerides").value;
     var hdl = document.getElementById("hdl").value;
     var ldl = document.getElementById("ldl").value;
    var cholesterol = document.getElementById("cholesterol").value;
    var egrf = document.getElementById("egrf").value;
    var diastolic = document.getElementById("diastolic").value;
    var systolic = document.getElementById("systolic").value;
    var diabetesCheck = document.getElementById("diabetesCheck").value;
    if(egrf > 90){
        document.getElementById("message").innerHTML = " * تحتاج إلى متابعة وظائف الكلى بعد عام  ";
         console.log("more");
    }
    else if (egrf >= 60 && egrf <= 89){
         document.getElementById("message").innerHTML = 
             " *  تحتاج إلى متابعة وظائف الكلى بعد 6 شهور للأهمية وعدم تناول أدوية إلا بعد استشارة الطبيب ";
         console.log("between");
    }
     else if (egrf <= 60 ){
         document.getElementById("message").innerHTML = " * يتم التحويل لأقرب عيادة كلى تخصصية ";
    }
               else{
                   document.getElementById("message").innerHTML = "  ";
               }
    
                if(diabetesCheck >= 200){
     document.getElementById("message1").innerHTML = " * تحتاج إلى متابعة مستوى السكر بالدم للأهمية  ";
 }
   else{
     document.getElementById("message1").innerHTML = " ";   
   }
    if(triglycerides >= 150 || cholesterol >= 200 || ldl >= 100){
        document.getElementById("message2").innerHTML = " * تحتاج إلى متابعة مستوى الدهون بالدم للأهمية  ";
    }
    else{
        document.getElementById("message2").innerHTML = " ";
    }
     if(systolic >= 140 || diastolic >= 90){
         document.getElementById("message3").innerHTML = " * تحتاج إلى متابعة ضغط الدم للأهمية  ";
     }
               else{
                   document.getElementById("message3").innerHTML = "  ";
               }
      }
               
        function CheckArabicCharactersOnly(e) {
               if(document.getElementById("egyptian").checked){
var unicode = e.charCode ? e.charCode : e.keyCode
if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
if (unicode == 32)
return true;
else {
if ((unicode < 0x0600 || unicode > 0x06FF)) //if not  arabic
return false; //disable key press
}
}
}
               else if (document.getElementById("foreigner").checked){
                   console.log("ellse");
  var charCode = (e.which) ? e.which : e.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return true;
        return false;
    
               }
           } 
               
           
          </script> 
    </body>
</html>


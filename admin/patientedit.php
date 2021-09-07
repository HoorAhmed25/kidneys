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
         <nav> 
        <div class="row">
        <div class="col-1"><img src="../img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:75px;  margin-top:10px;"/></div>
            <div class="col-4">
             
            <h6 class="text-white" style=" font-weight: bold;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h6>
            
            </div>
            <div class="col-5"></div>
      <div class="dropdown show d-inline">
  <a class="h3 dropdown-toggle float-left ml-4 mt-4 text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['name']; ?> 
  </a>

  <div class="dropdown-menu float-left" aria-labelledby="dropdownMenuLink">
       <a class="dropdown-item text-center border-bottom" href="home.php">الرئيسية</a>
     <a class="dropdown-item text-center border-bottom" href="search.php">تسجيل بيانات مريض</a>
      <a class="dropdown-item text-center border-bottom" href="followup.php">متابعة</a>
    <a class="dropdown-item text-center" href="../index.php">تسجيل خروج</a>
    
  </div>
</div>
            
            </div>
		</nav>
        <!----   
          <?php 

if(isset($_POST['editpatient'])){
    $id= $_POST['edit_id'];
    $sql= "select * from patients where ID='$id'";
    $query= mysqli_query($conn,$sql) or die("error:".mysqli_error($conn));
    $result = mysqli_fetch_array($query);?>
 <form name="updatecontactform"  method="post" action="update.php">
     <h1 class="text-center font-weight-bold">"تعديل بيانات المريض"</h1>
      <div class="line1 text-center"></div>
     <input type="hidden" name="id" value="<?php echo $result['ID'];?>">
         <div class="col-6">
            <div class="form-group"><label>رقم التليفون:</label><input name="fname" class="form-control" type="text" value="<?php echo $result['mobile'];?>"></div>
            <div class="form-group"><label>Last name:</label><input name="lname" class="form-control" type="text" value="<?php echo $result['lname'];?>"></div>
            <div class="form-group"><label>Phone:</label><input name="phone" class="form-control" type="number" value="<?php echo $result['phone'];?>"></div>                
            
            <div class="form-group">
                <div class="form-group"><label>Email:</label><input name="email" class="form-control" type="email" value="<?php echo $result['email'];?>"></div>
                <label>Message:</label><br><textarea cols="80" rows="7" name="msg" class="form-control-sm" type="text" value="<?php echo $result['msg'];?>"></textarea></div>
     <div class="form-group"><label>Subject:</label><input name="subject" class="form-control-sm" type="text" value="<?php echo $result['subject'];?>"></div>
        <a href="admin.php" class="btn btnback">Cancel</a>
        <button type="submit" name="updatecontact" class="btn btnback">Update</button>
     </div>
        </form>
        <?php 
}?>
---->
          <h2 class="text-center">  هذة الصفحة تحت الانشاء</h2>
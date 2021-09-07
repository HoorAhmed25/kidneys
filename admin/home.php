<?php session_start();if(empty($_SESSION['Login']) || $_SESSION['Login'] == ''){
    header("Location: ../index.php");
    die();
} else{include '../connection.php'; ?><html dir="rtl">

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
      <a class="dropdown-item text-center border-bottom" href="report.php">تقارير</a>
      <a class="dropdown-item text-center border-bottom" href="followup.php">متابعة</a>
      <a class="dropdown-item text-center border-bottom" href="admin.php">الإدارة</a>
    <a class="dropdown-item text-center " href="../index.php">تسجيل خروج</a>
    
  </div>
</div>
            
            </div>
		
       
		</nav>
       
      <div class="container mt-3" style="background-color: #eeeeee; height: 520px;" >
          <h1 class="heading text-center pt-4" style="font-family: Cairo;">مبادرة السيد رئيس الجمهورية </h1>
          <h2 class="heading text-center pt-1"> لـفحـص و علاج الأمـراض الـمـزمنة و الكشف الـمـبـكر للاعتلال الـكلـوى </h2>
          
		  <div class="row">
              <div class="col-1"></div>
              <div onclick="location.href='report.php'" class="previous col-3 ml-3">
        <p class="text-center" style="font-size:24px;"><i class="fas fa-chart-line"></i></p>
        <p class="text-center" style="font-size:24px;">متابعة تقارير</p>
      </div>
               <div onclick="location.href='followup.php'" class="previous col-3  ml-3 ">
		  <p class="text-center" style="font-size:24px;"><i class="fas fa-users"></i></p>
		  <p class="text-center" style="font-size:24px;"> متابعة</p>
		  </div>
              
              <div onclick="location.href='admin.php'" class="previous col-3 ml-3">
		  <p class="text-center" style="font-size:24px;"><i class="fas fa-cog"></i></p>
		  <p class="text-center" style="font-size:24px;">الإدارة</p>
		  </div>
              
			  </div>
</div>
		
        <footer style="position:fixed;">
        <p style="font-size:19px;"> &copy; 2021 جميع الحقوق محفوظة لوزارة الصحة و السكان المصرية. </p>
        
        </footer>

        
          <script src="../js/jquery-3.3.1.min.js"></script> 
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <script src="../js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="../js/mine.js"></script>
    </body>
</html>
<?php
      }?>
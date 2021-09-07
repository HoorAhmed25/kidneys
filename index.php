<?php  session_start(); ?><html dir="rtl">
   <head>
       <title>وزارة الصحة و السكان - مبادرة فحص و علاج الامراض المزمنة</title>
       <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="css/all.min.css">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
	   <link rel="preconnect" href="https://fonts.gstatic.com">
       <link rel="stylesheet" href="css/style.css">
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	 
    </head>
    <body style="color:#765e0d;">
        <nav style="background-color: transparent;"> 
		  <div class="row">
            <div class="col-1"><img src="img/Ministry_of_Health_and_Population_of_Egypt.png" class="img-fluid" style="height:75px;  margin-top:10px;"/></div>
            <div class="col-4">
             
            <h5  style=" font-weight: bold; color:white;">
                  <br>جمهورية مصر العربية
                 <br>وزارة الصحة و السكان
              
                </h5>
            
            </div>
            </div>
		</nav>
			<div class="card-body container WOW fadeIn text-center" style="padding-top:50px; width:400px; height:450px;">
                <h2>مبادرة السيد رئيس الجمهورية <br>  لـفحـص و علاج الأمـراض الـمـزمنة و الكشف الـمـبـكر للاعتلال الـكلـوى  </h2>
				<form name="login" action="" method="POST">
					<div class="form-group pt-3">
						<input name="username" type="text" class="form-control" placeholder="اسم المستخدم" autocomplete="off" required ><br>
                        
						<input name="password" type="password" class="form-control" placeholder="**********" autocomplete="off" required><br>
                        
                        <button class="btn btn-lg text-white loginButton" type="submit" name="login" >دخول</button>
					</div>
				</form>
			</div>
<?php
    require_once 'connection.php';
    if(isset($_POST['login'])){
      $username = $_POST['username'];
        $password = $_POST['password'];
        $ins="SELECT * FROM user WHERE username = '$username' AND password = '$password' limit 1";
        $query= mysqli_query($conn,$ins) or die("error:".mysqli_error($conn));
        $result = mysqli_fetch_array($query);
          $permission = $result['permission'];
         $_SESSION['name'] = $result['name'];
        $_SESSION['governorate'] = $result['governorate'];
        $_SESSION['Login'] = "Loggedin";
        if(mysqli_num_rows($query)==1){
         
          if($permission == 1){
             echo '<script type="text/javascript">';echo'window.location.href="admin/home.php";';echo '</script>';
          }
            
           elseif($permission == 2){
                echo '<script type="text/javascript">';echo'window.location.href="normalUser/form.php";';echo '</script>';
           } 
            
             elseif($permission == 3){
                echo '<script type="text/javascript">';echo'window.location.href="suser/form.php";';echo '</script>';
           } 
           } 
        else {
          echo "<script type='text/javascript'>alert('اسم المستخدم او كلمة السر خطأ');</script>";
        
        }

 }?>


        
          <script src="js/jquery-3.3.1.min.js"></script> 
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>  
        <script src="js/wow.min.js"></script> 
        <script>new WOW().init();</script> 
        <script src="js/mine.js"></script>
    </body>
</html>
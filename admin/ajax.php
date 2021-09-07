<?php
if(isset($_GET['governorate']) && !empty($_GET['governorate'])){
    echo 'DONE';
    include ('../connection.php');
    $id= $_GET['governorate'];
    $query= "select  name from qism where gov_id='$id'";
    $do= mysqli_query($conn,$query);
    $count= mysqli_num_rows($do);
    if($count >0){
        echo 'DONE!';
        echo '<option>--اختر--</option>';
        while($row= mysqli_fetch_array($do)){
            
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
        
    }

    else {
        echo 'error1';
    }
}



else{
    
    echo 'Error';
}

?>
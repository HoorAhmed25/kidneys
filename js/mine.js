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
   

           
function toggleForm(){
    var form = document.getElementById("form-container");
    var showHide = document.getElementById("showHide");
    
    if(form.style.display == "none")
        {
            
        form.style.display = "block";
        showHide.innerHTML = '<i class="fas fa-chevron-up"></i>';
        }
    else
        {
            
        form.style.display = "none";   
showHide.innerHTML = '<i class="fas fa-chevron-down"></i>';

        }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function foreignerCheck(){
    console.log("check");
    if(document.getElementById("egyptian").checked){
        console.log("egypt");
        document.getElementById("enational").style.display = "block";
        document.getElementById("fnational").style.display = "none";
        document.getElementById("fcountry").style.display = "none";
       
        
    }
    else{
        console.log("not");
        document.getElementById("enational").style.display = "none";
        document.getElementById("fnational").style.display = "block";
        document.getElementById("fcountry").style.display = "block";
        
    }
}
function bmiCalculate(){
   var height = document.getElementById("height").value / 100;
var weight = document.getElementById("weight").value;
var bmi = weight / (height*height);
    var result = bmi.toFixed(2);
   // var bmiText = document.getElementById("bmi").innerHTML;
   if (height > 0 && weight > 0){
       console.log(result);
       document.getElementById("bmiDiv").style.display = "block";
       document.getElementById("bmi").innerHTML = result
        
   }
    else{
        
        document.getElementById("bmiDiv").style.display = "none";
        document.getElementById("heightError").style.display = "block";
        document.getElementById("weightError").style.display = "block";
    
    }
}

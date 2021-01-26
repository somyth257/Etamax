<?php include "functions.php";

if(isset($_POST['s_submit'])){
    $db_roll=$_POST['s_roll'];
    $db_username=$_POST['s_user'];
     $db_password=$_POST['s_pass'];
     $db_sem=$_POST['sem'];
     $db_phone=$_POST['ph'];
    $db_email=$_POST['email'];
    
    conn();
    
   /* $hash="$2y$10$";
    $salt="iusesomecrazystrings22";
    $hashnsalt=$hash.$salt;
    $db_password=crypt($db_password,$hashnsalt);*/
    
    $query="INSERT INTO signup(s_roll,s_user,s_pass,sem,phone,email) VALUES('$db_roll','$db_username','$db_password','$db_sem','$db_phone','$db_email')";
    
    $res=mysqli_query($connection,$query);
    
    if(!$res){
      //header("Location: error.php");//gives error when roll no is signed in twice
      echo "<script>alert(' ROLL NO ALREADY EXISTS')</script>";
    }
    else if(strlen($db_roll)!=6){
        echo "<script>alert('DATA NOT SUBMITTED ,ROLL NO SHOULD BE OF 6 DIGITS')</script>";
    }
     else{
        echo "<script>alert('DATA SUBMITTED SUCCESSFULLY')</script>";
    }
    
  

}

?>

<!doctype html>
<html>
 <head>
<meta charset="utf-8">

<link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="box">
    <h2>Signup</h2>
    <form action="signup.php" method="post">
        <div class="inputbox">
        <input type="text" name="s_user" required > 
            <label>Name</label>
        </div>
         
             <label style="color: white";  >Semester</label>
    <select  name="sem" required>
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="6">6</option>
        <option value="8">8</option>
    </select> <br> <br> 
        
        <div class="inputbox">
        <input type="number" name="s_roll" required > 
            <label>Roll no</label>
        </div>
         <div class="inputbox">
        <input type="email" name="email" required> 
            <label>Email</label>
        </div>
         <div class="inputbox">
        <input type="number" name="ph" required > 
            <label>Ph no</label>
        </div>
        <div class="inputbox">
        <input type="password" name="s_pass" required> 
            <label>Password</label>
        </div>
        
        <input type="submit" name="s_submit" value="Submit">
        
<span class="psw">Already have an account? <a href="login.php" style="color:red">Login</a></span>
             <div class="container" style="background-color:#f1f1f1"> 
        
    
  </div>
        </form>
    </div>
    </body>
</html>
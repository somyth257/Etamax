<?php include "functions.php";?>
<?php session_start();
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    conn();
    
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    
    $hash="$2y$10$";
    $salt="iusesomecrazystrings22";
    $hashnsalt=$hash.$salt;
    $password=crypt($password,$hashnsalt);
    
    //$query="INSERT INTO login(user_name,user_pass) VALUES('$username','$password')";
    //$res=mysqli_query($connection,$query);
    
    $select_query_signup="SELECT * FROM signup WHERE s_roll='$username'";
    $res1=mysqli_query($connection,$select_query_signup);
    
    if(!$res1){
        die("FAILED".mysqli_error($connection));
    }
    
        while($row=mysqli_fetch_array($res1)){
        $db_user=$row['s_roll'];
        $db_pass=$row['s_pass'];
        $db_name=$row['s_user'];
        $db_sem=$row['sem'];
        $db_phone=$row['ph'];
        $db_email=$row['email'];
            
            
        $hash="$2y$10$";
        $salt="iusesomecrazystrings22";
        $hashnsalt=$hash.$salt;
        $db_pass=crypt($db_pass,$hashnsalt);
        }

    
    $admin_user=111111;
    $admin_pass="admin";
    $hash="$2y$10$";
    $salt="iusesomecrazystrings22";
    $hashnsalt=$hash.$salt;
    $admin_pass=crypt($admin_pass,$hashnsalt);
    
   // if(strlen($username)!=6){
   //     echo "<script>alert('THE ROLL NO SHOULD BE A 6 DIGIT NUMBER')</script>";
   // }
    
    

    
  if($username == $db_user && $password == $db_pass){
      $_SESSION['name']=$db_name;
      $_SESSION['roll']=$db_user;
      $_SESSION['sem']=$db_sem;
      $_SESSION['phone']=$db_phone;
      $_SESSION['email']=$db_email;
     
      header("Location: Home_login.php");
    
  }
    else if($username == $admin_user && $password == $admin_pass){
          header("Location: admin.php");
      }
    else{
      header("Location: error.php"); 
    }
    
    
    
  
     
    
}

?>



<!doctype html>
<html>
 <head>
<meta charset="utf-8">

<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="box">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <div class="inputbox">
        <input type="text" name="username" required> 
            <label>Roll no</label>
        </div>
        <div class="inputbox">
        <input type="password" name="password" required> 
            <label>Password</label>
        </div>
        <input type="submit" name="login" value="Login">
        
          <div class="container" style="background-color:#f1f1f1">
              
    <span class="psw">Do not have an account? <a href="signup.php" style="color:red">Sign up</a></span>
  </div>
        </form>
    </div>
    </body>
</html>
<?php include "functions.php";

conn();

$select_query_admin="SELECT * FROM signup";
$res1=mysqli_query($connection,$select_query_admin);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <style>
        table,th,td{
            border-collapse: collapse;
            border: 1px solid black;
        }
        table{
            margin: auto;
        }
        #i{
        
            display: block;
            margin:auto;
            padding: 10px;
        }
    
    
    </style>
</head>
<body>
  <form action="admin.php" method="post">
   <table>
       <tr>
           <th>ROLL NO</th>
           <th>NAME</th>
           <th>SEM</th>
           <th>PHONE</th>
           <th>EMAIL</th>  
           <th>EVENT1</th> 
           <th>EVENT2</th> 
           <th>EVENT3</th> 
           <th>EVENT4</th> 
           <th>EVENT5</th> 
           <th>EVENT6</th> 
           <th>EVENT7</th> 
           <th>EVENT8</th> 
           <th>EVENT9</th> 
           <th>ELIGIBLE?</th>
           <th>PAID?</th>
           <th>RESULT</th>
       </tr>
       <?php
       


       
 while($row=mysqli_fetch_array($res1)){
    $db_user=$row['s_roll'];
    $db_name=$row['s_user'];
    $db_sem=$row['sem'];
    $db_phone=$row['phone'];
    $db_email=$row['email'];
    $db_event1=$row['event1'];
    $db_event2=$row['event2'];
    $db_event3=$row['event3'];
    $db_event4=$row['event4'];
    $db_event5=$row['event5'];
    $db_event6=$row['event6'];
    $db_event7=$row['event7'];
    $db_event8=$row['event8'];
    $db_event9=$row['event9'];
    $db_pay=$row['paid'];
  
     
    if(($db_event1 =='Y' or $db_event2 =='Y' or $db_event3 =='Y') and ($db_event4 =='Y' or $db_event5 =='Y' or $db_event6 =='Y') and ($db_event7 =='Y' or $db_event8 =='Y' or $db_event9 =='Y')){
        $db_eligible="YES";
    }
     else{
         $db_eligible="NO";
     }
     
    if(@$_POST[$db_user]!=null){
    if(isset($_POST['admin'])){
    $payment=$_POST[$db_user];
    $query="UPDATE signup SET paid='$payment' WHERE s_roll={$db_user} ";
    $pay_res=mysqli_query($connection,$query);
    if(!$pay_res){
        die("FAILED".mysqli_error($connection));
    }
        else{
            header("Location: admin.php");//if not done,we need to press update button twice
        }
    }
    }
     
   
     
    echo "<tr>";
    echo "<td>$db_user</td>";
    echo "<td>$db_name</td>";
    echo "<td>$db_sem</td>";
    echo "<td>$db_phone</td>";
    echo "<td>$db_email</td>";
    echo "<td>$db_event1</td>";
    echo "<td>$db_event2</td>";
    echo "<td>$db_event3</td>";
    echo "<td>$db_event4</td>";
    echo "<td>$db_event5</td>";
    echo "<td>$db_event6</td>";
    echo "<td>$db_event7</td>";
    echo "<td>$db_event8</td>";
    echo "<td>$db_event9</td>";
    echo "<td>$db_eligible</td>";
    echo "<td>Y<input type='radio' name='$db_user' value='YES' > N<input type='radio' name='$db_user' value='NO'></td>";
    echo "<td>$db_pay</td>";
    echo "</tr>";
     
}
       ?>
       
   </table>
   <br>
   <br>
   <input type="submit" name="admin" value="UPDATE" id="i">
   </form>
    
</body>
</html>
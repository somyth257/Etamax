<?php include "functions.php";

conn();
echo "<script>alert('WRONG USERNAME OR PASSWORD')</script>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERROR!!!!!!!!!!!</title>
    <style>
        a{
            font-size: 50;
            text-decoration: none;
            color: white;
        }
        button{
             margin: auto;
            text-align: center;
            display: block;
            padding:10px;
            background-color: green;
            border-radius: 20px;
            
        }
    </style>
</head>
<body>
    <button><a href="login.php">Try Again</a></button>
</body>
</html>
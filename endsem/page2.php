<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["username"])&&isset($_POST["email"])&&isset($_POST["phone"])&&isset($_POST["class"])){
        $username=$_POST["username"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $class=$_POST["class"];

        function validate($username,$email,$phone,$class){
            //username should contain only characters
            $v1=preg_match('/[a-zA-Z]/',$username);
            //email should be of gmail or yahoo
            $v2=preg_match('/[a-zA-Z0-9]+@(gmail|yahoo)\.com/',$email);
            //phone should be of 10 digits beginning with 0 6 9
            $v3=(strlen($phone)==10)&&preg_match('/^[0|6|9][0-9]{9}/',$phone);
            //class should be gold silver or platinum
            $v4=preg_match('/(gold|silver|platinum)/',$class);
            if(!$v1||!$v2||!$v3||!$v4){
                return false;
            }
            else{
                return true;
            }
        }
        if(validate($username,$email,$phone,$class)){
            echo "All validations passed.";
            $sql="SELECT * FROM `users` WHERE `username`='$username'";
            $conn=mysqli_connect("localhost","root","","endsem");
            $query=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($query);
            if($row){
                echo "Username already exists.";
                $sql="SELECT * FROM `users` WHERE `email`='$email'";
                $query=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($query);
                
            }
            else{
                $sql="INSERT into `users` (`username`,`email`,`phone`,`class`) values ('$username','$email','$phone','$class')";
                $query=mysqli_query($conn,$sql);
                if($query){
                    echo "Inserted succesfully.";
                }
                else{
                    echo "Could not insert.";
                }
            }
        }
        else{
            echo "Invalid input.";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 2</title>
</head>
<body>
    <form>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="phone">Phone:</label>
        <input type="number" name="phone" id="phone">
        <br>
        <label for="class">Class:</label>
        <input type="text" name="class" id="class">
        <br>
        <button>Submit</button>
    </form>
</body>
</html>
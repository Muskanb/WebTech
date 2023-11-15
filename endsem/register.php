<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST["username"]&&$_POST["password"]&&$_POST["email"]){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        $flag=false;

        
        function validate($username,$password){
            $uppercase=preg_match('@[A-Z]@',$password);
            $lowercase=preg_match('@[a-z]@',$password);
            $number=preg_match('@[0-9]@',$password);
            $specialChars=preg_match('@[^\w]@',$password);

            if(!$uppercase||!$lowercase||!$number||!$specialChars||strlen($password)<8||strlen($username)<10){
                return false;
            }
            else{
                return true;
            }
        }

        //add other validations

        $conn=mysqli_connect("localhost","root","","endsem");
        if(!$conn)
        {
            echo "Unable to connect!";
        }
        else{
            $sql="INSERT into `users` (`username`,`password`,`email`) values ('$username','$password','$email')";

            if(validate($username,$password)){
                echo "All validations passed.";
                $query=mysqli_query($conn,$sql);
                if($query){
                    echo "Inserted succesfully.";
                }
                else{
                    echo "Could not insert.";
                }
            }
            else{
                echo "Invalid password.";
            }
        }
        mysqli_close($conn);

    }
    else{
        echo "Missing fields...";
    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register Form</h1>
    <form action=" " method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <br>
        <button>Submit</button>
    </form>
</body>
</html>
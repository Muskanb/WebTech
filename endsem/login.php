<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST["username"]&&$_POST["password"]){
        $username=$_POST["username"];
        $password=$_POST["password"];

        $conn=mysqli_connect("localhost","root","","endsem");
        if(!$conn)
        {
            echo "Unable to connect!";
        }
        else{
            $sql="SELECT * FROM `users` WHERE `username`='$username'";

            // if($flag)
            //add validation checks
            
            $query=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($query);
            //check if password matches
            if($row["password"]==$password){
                echo "Login successful."."<br>";
                echo "ID: " . $row["id"] . "<br>";
                echo "username: " . $row["username"] . "<br>";
                echo "email: " . $row["email"] . "<br>";
                echo "Password: " . $row["password"] . "<br>";
            }
            else{
                echo "Login failed.";
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
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button>Submit</button>
    </form>
</body>
</html>
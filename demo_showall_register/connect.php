<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn=mysqli_connect("localhost","root","","blood");
    if(!$conn){
        echo "Error connecting to the DB!";
    }
    else{
        if($_POST["username"] && $_POST["email"] && $_POST["bgroup"] && $_POST["age"])
        {
            $username=$_POST["username"];
            $email=$_POST["email"];
            $bgroup=$_POST["bgroup"];
            $age=$_POST["age"];
            $sql="INSERT into `users` (`name`,`age`,`email`,`bgroup`) values ('$username','$age','$email','$bgroup')";
            $query=mysqli_query($conn,$sql);
            if($query){
                echo "Seeded!";
            }
            else{
                echo "Could not seed!";
            }
        }
        else{
            echo "Fields Empty!";
        }
    }
    mysqli_close($conn);
}

?>
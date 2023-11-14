<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn=mysqli_connect("localhost","root","","blood");
    if(!$conn){
        echo "Failed to connect DB!";
    }
    else{
        // echo "here1";
        $sql="SELECT * FROM `users`";
        $query=mysqli_query($conn,$sql);
        if($query){
            // echo "here!";
            while ($row = $query->fetch_assoc()) {
                echo $row['name'].$row['age']."<br>";
            }
        }
        else{
            echo "Data error!";
        }
    }
    mysqli_close($conn);
}


?>
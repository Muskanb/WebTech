


<?php
////Write a PHP page to store page views count in SESSION, to increment the count   on each refresh, and to show the count on web page.
session_start();
if(isset($_SESSION['views'])){
    $_SESSION['views']++;
}
else{
    $_SESSION['views'] = 1;
}
echo "Page views: ".$_SESSION['views'];


?>

<html>
    <head>
        <title>Session</title>
    </head>
    <body>
        <h1>Session</h1>
    </body>
</html>
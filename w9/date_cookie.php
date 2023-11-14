<?php
//Write a PHP page to store current date-time in a COOKIE and display the ‘Last  visited on’ date-time on the web page upon reopening of the same page.
if(isset($_COOKIE['lastVisit'])){
    $lastVisit = $_COOKIE['lastVisit'];
    echo "Last visited on: $lastVisit";
}
else{
    echo "You've never visited this page before.";
}
setcookie('lastVisit', date('d/m/y h:i:s'), time()+60*60*24*365);
 

?>

<html>
    <head>
        <title>Cookie</title>
    </head>
    <body>
        <h1>Cookie</h1>
    </body>
</html>
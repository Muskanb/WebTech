<?php

//write a php page to read employee details in json format and display in tabular format
$employees = file_get_contents('employees.json');
$employees = json_decode($employees, true);
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Age</th><th>Salary</th></tr>";
foreach($employees as $employee){
    echo "<tr>";
    echo "<td>".$employee['name']."</td>";
    
    echo "<td>".$employee['age']."</td>";
    echo "<td>".$employee['salary']."</td>";
    echo "</tr>";
}
echo "</table>";

?>

<html>
    <head>
        <title>JSON</title>
    </head>
    <body>
        <h1>JSON</h1>
    </body>
</html>
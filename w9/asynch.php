<?php
// Assuming you have a database connection
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST["employeeId"];

    // Perform a SQL query to get employee details based on $employeeId
    $sql = "SELECT * FROM employees WHERE id = " . $employeeId;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display employee details
        $row = $result->fetch_assoc();
        echo "Employee ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        // Add more fields as needed
    } else {
        echo "Employee not found";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <h2>Employee Details</h2>

    <form id="employeeForm">
        <label for="employeeId">Employee ID:</label>
        <input type="text" id="employeeId" name="employeeId" required>
        <button type="button" onclick="getEmployeeDetails()">Get Details</button>
    </form>

    <div id="employeeDetails"></div>

    <script>
        function getEmployeeDetails() {
            var employeeId = document.getElementById("employeeId").value;

            // Using jQuery for AJAX request
            $.ajax({
                type: "POST",
                url: "get_employee_details.php",
                data: { employeeId: employeeId },
                success: function(response) {
                    $("#employeeDetails").html(response);
                },
                error: function() {
                    alert("Error fetching employee details.");
                }
            });
        }
    </script>
</body>
</html>

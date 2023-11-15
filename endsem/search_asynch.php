<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'id' parameter is set in the POST data
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Assume $conn is your database connection
        $conn = mysqli_connect("localhost", "root", "", "endsem");

        if (!$conn) {
            // Handle the connection error
            echo "Unable to connect to the database.";
        } else {
            // Use prepared statement to prevent SQL injection
            $sql = "SELECT * FROM `users` WHERE `id` = ?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    // Display employee details
                    echo "ID: " . $row["id"] . "<br>";
                    echo "Name: " . $row["username"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    // Add more fields as needed
                    //check if email belongs to domain @iitg.ac.in
                    
                } else {
                    echo "Employee not found.";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Error in prepared statement: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    } else {
        echo "Employee ID not provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Search</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Event listener for the form submission
            $("form").submit(function (event) {
                // Prevent the default form submission
                event.preventDefault();

                // Get the employee ID from the input field
                var id = $("#employee_id").val(); // Corrected variable name

                // Send an asynchronous POST request to the server
                $.ajax({
                    type: "POST",
                    url: "search_asynch.php",
                    data: { id: id }, // Corrected variable name
                    success: function (response) {
                        // Display the response from the server
                        $("#result").html(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Employee Search</h1>
    <form>
        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id">
        <button type="submit">Search</button>
    </form>
    <div id="result"></div>
</body>
</html>

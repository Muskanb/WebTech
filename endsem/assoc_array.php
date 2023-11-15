<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Create an associative array to store the form inputs
    $formData = array(
        "username" => $username,
        "password" => $password
    );

    // Now you can use $formData as needed, for example, to display or process the data
    echo "Username: " . $formData["username"] . "<br>";
    echo "Password: " . $formData["password"] . "<br>";

    // You can also store the associative array in a session variable if needed
    session_start();
    $_SESSION["formData"] = $formData;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
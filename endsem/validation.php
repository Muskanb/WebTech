<?php
session_start();

// Function to validate the password
function validatePassword($password) {
    // Password should contain at least one uppercase letter and one special character
    return preg_match('/[A-Z]/', $password) && preg_match('/[^a-zA-Z0-9]/', $password);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type = $_POST["type"];

    // Create an associative array to store the form inputs
    $formData = array(
        "username" => $username,
        "password" => $password,
        "type" => $type
    );

    // Validate password and type
    $passwordValid = validatePassword($password);
    $typeValid = in_array($type, ['A', 'B', 'C']);

    // If both password and type are valid, proceed
    if ($passwordValid && $typeValid) {
        // Now you can use $formData as needed, for example, to display or process the data
        echo "Username: " . $formData["username"] . "<br>";
        echo "Password: " . $formData["password"] . "<br>";
        echo "Type: " . $formData["type"] . "<br>";

        // You can also store the associative array in a session variable if needed
        $_SESSION["formData"] = $formData;
    } else {
        // Display error messages
        if (!$passwordValid) {
            echo "Password must contain at least one uppercase letter and one special character.<br>";
        }
        if (!$typeValid) {
            echo "Type must be A, B, or C.<br>";
        }
    }
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

    <label for="type">Type (A, B, or C):</label>
    <input type="text" id="type" name="type" pattern="[A-C]" title="Type must be A, B, or C" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>

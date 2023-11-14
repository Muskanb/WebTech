<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Group</title>
</head>
<body>
    <h1>Blood Donation Form</h1>
    <form action="connect.php" method="post">
        <label for="username">Name:</label>
        <input type="text" name="username" id="username" ><br>
        <label for="username">Age:</label>
        <input type="number" name="age" id="age" ><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" ><br>
        <label for="bgroup">Blood Group:</label>
        <input type="text" name="bgroup" id="bgroup" ><br>
        <button>Submit</button>
    </form>
    <form action="show.php" method="post"><button>Show Users</button></form>

</body>
</html>
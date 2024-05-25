<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    $sql = "INSERT INTO teachers (name, role, email) VALUES ('$name', '$role', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
</head>
<body>
    <h2>Add Teacher</h2>
    <form method="post" action="create.php">
        Name: <input type="text" name="name" required><br>
        Role: <input type="text" name="role" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" value="Add Teacher">
    </form>
    <a href="index.php">Back to list</a>
</body>
<head>
    <title>stylesheet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

</html>

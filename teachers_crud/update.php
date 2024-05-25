<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM teachers WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    $sql = "UPDATE teachers SET name='$name', role='$role', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Teacher</title>
</head>
<body>
    <h2>Update Teacher</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Role: <input type="text" name="role" value="<?php echo $row['role']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <input type="submit" value="Update Teacher">
    </form>
    <a href="index.php">Back to list</a>
</body>
<head>
    <title>stylesheet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

</html>

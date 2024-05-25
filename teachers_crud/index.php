<?php
include 'db.php';

$sql = "SELECT id, name, role, email FROM teachers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teachers List</title>
</head>
<body>
    <h2>Teachers List</h2>
    <a href="create.php">Add New Teacher</a><br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["role"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Edit</a> |
                            <a href='delete.php?id=" . $row["id"] . "'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
<head>

    <title>stylesheet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

</html>

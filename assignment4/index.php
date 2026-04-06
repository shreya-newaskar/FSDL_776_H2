<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student Registration</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="text" name="mobile" placeholder="Mobile" required>
    <input type="text" name="department" placeholder="Department" required>
    <input type="submit" name="submit" value="Add">
</form>

<?php
if (isset($_POST['submit'])) {
    mysqli_query($conn, "INSERT INTO student (name,email,mobile,department) 
    VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]','$_POST[department]')");
}
?>

<h2>Student Records</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Dept</th>
    <th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM student");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[email]</td>
    <td>$row[mobile]</td>
    <td>$row[department]</td>
    <td>
        <a href='edit.php?id=$row[id]'>Edit</a> |
        <a href='delete.php?id=$row[id]'>Delete</a>
    </td>
    </tr>";
}
?>

</table>

</body>
</html>
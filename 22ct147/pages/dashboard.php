<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location:../features/login.php");
    exit;
}
include ('db.php');
$sql = "SELECT*FROM job_applications";
$result = $conn->query($sql);
?>

<h1>Jo applications</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Resume</th>
        <th>Applied on</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['resume'] ?></td>
        <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>
</table>
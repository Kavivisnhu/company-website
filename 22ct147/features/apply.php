<?php
include('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $resume = $_POST['resume'];

    $sql = "INSERT INTO job_applications (name,email,phone,resume) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$name,$email,$phone.$resume);

    if($stmt->execute()) {
        echo "Application submitted successfully!";
    }else{
        echo "Error:" . $conn->error;
    }
}
?>

<form method="POST">
    <label>Name:</label><input type="text" name="name" required>
    <label>Email:</label><input type="email"  name="email" required>
    <label>phone:</label><input type="text"  name="phone" required>
    <label>Resume:</label><textarea name="resume" required></texyarea>
    <button type="submit">Submit</button>
</form>

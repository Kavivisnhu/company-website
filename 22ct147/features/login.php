<?php
include('db.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT*FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows >0){
        $user = $result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            $_SESSION['user'] = ['username'];
            header("Location:../pages/dashboard.php");
            exit;
        }else{
            echo "Invalid credentials.;"
        }
    }else{
        echo "Invalid credentials.;"
    }
}
?>

<form method="POST">
    <label>username:</label><input type="text" name="username" required>
    <label>password:</label><input type="password" name="password" required>
    <button type="submit">Submit</button>
</form>
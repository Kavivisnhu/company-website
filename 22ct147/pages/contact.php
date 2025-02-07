<?php
include('header.php');
include('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message= $_POST['message'];

    if (!empty($name) && !empty ($email) && !empty ($message)) {
        $sql = "INSERT INTO contact_messages(name,email,message)VALUES(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmr->bind_param("sss",$name,$email,$message);
        
        if($stmt->execute()) {
            echo "<p>Thank you for contacting us,$name! we will get back to you soon.</p>";
        }
}else{
    echo "<p> please fill out all fields.</p>";
}
}
?>

<h1> Contact Us</h1>
<form method="post">
    <label for="name">Name:</label><input type="text" id="name" name="name" required>
    <label for="email">Email:</label><input type="email" id="email" name="email" required>
    <label for="message">Message:</label><textarea id="message" name="message" required></textarea>
    
    <button type="submit"> Submit</button>
</form>
<?php include('footer.php'); ?>
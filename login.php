<?php
session_start();
include "backend/db.php";

if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass  = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($pass, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: dashboard.php");
    } else {
        echo "Invalid login!";
    }
}
?>

<form method="POST">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button name="login">Login</button>
</form>

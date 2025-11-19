<?php
include "backend/db.php";

if(isset($_POST["register"])) {
    $uname = $_POST["username"];
    $email = $_POST["email"];
    $pass  = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $query = "INSERT INTO users(username, email, password) VALUES('$uname', '$email', '$pass')";
    mysqli_query($conn, $query);

    header("Location: login.php");
}
?>

<form method="POST">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username"> <br>
    <input type="email" name="email" placeholder="Email"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <button name="register">Register</button>
</form>

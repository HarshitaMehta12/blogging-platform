<?php
session_start();
include "backend/db.php";

if(isset($_POST["publish"])) {
    $uid = $_SESSION["user_id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $cat = $_POST["category"];

    $query = "INSERT INTO posts(user_id,title,content,category)
              VALUES('$uid','$title','$content','$cat')";
    mysqli_query($conn, $query);

    header("Location: dashboard.php");
}
?>

<form method="POST">
    <h2>Create Blog</h2>
    <input type="text" name="title" placeholder="Blog Title"><br>
    <textarea name="content" rows="8"></textarea><br>
    <select name="category">
        <option>Tech</option>
        <option>Education</option>
        <option>Lifestyle</option>
    </select><br>
    <button name="publish">Publish</button>
</form>

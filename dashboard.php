<?php
session_start();
include "backend/db.php";

$user_id = $_SESSION["user_id"];
$search = $_GET["search"] ?? "";
$cat = $_GET["category"] ?? "";

$query = "SELECT * FROM posts WHERE 
          title LIKE '%$search%' 
          AND category LIKE '%$cat%'
          ORDER BY created_at DESC";

$result = mysqli_query($conn, $query);
?>

<h2>Dashboard</h2>
<a href="create_post.php">Create New Post</a>

<form method="GET">
    <input type="text" name="search" placeholder="Search Title">
    <select name="category">
        <option value="">All</option>
        <option>Tech</option>
        <option>Education</option>
        <option>Lifestyle</option>
    </select>
    <button type="submit">Filter</button>
</form>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
   <div>
        <h3><?= $row["title"] ?></h3>
        <p><?= substr($row["content"],0,100) ?>...</p>
        <a href="view_post.php?id=<?= $row['id'] ?>">Read More</a>
   </div>
<?php } ?>

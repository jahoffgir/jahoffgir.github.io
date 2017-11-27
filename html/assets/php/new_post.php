<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = $_POST['category'];
    $title = $db->real_escape_string($title);
    // $category = $db->real_escape_string($category);
    $body = $db->real_escape_string($body);
    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d G:i:s');
    $body = htmlentities($body);
    if ($title && $body && $category) {
        $query = $db->query("INSERT INTO post (user_id, title, body, category_id, posted) VALUES ('$user_id', '$title', '$body', '$category', '$date')");
        if ($query) {
            echo "Post Added";
        } else {
            echo "Error: Post not added";
        }
    } else {
        echo "Missing Data";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<style>
#wrapper {
    margin: auto;
    width: 800px;
}
label {
    display: block;
}

</style>

<body>
    <div id="wrapper">
        <div id="content">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <label>Title</label> <input type="text" name="title">
                <label for="body">Body:</label>
                <textarea name="body" cols=5 rows=10></textarea>
                <label>Category:</label>
                <select name="category">
                    <?php
                        $query = $db->query("SELECT * FROM categories");
                        while($row=$query->fetch_object()) {
                            echo "<option value='".$row->category_id."'>".$row->category."</option>";
                        }
                    ?>
                </select>
                <br />
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>

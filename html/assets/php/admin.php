<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
    include('db_connect.php');

    //post count
    $post_count = $db->query("SELECT * FROM post");
    $comment_count = $db->query("SELECT * FROM comments");

    if(isset($_POST['submit'])) {
        $newCategory = $_POST['newCategory'];

        if (!empty($newCategory)) {
            $sql = "INSERT INTO categories (category) VALUES('$newCategory')";
            $query = $db->query($sql);

            if ($query) {
                echo "New Category added";
            } else {
                echo "Could not add a new Category";
            }
        } else {
            echo 'Missing new Category';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<style>
#container {
    padding: 10px;
    width:800px;
    margin: auto;
    background: white;
}

#menu {
    height: 40px;
    line-height: 40px;
}

#menu ul {
    margin: 0;
    padding: 0;
}

#menu ul li {
    display: inline;
    list-style: none;
    margin-right: 10px;
}

#mainContent {
    clear: both;
    margin-top: 5px;
    font-size: 25px;
}

#header {
    height: 80px;
    line-height: 80px;
}

#container #header h1 {
    font-size: 45px;
    margin: 0;
}
</style>
<body>
    <div id="container">
        <div id="menu">
            <ul>
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="new_post.php">Create New Post</a></li>
                <li><a href="#">Delete Post</a></li>
                <li><a href="logout.php">Log out</a></li>
                <li><a href="../../blog.php">Blog Home Page</a></li>
            </ul>
        </div>

        <div id="mainContent">
            <table>
                <tr>
                    <td>Total Blog Post </td>
                    <td><?php echo $post_count->num_rows?></td>
                </tr>
                <tr>
                    <td>Total Comments </td>
                    <td><?php echo $comment_count->num_rows?></td>
                </tr>
            </table>

            <div id ="categoryForm">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <label for="category">Add New Category</label>
                    <input type="text" name="newCategory"/>
                    <input type="submit" name="submit" value="submit"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(!isset($_GET['id'])) {
    header('Location: ../../blog.php');
    exit();
} else {
    $id = $_GET['id'];
}
include('db_connect.php');
if (!is_numeric($id)) {
    header('Location: ../../blog.php');
    exit();
}
$sql = "SELECT title, body FROM post WHERE post_id='$id'";
$query =  $db->query($sql);
if ($query->num_rows != 1) {
    header('Location: ../../blog.php');
    exit();
}
// will run if it is clicked
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // TODO need to validate the email
    if ($email && $name && $comment) {
        $email = $db -> real_escape_string($email);
        $name = $db -> real_escape_string($name);
        $comment = $db -> real_escape_string($comment);
        $id = $db -> real_escape_string($id);
        if ($addComment = $db -> prepare("INSERT INTO comments(post_id, name, email_add, comment) VALUES (?,?,?,?)")) {
            $addComment-> bind_param("ssss", $id, $name, $email, $comment);
            $addComment -> execute();
            echo "Thank you comment was added";
            $addComment->close();
        } else {
            echo "ERROR when inserting";
        }
    } else {
        echo "ERROR";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Post</title>
</head>
<style>
    #container {
        width: 800px;
        padding: 5px;
        margin: auto;
    }
    label {
        display: block;
    }
</style>
<body>
    <div id="container">
        <div id="post">
            <?php
                $row = $query->fetch_object();
                echo "<h2>.$row->title.</h2>";
                echo "<p>.$row->body.</p>";
            ?>
            <hr />
            <div id="add-comments">
                <form action = "<?php echo $_SERVER['PHP_SELF']."?id=$id"?>" method="post">
                    <div>
                        <label>Email Address</label><input type="text" name="email">
                    </div>
                    <div>
                        <label>Name</label><input type="text" name="name">
                    </div>
                    <div>
                        <label>Comment</label><textarea name="comment"></textarea>
                    </div
                    <input type="hidden" name="post_id" value="<?php echo $id?>" />
                    <input type="submit" name="submit" value="Submit" />
                </form>
            </div>
            <div id="Comments">
                <?php
                    $query = $db->query("SELECT * FROM comments WHERE post_id='$id' ORDER BY comment_id DESC");
                    while ($row = $query->fetch_object()):

                ?>
                <div>
                    <h5><?php echo $row->name?></h5>
                    <blockquote><?php echo $row->comment?> </blockquote>

                </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</body>
</html>

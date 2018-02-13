<?php
if(!isset($_GET['id'])) {
    header('Location: blog.php');
    exit();
} else {
    $id = $_GET['id'];
}
include('assets/php/db_connect.php');
if (!is_numeric($id)) {
    header('Location: blog.php');
    exit();
}
$sql = "SELECT title, body FROM post WHERE post_id='$id'";
$query =  $db->query($sql);
if ($query->num_rows != 1) {
    header('Location: blog.php');
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
    <title><?php
                $rows = $query->fetch_object();
                echo $rows->title;
            ?></title>
</head>
<style>
    #container {
        width: 90%;
        padding-left: 5%;
        padding-right: 5%;
        margin-top: 7%;
    }
    label {
        display: block;
    }
    @media screen and (max-width: 580px) {
        #container {
            padding-top: 10%;
        }
    }
</style>
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<body>
    <nav>
        <div class="handle"><img class="menu" src="../../assets/images/icons/menu.png" alt="Menu">Menu</div>
        <div class="text_logo" ><a data-hover="CLICK ME"href="index.html"><b>&lt;jahoffgir&gt;</b></a></div>
        <ul>
            <a href="about"><li>About
            </li></a><a href="projects"><li>Projects
        </li></a><a href="blog"><li class="active">Blog
            </li></a><a href="experiences"><li>Experiences</li></a>
        </ul>
    </nav>
    <div id="container">
        <div id="post">
            <?php
                
                echo "<h2>$rows->title</h2>";
                echo html_entity_decode("<p>$rows->body</p>");
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
                    </div>
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
        <script>
	 		    $('.handle').on('click', function() {
	 		        $('nav ul').toggleClass("showing");
	 		    });
        </script>
</body>
</html>

<?php
session_start();
    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pwrd = $_POST['password'];
        // include database connection
        include('db_connect.php');
        if ((empty($user) || empty($pwrd))) {
            echo 'Mising information';
        } else {
            // TODO MORE SECURE WAY
            $user = strip_tags($user);
            $user = $db->real_escape_string($user);
            $pwrd = strip_tags($pwrd);
            $pwrd = $db->real_escape_string($pwrd);
            $pwrd = md5($pwrd);
            $query = $db->query("SELECT user_id, username FROM user WHERE username='$user' AND password='$pwrd'");
            // echo $query->num_rows;
            if ($query->num_rows === 1) {
                while($row = $query->fetch_object()) {
                    $_SESSION['user_id'] = $row->user_id;
                }
                header('Location: admin.php');
                exit();
            } else {
                echo 'Missig Information';
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
    <form action='login.php' method='post'>
        <p><label>Username</label><input type='text' name='username'/></p>
        <p><label>Password</label><input type='password'name='password' /></p>
        <input type='submit' name='submit' value='Login'/>
    </form>
</body>
</html>

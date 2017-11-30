<?php
    session_start();
    session_destroy();

    header('Location: login.php');
    exit();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
    <form action='login.php' method='post'>
        Username: <input type='text' name='username'/> <br />
        Password: <input type='password'name='password' /> <br />
        <input type='submit' name='submit' value='Login'>
    </form>
</body>
</html>

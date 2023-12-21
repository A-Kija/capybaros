<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'sitas yra prisilogines') {
        header('Location: http://localhost/capybaros/auth/index.php');
        die;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $users = file_get_contents(__DIR__.'/data/users.ser');
        $users = unserialize($users);
        foreach ($users as $user) {
            if ($user['email'] == $_POST['email']) {
                if ($user['password'] == sha1($_POST['password'])) {
                    $_SESSION['login'] = 'sitas yra prisilogines';
                    $_SESSION['name'] = $user['name'];
                    header('Location: http://localhost/capybaros/auth/authorized.php');
                    die;
                }
            }
        }
        $_SESSION['error'] = 'Wrong email or password';
        header('Location: http://localhost/capybaros/auth/login.php');
        die;
    }

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <?php if (isset($error)): ?>
        <h1 style="color: crimson;"><?= $error ?></h1>
    <?php endif ?>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    
</body>
</html>
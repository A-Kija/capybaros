<?php
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'sitas yra prisilogines') {
        header('Location: http://localhost/capybaros/auth/index.php');
        die;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ($_POST['password'] != $_POST['password2']) {
            $_SESSION['error'] = 'Passwords do not match';
            $_SESSION['old_data'] = $_POST;
            header('Location: http://localhost/capybaros/auth/register.php');
            die;
        }
        $users = file_get_contents(__DIR__.'/data/users.ser');
        $users = unserialize($users);
        // check user existence
        foreach ($users as $user) {
            if ($user['email'] == $_POST['email']) {
                $_SESSION['error'] = 'User with this email already exists';
                $_SESSION['old_data'] = $_POST;
                header('Location: http://localhost/capybaros/auth/register.php');
                die;
            }
        }
        $user = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => sha1($_POST['password']),
        ];
        $users[] = $user;
        file_put_contents(__DIR__.'/data/users.ser', serialize($users));
        header('Location: http://localhost/capybaros/auth/login.php');
        die;
    }

    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['old_data'])) {
        $old_data = $_SESSION['old_data'];
        unset($_SESSION['old_data']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to Forest</title>
</head>
<body>
    <h1>Register to Forest</h1>
    <?php if (isset($error)): ?>
        <h1 style="color: crimson;"><?= $error ?></h1>
    <?php endif ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name" value="<?= isset($old_data['name']) ? $old_data['name'] : '' ?>">
        <input type="text" name="email" value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Repeat Password">
        <button type="submit">Register</button>
    </form>
</body>
</html>
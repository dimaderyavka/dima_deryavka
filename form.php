<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);

    $errorMessage = '';

    if (isset($_POST['user'])){
        if (empty($_POST['user']) || empty($_POST['password'])) {
            $errorMessage = 'Введите имя пользователя и пароль';
        }

        $file = fopen('users.txt', 'a+');
        fwrite($file, $_POST['user']. "\t" . $_POST['password'] . PHP_EOL);
        fclose($file);

        header('Location: success.php');
        exit();

    }
    if ($errorMessage) {
        echo $errorMessage;
    }
?>

<form action="" method="POST">
	User: <input type="text" name="user" value="<?= isset($_POST['user']) ? $_POST['user'] : '' ?>" required><br>
	Password: <input type="password" name="password" required><br>
	<input type="submit" value="Register">
</form>
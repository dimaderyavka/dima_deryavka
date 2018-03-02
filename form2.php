<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

$errorMessage = '';

if (isset($_POST['user'])){
    if (empty($_POST['user']) || empty($_POST['password'])) {
        $errorMessage = 'Введите имя пользователя и пароль';
    }

        if(!$errorMessage) {
            if (file_exists('users.txt')) {
                $users = explode("\n", file_get_contents('users.txt'));
                $users = array_filter($users, function ($item){
                    return trim($item);
                });
                //var_dump($users);exit();
            } else {
                $users = [];
            }

            $users = array_map(function ($item) {
                return explode("\t", $item);
            }, $users);

            $userExists = false;

            foreach ($users as $userData) {
                if ($_POST['user'] == $userData[0]) {
                    $userExists = true;
                    break;
                }
            }

            if ($userExists) {
                $errorMessage = 'User "' . $_POST['user'] . '" was changed.';
            }
        }
    if(!$errorMessage){
        $users[] = [$_POST['user'], $_POST['password']];
        $users = array_map(function ($item) {
            return implode("\t", $item);
        }, $users);
        file_put_contents('users.txt', implode("\n", $users));

        header('Location: success.php');
        exit();
    }


}
if ($errorMessage) {
    echo $errorMessage;
}
?>

<form action="" method="POST">
    User: <input type="text" name="user" value="<?= isset($_POST['user']) ? $_POST['user'] : '' ?>" ><br>
    Password: <input type="password" name="password" ><br>
    <input type="submit" value="Register">
</form>
<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=DimaDeryavka;charset=utf8', 'DimaDeryavka', 'lbvrf29');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Success';
} catch (PDOException $exception){
    echo $exception->getMessage();
}

$sql = "SELECT * FROM slim_users ORDER BY username DESC";
$result = $pdo->query($sql);

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
    var_dump($row);
    //echo "<p>".$row['id']." | ".$row['username']."</p>";
}

$users = ['user13', 'user14', 'user15'];
$sql = "INSERT INTO slim_users (username) VALUE (:user)";
$query = $pdo->prepare($sql);

foreach ($users as $user){
    $query->bindParam('user',$user);
    $query->execute();
    $lastId = $pdo->lastInsertId();
    echo 'Пользователь'.$user.'вставлен с id = '.$lastId.'<br>';
}



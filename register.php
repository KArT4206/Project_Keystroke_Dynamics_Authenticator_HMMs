<?php
//register.php
$data = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'timings' => json_decode($_POST['timings'], true)
];

file_put_contents('users.txt', json_encode($data) . PHP_EOL, FILE_APPEND);
header('Location: login.html');
exit;
?>

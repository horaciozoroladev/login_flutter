<?php
$db = mysqli_connect('localhost', 'id19929314_root', '=dT7Jm_VpOide(oj', 'id19929314_login_flutter');

$response = new stdClass();

if (!$db) {
    $response->status = 0;
    $response->message = "Database connection failed";
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $response->status = 1;
        $response->message = "Accion con exito";
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    } else {
        $response->status = 2;
        $response->message = "Oops! hubo un error";
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}

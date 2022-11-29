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
    
    $sql = "SELECT username FROM users WHERE username = '" . $username . "'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $response->status = 2;
        $response->message = "Ya existe una cuenta con este username";
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO users(username,password) VALUES ('" . $username . "','" . $password . "')";
        $query = mysqli_query($db, $insert);
        if ($query) {
            $response->status = 1;
            $response->message = "Accion con exito";
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
        }
    }
}

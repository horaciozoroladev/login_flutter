<?php
$db = mysqli_connect('fdb30.awardspace.net', '4207008_ejemplo', '13ax7Hj[7esa2.Vi', '4207008_ejemplo');

$response = new stdClass();

if (!$db) {
    $response->message = "Database connection failed";
    echo json_encode($response);
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username FROM users WHERE username = '" . $username . "'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $response->message = "Ya existe una cuenta con este username";
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO users(username,password) VALUES ('" . $username . "','" . $password . "')";
        $query = mysqli_query($db, $insert);
        if ($query) {
            $response->message = "Accion con exito";
            echo json_encode($response);
        }
    }
}

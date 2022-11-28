<?php
$db = mysqli_connect('fdb30.awardspace.net', '4207008_ejemplo', '13ax7Hj[7esa2.Vi', '4207008_ejemplo');

$response = new stdClass();

if (!$db) {
    $response->message = "Database connection failed";
    echo json_encode($response);
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $response->message = "Accion con exito";
        echo json_encode($response);
    } else {
        $response->message = "Oops! hubo un error";
        echo json_encode($response);
    }
}

<?php 

include('config/db.php');

function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header("Refresh:0; url=". $url);
    exit();
}

function getAllActive($tableName) {
    global $con;
    $sql = "SELECT * FROM $tableName WHERE status = '0'";
    $sqlRun = mysqli_query($con, $sql);
    return $sqlRun;
}

function getSlugActive($tableName, $slug) {
    global $con;
    $sql = "SELECT * FROM $tableName WHERE slug = '$slug' AND status = '0' LIMIT 1";
    $sqlRun = mysqli_query($con, $sql);
    return $sqlRun;
}

function getIdActive($tableName, $id) {
    global $con;
    $sql = "SELECT * FROM $tableName WHERE category_id = '$id' AND status = '0'";
    $sqlRun = mysqli_query($con, $sql);
    return $sqlRun;
}

function getProductById($id) {
    global $con;
    $sql = "SELECT * FROM products WHERE category_id = '$id' AND status = '0'";
    $sqlRun = mysqli_query($con, $sql);
    return $sqlRun;
}



?>
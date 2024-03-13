<?php
include('../config/db.php');

    function redirect($url, $message) {
        $_SESSION['message'] = $message;
        header("Refresh:0; url=". $url);
        exit();
    }

    function getAll($tableName) {
        global $con;
        $sql = "SELECT * FROM $tableName";
        $sqlRun = mysqli_query($con, $sql);
        return $sqlRun;
    }

    function getId($tableName, $id) {
        global $con;
        $sql = "SELECT * FROM $tableName WHERE category_id = '$id'";
        $sqlRun = mysqli_query($con, $sql);
        return $sqlRun;
    }

    function getProductId($tableName, $id) {
        global $con;
        $sql = "SELECT * FROM $tableName WHERE product_id = '$id'";
        $sqlRun = mysqli_query($con, $sql);
        return $sqlRun;
    }
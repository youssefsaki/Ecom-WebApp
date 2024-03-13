<?php

    session_start();
    include('../functions/myFunction.php');

    if(isset($_SESSION['auth'])){

        if($_SESSION['role_as'] == 0) {
            redirect('../index.php', 'You Are Not Authorized To Access Admin Dashboard');
        }

    }else {
        redirect('../login.php', 'Login To Continue');
    }

?>
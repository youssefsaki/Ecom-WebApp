<?php

session_start();

include('../config/db.php');
include('myFunction.php');

if(isset($_POST['register-btn'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password= mysqli_real_escape_string($con, $_POST['password-one']);
    $passwordTwo = mysqli_real_escape_string($con, $_POST['password-two']);

    if(!empty($name) && !empty($phone) && !empty($email)) {

    $email_query = "SELECT * FROM users WHERE email = '$email' ";
    $email_query_run = mysqli_query($con, $email_query);

    if(mysqli_num_rows($email_query_run) > 0) {

        redirect('../register.php', 'Email Already Exists');

    }
    else 
    {
    if($password == $passwordTwo) {

        $inserted_data = "INSERT INTO users (name, phone, email, password) VALUES('$name','$phone','$email','$password')";
        $inserted_data_run = mysqli_query($con, $inserted_data);

        if ($inserted_data_run) {
            redirect('../login.php', 'You Are Registered Successfully');
        }
        else {
            redirect('../register.php', 'Something Went Wrong');
        }

    }
    else {
        redirect('../register.php', 'Password Do Not Match');
    }
    }
}else {
    redirect('../register.php', 'It Looks Like You Missed Something');
}
}

else if(isset($_POST['login-btn'])){

    $email = mysqli_real_escape_string($con, $_POST['email']); //! For Sql Injection 
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $checkQuery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $checkQueryRun = mysqli_query($con, $checkQuery);

    if(mysqli_num_rows($checkQueryRun) > 0) {

        $userData = mysqli_fetch_array($checkQueryRun);
        $userName = $userData['name'];
        $userEmail = $userData['email'];
        $roleAs    = $userData['role_as'];

        $_SESSION['auth'] = true;

        $_SESSION['auth_user'] = [
            'name'  => $userName,
            'email' => $userEmail
        ];

        $_SESSION['role_as'] = $roleAs;

        if($roleAs == 1) {

            redirect('../admin/index.php', 'Welcome To Dashboard');
            
        }else {

            redirect('../index.php', 'Logged In Successfully');
        
        }

    }else {
        redirect('../login.php', 'Sorry! Invalid Credentials');
    }

}

?>
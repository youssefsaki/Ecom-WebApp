<?php 
    declare(strict_types=1);
    session_start();
    include('includes/header.php');
    include('functions/myFunction.php');

    if(isset($_SESSION['auth'])){
        redirect('index.php', 'You Are Already Logged In');
        exit();
    }

 ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class='text-white'>Home / Login</h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php  unset($_SESSION['message']);} ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <form action='functions/auth.php' method='POST'>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name='email' placeholder='Enter Your Email'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name='password'
                                placeholder='Enter Your Password'>
                        </div>
                        <button type="submit" class="btn btn-primary" name='login-btn'>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>
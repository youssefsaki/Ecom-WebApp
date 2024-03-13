<?php 
    declare(strict_types=1);
    session_start();
    include('includes/header.php');
    include('functions/myFunction.php');

    if(isset($_SESSION['auth'])){
        redirect('index.php', 'You Are Already Registered');
        exit();
    }

 ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class='text-white'>Home / Register</h6>
    </div>
</div>

<div class="py-5">
    <div class="container ">
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
                        <h4>Registration Form</h4>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <form action='functions/auth.php' method='POST'>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name='name' placeholder='Enter Your Name'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name='phone'
                                placeholder='Enter Your Phone Number' autocomplete='on'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name='email' placeholder='Enter Your Email'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name='password-one'
                                placeholder='Enter Your Password'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name='password-two'
                                placeholder='Confirm Your Password'>
                        </div>
                        <button type="submit" class="btn btn-primary" name='register-btn'>Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>
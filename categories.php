<?php 

session_start();
include('includes/header.php'); 
include('functions/userFunction.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">Home / Collections</h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h1>Our Collections</h1>
                <hr>
                <div class="row">
                    <?php 
                    
                    $categories = getAllActive('categories');

                    if(mysqli_num_rows($categories) > 0) {
                            foreach($categories AS $item ) {
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image'] ?>" alt="Category Name" style='
                                                    height:240px' class='w-100' >
                                                    <h4 class='text-center py-3'><?= $item['slug'] ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                    }
                    else 
                    {
                        echo 'Not Found';
                        }
                            
                        ?>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include('includes/footer.php'); ?>


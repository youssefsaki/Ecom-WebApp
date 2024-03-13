<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/header.php'); 
include('functions/userFunction.php');

if(isset($_GET['product']))
{
    $productSlug = $_GET['product'];
    $productData = getSlugActive('products', $productSlug);
    $product = mysqli_fetch_array($productData);
    if($product) 
    {
        ?>
        <div class="py-3 bg-primary">
            <div class="container">
                <h6 class="text-white">
                    <a class='text-white' href="index.php">
                        Home /
                    </a>
                    <a class='text-white' href="categories.php">
                        Collections /
                    </a>
                    <?= $product['name']; ?> </h6>
            </div>
        </div>
        <div class="bg-light py-4">
            <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="shadow">
                                <img src="uploads/<?= $product['image'] ?>" alt="Product Image" class='w-100'>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class='fw-bold'><?= $product['name'] ?></h4>
                            <hr>
                            <p><?= $product['small_description']; ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 >Price : <span class='text-success'> <?= $product['selling_price'] ?>$</span> </h5>
                                </div>
                                <div class="col-md-6">
                                    <h5>Old Price :<s class='text-danger'> <?= $product['original_price']; ?>$ </s></h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" name="" id="">
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                        <button class="btn btn-primary px-4"><i class="fa fa-shopping-cart me-2"></i>Add To Cart</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Add To WishList</button>
                                    </div>
                                </div>
                                <hr>
                                <h6>Product Description</h6>
                                <p><?= $product['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php
    }
    else 
    {
        echo 'Product Not Found';
    }
}
else 
{
    echo 'Something Went Wrong';
}
include('includes/footer.php');
?>
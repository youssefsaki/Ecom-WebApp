<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('includes/header.php'); 
include('functions/userFunction.php');

if(isset($_GET['category']))
{

$categorySlug = $_GET['category'];
$categoryData = getSlugActive('categories', $categorySlug);
$category = mysqli_fetch_array($categoryData);
if($category) 
{
   
$categoryId   = $category['category_id'];

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
            <?= $category['name']; ?> </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h1><?= $category['name']; ?></h1>
                <hr>
                <div class="row">
                    <?php 
                    
                    $products = getProductById($categoryId);

                    if(mysqli_num_rows($products) > 0) {
                            foreach($products AS $item ) {
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="product-view.php?product=<?= $item['slug'] ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image'] ?>" alt="Product Name" style='height:240px' class='w-100' >
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


<?php 
}else {
    echo 'Something Went Wrong';
    ?>
        <a class='btn btn-primary' href="index.php">Back</a>
    <?php
}

}else {
    echo 'Something Went Wrong';
    ?>
        <a class='btn btn-primary' href="index.php">Back</a>
    <?php
}

include('includes/footer.php');

?>

 
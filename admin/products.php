<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../middleWare/middleWare.php');
include('includes/header.php');


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body">
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                
                                $products = getAll('products'); 

                                if(mysqli_num_rows($products) > 0) {
                                    foreach($products AS $product) {
                                        ?>
                            <tr>
                                <td><?= $product['product_id'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td>
                                    <img src="../uploads/<?= $product['image'] ?>" width='50px' height='50px'
                                        alt="<?= $product['name']; ?>">
                                </td>
                                <td><?= $product['status'] == '0' ? 'Visible' : 'Hidden'; ?></td>
                                <td>
                                    <a href="edit-product.php?id=<?= $product['product_id']; ?>" class='btn btn-sm btn-primary'>Edit</a>
                                </td>
                                <td>
                                    <form action="code.php" method='POST'>
                                        <input type="hidden" name="product_id" value=<?= $product['product_id'] ?>>
                                        <button class='btn btn-sm btn-danger' name='delete_btn'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                    }
                                }
                                
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ?>
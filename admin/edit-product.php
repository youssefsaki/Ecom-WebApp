<?php 
session_start();
include('../middleWare/middleWare.php');
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <?php 
            if(isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                $product = getProductId('products', $id);
                if(mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
                    ?>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Update Product
                                    <a href="products.php" class='btn btn-primary float-end'>Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method='POST' enctype='multipart/form-data'>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Id Category</label>
                                                <select name='category_id' class="form-select mb-2" ">
                                                    <option selected>Select Category</option>
                                                    <?php
                                                        $categories = getAll('categories');
                                                        if(mysqli_num_rows($categories) > 0) {
                                                        foreach($categories AS $item) {
                                                            ?>
                                                                <!-- <input type="hidden" name="category_id" value='<?= $item['category_id'] ?>'> -->
                                                                <option value="<?= $item['category_id'] ?>" <?= $data['category_id'] == $item['category_id'] ? 'selected' : ''; ?>><?= $item['name']; ?></option>
                                                    <?php
                                                        }
                                                    }else {
                                                        echo 'No Category Available';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" name="product_id" value='<?= $data['product_id'] ?>'>
                                                <label for="">Name</label>
                                                <input type="text" value='<?= $data['name'] ?>' class="form-control mb-2" name='name' required placeholder='Enter Category Name'>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Slug</label>
                                                <input type="text" value='<?= $data['slug'] ?>' class="form-control mb-2" name='slug' required placeholder='Enter slug'>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Small Description</label>
                                                <textarea name="small_description" id="" cols="30" rows="3" class='form-control mb-2'
                                                    required placeholder='Enter A Small Description'><?= $data['small_description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Description</label>
                                                <textarea name="description" id="" cols="30" rows="3" class='form-control mb-2'
                                                    required placeholder='Enter Description'><?= $data['description'] ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Original Price</label>
                                                <input type="number" value='<?= $data['original_price'] ?>' class="form-control mb-2" name='original_price' required placeholder='Enter slug'>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Selling Price</label>
                                                <input type="number" value='<?= $data['selling_price'] ?>' class="form-control mb-2" name='selling_price' required placeholder='Enter slug'>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Upload Image</label>
                                                <input type="file" class="form-control mb-2" name='image'>
                                                <label for="">Current Image</label>
                                                <img src="../uploads/<?= $data['image'] ?>" alt="Product Image" width='50px' height='50px'>
                                                <input type="hidden" name="old_image" value='<?= $data['image'] ?>'>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Quantity</label>
                                                    <input type="number" value='<?= $data['quantity'] ?>' class="form-control mb-2" name='quantity' required placeholder='Enter quantity'>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Status</label>
                                                    <input type="checkbox" value='<?= $data['status'] == '0' ? 'checked' : '' ?>' name="status" id="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Trending</label>
                                                    <input type="checkbox" value='<?= $data['status'] == '0' ? 'checked' : '' ?>' name="trending" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Meta Title</label>
                                                <input type="text" value='<?= $data['meta_title'] ?>' class="form-control mb-2" name='meta_title'
                                                    required placeholder='Enter Meta Title'>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Description</label>
                                                <textarea name="meta_description" id="" cols="30" rows="3" class='form-control mb-2'
                                                    required placeholder='Enter Meta Description'><?= $data['meta_description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Keywords</label>
                                                <textarea name="meta_keywords" id="" cols="30" rows="3" class='form-control mb-2'
                                                    required placeholder='Enter Meta Description'><?= $data['meta_keywords'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button type='submit' class='btn btn-primary' name='update_product'>Update Product</button>
                                            </div>
                                        </div>
                                    </form>
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
            echo 'Id Is Missing';
        }
        ?>
    </div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>
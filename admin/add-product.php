<?php 
session_start();
include('../middleWare/middleWare.php');
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
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
                                                <option value="<?= $item['category_id'] ?>"><?= $item['slug']; ?>
                                    </option>
                                    <?php
                                        }
                                    }else {
                                        echo 'No Category Available';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control mb-2" name='name' placeholder='Enter Category Name'>
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control mb-2" name='slug' placeholder='Enter slug'>
                            </div>
                            <div class="col-md-12">
                                <label for="">Small Description</label>
                                <textarea name="small_description" id="" cols="30" rows="3" class='form-control mb-2'
                                    placeholder='Enter A Small Description'></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="3" class='form-control mb-2'
                                    placeholder='Enter Description'></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Original Price</label>
                                <input type="number" class="form-control mb-2" name='original_price' placeholder='Enter slug'>
                            </div>
                            <div class="col-md-6">
                                <label for="">Selling Price</label>
                                <input type="number" class="form-control mb-2" name='selling_price' placeholder='Enter slug'>
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" class="form-control mb-2" name='image'>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control mb-2" name='quantity' placeholder='Enter quantity'>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" id="">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Trending</label>
                                    <input type="checkbox" name="trending" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control mb-2" name='meta_title'
                                    placeholder='Enter Meta Title'>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="3" class='form-control mb-2'
                                    placeholder='Enter Meta Description'></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" id="" cols="30" rows="3" class='form-control mb-2'
                                    placeholder='Enter Meta Description'></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type='submit' class='btn btn-primary' name='add_product'>Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>
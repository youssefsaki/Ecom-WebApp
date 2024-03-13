<?php 
session_start();
include('includes/header.php'); 
include('../middleWare/middleWare.php');
include('../config/db.php');
?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <?php if(isset($_GET['id'])) { 
                
                $id = $_GET['id'];
                $data = getId('categories', $id);

                if(mysqli_num_rows($data) > 0) {

                    $fetchedData = mysqli_fetch_array($data);

                ?>
                
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category
                                <a href="categories.php" class='btn btn-primary float-end'>Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method='POST' enctype='multipart/form-data'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id" value=<?= $fetchedData['category_id'] ?>>
                                        <label for="">Name</label>
                                        <input type="text" value=<?= $fetchedData['name'] ?> class="form-control" name='name' placeholder='Enter Category Name'>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">slug</label>
                                        <input type="text" value=<?= $fetchedData['slug'] ?> class="form-control" name='slug' placeholder='Enter slug'>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" cols="30" rows="3" class='form-control' placeholder='Enter Your Description'><?= $fetchedData['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Image</label>
                                        <input type="file" class="form-control" name='image'>
                                        <label for="">Current Photo</label>
                                        <img src="../uploads/<?= $fetchedData['image']; ?>" width='50px' height='50px' alt="">
                                        <input type="hidden" name="old_image" value=<?= $fetchedData['image']; ?>>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Meta Title</label>
                                        <input type="text" value=<?= $fetchedData['meta_title'] ?> class="form-control" name='meta_title' placeholder='Enter Meta Title'>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" id="" cols="30" rows="3" class='form-control' placeholder='Enter Meta Description'><?= $fetchedData['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="" cols="30" rows="3" class='form-control' placeholder='Enter Meta Description'><?= $fetchedData['meta_keywords'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="checkbox" <?= $fetchedData['status'] ? 'checked' : '' ?> name="status" id="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Popular</label>
                                        <input type="checkbox" <?= $fetchedData['popular'] ? 'checked' : '' ?> name="popular" id="">
                                    </div>
                                    <div class="col-md-12">
                                        <button type='submit' class='btn btn-primary' name='update_btn'>Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            <?php 

            }
            else 
            {
                echo 'Category Not Found    ';
            }

            }else 
            {
                echo 'Id Is Missing';
            } 
            ?>
        </div>
      </div>
        </div>
      </div>
    </div>
<?php include('includes/footer.php'); ?>
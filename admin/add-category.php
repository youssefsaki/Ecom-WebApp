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
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method='POST' enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name='name' placeholder='Enter Category Name'>
                            </div>
                            <div class="col-md-6">
                                <label for="">slug</label>
                                <input type="text" class="form-control" name='slug' placeholder='Enter slug'>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="3" class='form-control' placeholder='Enter Your Description'></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" class="form-control" name='image'>
                            </div>
                            <div class="col-md-6">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name='meta_title' placeholder='Enter Meta Title'>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="3" class='form-control' placeholder='Enter Meta Description'></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" id="" cols="30" rows="3" class='form-control' placeholder='Enter Meta Description'></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" id="">
                            </div>
                            <div class="col-md-6">
                                <label for="">Popular</label>
                                <input type="checkbox" name="popular" id="">
                            </div>
                            <div class="col-md-12">
                                <button type='submit' class='btn btn-primary' name='save_btn'>Add Category</button>
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
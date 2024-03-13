<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../config/db.php');
include('../functions/myFunction.php');


if(isset($_POST['save_btn'])) {

   
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $file_name = time() . '.' . $image_ext;
    $upload_path = '../uploads/' . $file_name;


    $cat_query = "INSERT INTO categories
    (
        name, 
        slug, 
        description, 
        status, 
        popular, 
        meta_title, 
        meta_description, 
        meta_keywords,
        image
    ) 
    VALUES 
    (
        '$name',
        '$slug', 
        '$description', 
        '$status', 
        '$popular', 
        '$meta_title', 
        '$meta_description', 
        '$meta_keywords', 
        '$file_name'
    )";

    $cat_query_run = mysqli_query($con, $cat_query);
    if($cat_query_run) {
        if (move_uploaded_file($image_tmp, $upload_path)) {
            redirect('add-category.php', 'Category Added Successfully');
        } else {
            'Failed To Upload File';
        }
    }
    else {
        redirect('add-category.php', 'Sorry! Something went wrong');
    }

    
}

else if(isset($_POST['update_btn'])){

    $category_id = $_POST['category_id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $newImage = $image_ext;
    $oldImage = $_POST['old_image'];

    $path = '../uploads';

    if($newImage != '') {
        $updatedImage = $newImage;
    }else {
        $updatedImage = $oldImage;
    }

    $updateQuery = "UPDATE categories SET 
        name = '$name', 
        slug = '$slug', 
        description = '$description', 
        status = '$status', 
        popular = '$popular',
        meta_title = '$meta_title', 
        meta_description = '$meta_description', 
        meta_keywords = '$meta_keywords', 
        image = '$updatedImage' WHERE category_id = $category_id";

    $updateQuery_run = mysqli_query($con, $updateQuery);

    if($updateQuery_run) {
        if($newImage != '') {
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, $path.'/'.$newImage);
            if(file_exists('../uploads'.$oldImage)){
                unlink('../uploads/'.$oldImage);
            }
        }
        redirect("edit-category.php?id=$category_id", 'Successfully Updated');
    }
}

else if(isset($_POST['delete_btn'])) {

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $query = "SELECT * FROM categories WHERE category_id='$category_id'";
    $queryRun = mysqli_query($con, $query);
    $data = mysqli_fetch_array($queryRun);
    $image = $data['image'];

    $deleteQuery = "DELETE FROM categories WHERE category_id = $category_id";
    $deleteQueryRun = mysqli_query($con, $deleteQuery);

    if($deleteQueryRun) 
    {
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);   
        }
        redirect('categories.php', 'Data Deleted Successfully');
    }else {
        redirect('categories.php', 'Something Went Wrong');
    }

}

else if(isset($_POST['add_product'])) {

    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $small_description = mysqli_real_escape_string($con, $_POST['small_description']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $original_price = mysqli_real_escape_string($con, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($con, $_POST['selling_price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);

    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $file_name = time().'.'.$image_extension;

    $path = '../uploads';

    if(!empty($name) && !empty($slug) && !empty($description)) {

        $query = "INSERT INTO products
        (
            category_id,
            name,
            slug,
            small_description,
            description,
            original_price,
            selling_price,
            quantity, 
            status,
            trending,
            meta_title,
            meta_description,
            meta_keywords,
            image
        ) VALUES 
        (
            '$category_id',
            '$name',
            '$slug',
            '$small_description',
            '$description',
            '$original_price',
            '$selling_price',
            '$quantity',
            '$status',
            '$trending',
            '$meta_title',
            '$meta_description',
            '$meta_keywords',
            '$file_name'
        )";
        
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$file_name);
            redirect('add-product.php', 'Product Added Successfully');
        }
        else {
            redirect('add-product.php', 'Something Went Wrong');
        }

    }
    else {
            redirect('add-product.php', 'All Fields Are Required');
        }
}
else if(isset($_POST['update_product'])) 
{
    $category_id = $_POST['category_id'];
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $small_description = mysqli_real_escape_string($con, $_POST['small_description']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $original_price = mysqli_real_escape_string($con, $_POST['original_price']);
    $selling_price = mysqli_real_escape_string($con, $_POST['selling_price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);

    $image = $_FILES['image']['name'];
    $imageExt = pathinfo($image, PATHINFO_EXTENSION);
    $newImage = $imageExt;
    $fileName = time().'.'.$imageExt;
    $oldImage = $_POST['old_image'];

    $path = '../uploads';

    if($newImage !== '') 
    {
        $updatedImage = $newImage;
    }else {
        $updatedImage = $oldImage;
    }

    if(!empty($name) && !empty($slug) && !empty($description)) 
    {
        $updateQuery = "UPDATE products SET 
            category_id         = '$category_id',
            name                = '$name',
            slug                = '$slug',
            small_description   = '$small_description',
            description         = '$description',
            original_price      = '$original_price',
            selling_price       = '$selling_price',
            quantity            = '$quantity',
            status              = '$status',
            trending            = '$trending',
            meta_title          = '$meta_title',
            meta_description    = '$meta_description',
            meta_keywords       = '$meta_keywords',
            image               = '$updatedImage'
                WHERE product_id = '$product_id'
        ";
        $updateQueryRun = mysqli_query($con, $updateQuery);

        if($updateQueryRun) {
            if($newImage != '') {
                $tmp_name = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmp_name, $path.'/'.$newImage);
                if(file_exists('../uploads'.$oldImage)){
                    unlink('../uploads/'.$oldImage);
                }
            }
            redirect("edit-product.php?id=$product_id", 'Successfully Updated');
        }

    } else 
    {
        redirect("edit-product.php?id=$product_id", 'All Fields Are Required');
    }



}
else {
    header('Refresh:0; url=../index.php');
}

?>

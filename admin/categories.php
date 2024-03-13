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
                    <h4>Categories</h4>
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
                                
                                $categories = getAll('categories'); 

                                if(mysqli_num_rows($categories) > 0) {
                                    foreach($categories AS $category) {
                                        ?>
                            <tr>
                                <td><?= $category['category_id'] ?></td>
                                <td><?= $category['name'] ?></td>
                                <td>
                                    <img src="../uploads/<?= $category['image'] ?>" width='50px' height='50px'
                                        alt="<?= $category['name']; ?>">
                                </td>
                                <td><?= $category['status'] == '0' ? 'Visible' : 'Hidden'; ?></td>
                                <td>
                                    <a href="edit-category.php?id=<?= $category['category_id']; ?>" class='btn btn-sm btn-primary'>Edit</a>
                                </td>
                                <td>
                                    <form action="code.php" method='POST'>
                                        <input type="hidden" name="category_id" value=<?= $category['category_id'] ?>>
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
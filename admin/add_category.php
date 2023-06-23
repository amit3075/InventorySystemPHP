<?php
session_start();
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h4>Add category</h4>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row-fluid">
                                <div class="col-md-12">
                                    <label for="">Name</label>
                                    <input type="text" name="name" placeholder="Enter the product name"
                                        class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" placeholder="Enter the slug" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <input name="description" placeholder="Enter the description" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Title</label>
                                    <input name="meta_title" placeholder="Enter the meta title" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <input name="meta_description" placeholder="Enter the meta description"
                                        class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Keyword</label>
                                    <input name="meta_keyword" placeholder="Enter the meta keyword"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type="checkbox" name="popular">
                                </div>
                                <div class="form-actions">
                                    <center>
                                        <input type="submit" name="add_category_submit" value="Submit"
                                            class="btn btn-success" />
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            include "../user/connection.php";
            include "./functions/myfunction.php";

            if (isset($_POST['add_category_submit'])) {
                $name = $_POST['name'];
                $slug = $_POST['slug'];
                $description = $_POST['description'];
                $meta_title = $_POST['meta_title'];
                $meta_description = $_POST['meta_description'];
                $meta_keyword = $_POST['meta_keyword'];
                $status = isset($_POST['status']) ? '1' : '0';
                $popular = isset($_POST['popular']) ? '1' : '0';

                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $image = $_FILES['image']['name'];
                    $path = "upload";
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time();
                    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
                    $filename = time() . '.' . $image_ext;

                    $cate_query = "INSERT INTO categories(name, slug, description, meta_title, meta_description, meta_keyword, status, popular, image)
                    VALUES('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keyword', '$status', '$popular', '$filename')";

                    $cate_query_run = mysqli_query($conn, $cate_query);
                    if ($cate_query_run) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                        redirect("add_category.php", "Successfully added category");
                    } else {
                        redirect("add_category.php", "Something went wrong");
                    }
                } else {
                    redirect("add_category.php", "Please select an image");
                }
            }

            echo "Hello testing";
            ?>

        </div>
        <?php
        include "footer.php";
        ?>
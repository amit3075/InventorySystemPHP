<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> categories</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../user/connection.php";
                            include "./functions/myfunction.php";
                            $category = getAll("categories");

                            if (mysqli_num_rows($category) > 0) {

                                foreach ($category as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $item["id"]; ?>
                                        </td>
                                        <td>
                                            <?= $item["name"]; ?>
                                        </td>
                                        <td>
                                            <!-- <img src="../upload/<?= $item["image"]; ?> " alt="<?= $item["name"]; ?>"> -->
                                            <img src="./upload/<?= $item["image"]; ?>" alt="<?= $item["name"]; ?>" width="50"
                                                height="50">

                                        </td>
                                        <td>
                                            <?= $item["status"] == '0' ? "Visbile" : "Hidden" ?>
                                        </td>
                                        <td>
                                            <a href="removecat.php?id=<?php echo $row["id"]; ?>">Deleted</a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "No record found";
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById("error").style.display = "none";
    document.getElementById("success").style.display = "block";
    setTimeout(function () {
        window.location.href = window.location.href;
    }, 3000);
</script>
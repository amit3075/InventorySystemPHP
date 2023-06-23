<?php
include "header.php";
?>


<div id="content">
    <!-----------breadcrumbs------->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.htm" class="tip-bottom"><i class="icon-home"></i>
                Adding User </a></div>
    </div>
    <!-----------End breadcrumbs----------->
    <!--------------Action boxs--------------->
    <div class="container-fluid">
        <div class="row-fluis" style=" ...">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add new User</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">First Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="first name" name="firstname" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Last name" name="lastname" />
                                </div>
                                <div class="control-group">
                                    <label class="control-label">username</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Enter username"
                                            name="username" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password </label>
                                <div class="controls">
                                    <input type="password" class="span11" placeholder="Enter Password"
                                        name="password" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Select Role</label>
                                <div class="controls">
                                    <select name="role" class="span11">
                                        <option>user</option>
                                        <option>admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> status</label>
                                <div class="controls">
                                    <select name="status" class="span11">
                                        <option>Active</option>
                                        <option>nonactive</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="alert alert-danger" id="error" style="display:none">
                        Invalid user name already exist ! please try another
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="submit1" class="btn btn-success">Save</button>
                    </div>
                    <div class="alert alert-success" id="success" style="display:none">
                        Record insert sucessfully
                    </div>
                    </form>
                </div>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Lastname</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../user/connection.php";
                        $res = mysqli_query($conn, "select * from user_registration");
                        while ($row = mysqli_fetch_array($res)) { ?>
                        <tr>
                            <td>
                                <?php echo $row["firstname"]; ?>
                            </td>
                            <td>
                                <?php echo $row["lastname"]; ?>
                            </td>
                            <td>
                                <?php echo $row["username"]; ?>
                            </td>
                            <td>
                                <?php echo $row["role"]; ?>
                            </td>
                            <td>
                                <?php echo $row["status"]; ?>
                            </td>
                            <td><a href="edit_user.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                            <td><a href="delete_user.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include "../user/connection.php";
    if (isset($_POST["submit1"])) {
        $count = 0;
        $res = mysqli_query($conn, "select * from user_registration where username='$_POST[username]'");
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            ?>
    <script type="text/javascript">
        document.getElementById("success").style.display = "none";
        document.getElementById("error").style.display = "block";
    </script>

    <?php
        } else {
            mysqli_query($conn, "INSERT INTO user_registration (firstname, lastname, username, password, role,status) 
            VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[role]','$_POST[status]')");

            ?>
    <script type="text/javascript">
        document.getElementById("error").style.display = "none";
        document.getElementById("success").style.display = "block";
        setTimeout(function () {
            window.location.href = window.location.href;
        }, 3000);
    </script>

    <?php
        }
    }
    ?>

</div>

<?php
include "footer.php";

?>
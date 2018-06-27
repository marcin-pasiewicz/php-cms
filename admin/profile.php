<?php
include "includes/admin_header.php";
if(isset($_SESSION['username'])) {
    $session_user_name = $_SESSION['username'];
}
?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $session_user_name?></small>
                        </h1>
                        <?php
                        $query = "SELECT * FROM users WHERE user_name = '{$session_user_name}'  ";
                        $select_users_by_user_name = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_users_by_user_name)) {
                            $user_id = $row['user_id'];
                            $user_name = $row['user_name'];
                            $user_password = $row['user_password'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_role = $row['user_role'];
                        }



                        if(isset($_POST['update_user'])) {
                            $user_name = $_POST['user_name'];
                            $user_password = $_POST['user_password'];
                            $user_firstname = $_POST['user_firstname'];
                            $user_lastname = $_POST['user_lastname'];
                            $user_email = $_POST['user_email'];
                            $user_role = $_POST['user_role'];

//    move_uploaded_file($post_image_temp, "../images/$post_image");
//    if(empty($post_image)) {
//        $query = "SELECT * FROM posts WHERE post_id = $get_post_id ";
//        $select_image = mysqli_query($connection, $query);
//
//        while ($row = mysqli_fetch_assoc($select_image)) {
//            $post_image = $row['post_image'];
//        }
//
//    }

                            $query = "UPDATE users SET ";
                            $query .= "user_name = '{$user_name}', ";
                            $query .= "user_password = '{$user_password}', ";
                            $query .= "user_firstname = '{$user_firstname}', ";
                            $query .= "user_lastname = '{$user_lastname}', ";
                            $query .= "user_email = '{$user_email}', ";
                            $query .= "user_role = '{$user_role}' ";
                            $query .= "WHERE user_name = '{$session_user_name}' ";

                            $update_user = mysqli_query($connection, $query);
                            confirmQuery($update_user);
                        }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_name">User name</label>
                                <input class="form-control" value="<?php echo $user_name?>" type="text" name="user_name">
                            </div>
                            <div class="form-group">
                                <label for="user_firstname">User first name</label>
                                <input class="form-control" value="<?php echo $user_firstname?>" type="text" name="user_firstname">
                            </div>
                            <div class="form-group">
                                <label for="user_lastname">User last name</label>
                                <input class="form-control" value="<?php echo $user_lastname?>" type="text" name="user_lastname">
                            </div>
                            <div class="form-group">
                                <label for="user_email">User email</label>
                                <input class="form-control" value="<?php echo $user_email?>" type="email" name="user_email">
                            </div>
                            <div class="form-group">
                                <label for="title">User password</label>
                                <input class="form-control" value="<?php echo $user_password?>" type="password" name="user_password">
                            </div>
                            <div class="form-group">
                                <label for="user_title">User Role</label>
                                <select class="form-control" name="user_role">
                                    <option value="subscriber"><?php echo $user_role ?></option>
                                    <?php
                                    if($user_role == 'admin') {
                                        echo "<option value='subscriber'>subscriber</option>";
                                    } else {
                                        echo "<option value='admin'>admin</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_image">User image</label>
                                <input type="file" name="user_image">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_user" value="Update user">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>
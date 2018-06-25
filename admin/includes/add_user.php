<?php
if(isset($_POST['create_user'])) {
//    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
//    $user_image = $_POST['user_image']['name'];;
//    $user_image_temp = $_POST['user_image']['tmp_name'];;
//    $post_date = date('d-m-y');
    $query = "INSERT INTO users (user_name, user_firstname, user_lastname, user_email, user_password, user_role) ";
    $query .= "VALUES ('{$user_name}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_password}', '{$user_role}')";
    $create_user_query = mysqli_query($connection, $query);

//    move_uploaded_file($user_image_temp, "../images/$user_image");
    confirmQuery($create_user_query);
}
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">User name</label>
        <input class="form-control" type="text" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_firstname">User first name</label>
        <input class="form-control" type="text" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">User last name</label>
        <input class="form-control" type="text" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">User email</label>
        <input class="form-control" type="email" name="user_email">
    </div>
    <div class="form-group">
        <label for="title">User password</label>
        <input class="form-control" type="password" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_title">User Role</label>
        <select class="form-control" name="user_role">
            <option value="admin">admin</option>
            <option value="subscriber">subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="user_image">User image</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create user">
    </div>
</form>
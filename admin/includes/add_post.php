<?php
if(isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;
    $query = "INSERT INTO posts(post_title, post_author, post_category_id, post_status, post_image, post_tags, post_content, post_date) ";
    $query .= "VALUES('{$post_title}', '{$post_author}', '{$post_category_id}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now() ) ";
    $create_post_query = mysqli_query($connection, $query);

    move_uploaded_file($post_image_temp, "../images/$post_image");
    confirmQuery($create_post_query);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category">Post category</label>
        <select name="post_category" id="">
            <?php
            $query = 'SELECT * FROM categories';
            $select_categories = mysqli_query($connection, $query);
            confirmQuery($select_categories);

            while($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post author</label>
        <input class="form-control" type="text" name="post_author">
    </div>
    <div class="form-group">
        <label for="title">Post status</label>
        <input class="form-control" type="text" name="post_status">
    </div>
    <div class="form-group">
        <label for="title">Post image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="title">Post tags</label>
        <input class="form-control" type="text" name="post_tags">
    </div>
    <div class="form-group">
        <label for="title">Post content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish">
    </div>
</form>
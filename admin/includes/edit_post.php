<?php
if(isset($_GET['post_id'])) {
    $get_post_id = $_GET['post_id'];
}
$query = 'SELECT * FROM posts';
$select_posts_by_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input value="<?php echo $post_title?>" class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="title">Post category id</label>
        <input value="<?php echo $post_category_id?>" class="form-control" type="text" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="title">Post author</label>
        <input value="<?php echo $post_author?>" class="form-control" type="text" name="post_author">
    </div>
    <div class="form-group">
        <label for="title">Post status</label>
        <input value="<?php echo $post_status?>" class="form-control" type="text" name="post_status">
    </div>
    <div class="form-group">
        <label for="title">Post image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="title">Post tags</label>
        <input value="<?php echo $post_tags?>" class="form-control" type="text" name="post_tags">
    </div>
    <div class="form-group">
        <label for="title">Post content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish">
    </div>
</form>
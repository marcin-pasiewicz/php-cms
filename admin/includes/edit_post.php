<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="title">Post category id</label>
        <input class="form-control" type="text" name="post_category_id">
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
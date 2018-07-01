<?php
    if(isset($_POST['checkboxArray'])) {
        foreach ($_POST['checkboxArray'] as $checkboxPostId) {
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                case "published":
                    $query = "UPDATE posts SET post_status = 'published' WHERE post_id =  {$checkboxPostId}";
                    $update_to_published_status = mysqli_query($connection, $query);
                    break;

                case 'draft';
                    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id =  {$checkboxPostId}";
                    $update_to_draft_status = mysqli_query($connection, $query);
                    break;
                case 'delete';
                    $query = "DELETE FROM posts WHERE post_id = {$checkboxPostId} ";
                    $update_to_draft_status = mysqli_query($connection, $query);
                    break;
            }
        }
    }
?>
<form action="" method="post">
<table class="table table-bordered table-hover">
    <div id="bulk-options-container" class="col-xs-4">
        <select name="bulk_options" id="" class="form-control">
            <option value="">select option</option>
            <option value="published">publish</option>
            <option value="draft">draft</option>
            <option value="delete">delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a href="add_post.php" class="btn btn-primary">Add post</a>
    </div>
    <thead>
    <tr>
        <th><input id="select-all-boxes" type="checkbox"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = 'SELECT * FROM posts';
    $select_posts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";
        echo "<th><input id='checkboxes' type='checkbox' name='checkboxArray[]' value='{$post_id}'></th>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
        $select_categories_id = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        }

        echo "<td>{$cat_title}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img src='../images/{$post_image}' width='100px''/></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&post_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
    if(isset($_GET['delete'])) {
        $get_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$get_post_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");
    }
    ?>
    </tbody>
</table>
</form>
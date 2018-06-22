<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<?php include "./admin/includes/functions.php" ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <?php
            if (isset($_GET['post_id'])) {
                $get_post_id = $_GET['post_id'];
            }


            $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
            $select_all_posts_quary = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_posts_quary)) {
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];
                ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php } ?>
            <!-- Blog Comments -->
            <?php
            if (isset($_POST['create_comment'])) {
                $get_post_id = $_GET['post_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                $query = "INSERT INTO comments (comment_post_id, comment_date, comment_author, comment_email, comment_content, comment_status) ";
                $query .= "VALUES ('{$get_post_id}', now(), '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved' ) ";
                $create_comment_query = mysqli_query($connection, $query);

                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$get_post_id}";
                $update_comment_count = mysqli_query($connection, $query);

                confirmQuery($create_comment_query);
            }
            ?>
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="comment_author">Author</label>
                        <input type="text" class="form-control" name="comment_author"/>
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input type="email" class="form-control" name="comment_email"/>
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Your comment</label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php
            $query = "SELECT * FROM comments WHERE comment_post_id = {$get_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            if (!$select_comment_query) {
                confirmQuery($select_comment_query);
            }

            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];

                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Footer -->
    <?php include "includes/footer.php" ?>


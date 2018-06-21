<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = 'SELECT * FROM comments';
    $select_comments = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_post_id = $row['comment_post_id'];
        $comment_status = $row['comment_status'];
        $comment_email = $row['comment_email'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
//
//        $query = "SELECT * FROM categories WHERE comment_id = $commnet_post_id";
//        $select_comments_id = mysqli_query($connection, $query);
//        while ($row = mysqli_fetch_assoc($select_comments_id)) {
//            $comment_id = $row['$comment_id'];
//            $comment_title = $row['$comment_title'];
//        }

        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";
        echo "<td>{$comment_post_id}</td>";
//        echo "<td><img src='../images/{$post_image}' width='100px''/></td>";
        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";
    }
    if(isset($_GET['delete'])) {
        $get_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$get_post_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }
    ?>
    </tbody>
</table>
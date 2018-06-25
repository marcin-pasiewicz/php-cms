<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Image</th>
        <th>Change to admin</th>
        <th>Change to subscriber</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = 'SELECT * FROM users';
    $select_users = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_users)) {
        $user_id= $row['user_id'];
        $user_name= $row['user_name'];
        $user_password= $row['user_password'];
        $user_firstname= $row['user_firstname'];
        $user_lastname= $row['user_lastname'];
        $user_email= $row['user_email'];
        $user_role= $row['user_role'];
        $user_image = $row['user_image'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_firstname}</td>";
//
//        $query = "SELECT * FROM categories WHERE comment_id = $commnet_post_id";
//        $select_comments_id = mysqli_query($connection, $query);
//        while ($row = mysqli_fetch_assoc($select_comments_id)) {
//            $comment_id = $row['$comment_id'];
//            $comment_title = $row['$comment_title'];
//        }

        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";

//        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
//        $select_post_id_query = mysqli_query($connection, $query);
//
//        while($row = mysqli_fetch_assoc($select_post_id_query)) {
//            $post_id = $row['post_id'];
//            $post_title = $row['post_title'];
//
//            echo "<td><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";
//         }
        echo "<td>{$user_role}</td>";
        echo "<td><img src='../images/{$user_image}' width='100px''/></td>";
        echo "<td><a href='users.php?admin={$user_id}'>Make admin</a></td>";
        echo "<td><a href='users.php?subscriber={$user_id}'>Make subscruber</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
    if(isset($_GET['admin'])) {
        $get_user_id = $_GET['admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$get_user_id}";
        $make_user_admin_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }

    if(isset($_GET['subscriber'])) {
        $get_user_id = $_GET['subscriber'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$get_user_id}";
        $make_user_subscriber_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }
//
    if(isset($_GET['delete'])) {
        $get_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = {$get_user_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: users .php");
    }
    ?>
    </tbody>
</table>
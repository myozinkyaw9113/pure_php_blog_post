<?php
    session_start();
    date_default_timezone_set("Asia/Rangoon");
    require '../config/database.php';
    require '../config/common.php';
    $postprivacyconfig = require '../config/postprivacy.php';
    $postprivacyicon = require '../config/postprivacyicon.php';

    if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
        header('Location: ../login.php');
    }

    # Select this user with SESSION['user_id']
    $pdo_this_user = $pdo->prepare("SELECT * FROM users WHERE id=".$_SESSION['user_id']); 
    $pdo_this_user->execute();
    $thisUser = $pdo_this_user->fetch(PDO::FETCH_ASSOC);

    # Select Posts for this user belongs to
    $pdo_posts = $pdo->prepare("SELECT * FROM posts INNER JOIN users ON posts.author_id = users.id
    WHERE posts.author_id=".$_SESSION['user_id']." ORDER BY posts.postId DESC"); 
    $pdo_posts->execute();
    $belongsToUserPosts = $pdo_posts->fetchAll();

    # Select comment for this user belongs to
    $pdo_all_comments = $pdo->prepare("SELECT * FROM comments ORDER BY commentId DESC");
    $pdo_all_comments->execute();
    $all_comments = $pdo_all_comments->fetchAll();

    $pdo_cmt = $pdo->prepare("SELECT * FROM comments INNER JOIN posts ON comments.commentId = posts.postId");
    $pdo_cmt->execute();
    $result = $pdo_cmt->fetchAll();
    // print_r($all_comments);
    // exit();

    $content = $img = $comment = $needErr = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if ($_POST['postSubmit']) {
            $postprivacy = $_POST['postprivacy'];
            $content = $_POST['content'];
            if (empty($content) && empty($_FILES['createImg']['name'])) {
                echo "<script>alert('Either content or image is required');window.location.href='index.php';</script>";
                exit();
            }
            if ($_FILES['createImg']['name'] != null) {
                $file = 'images/'.basename($_FILES['createImg']['name']);
                $imageType = pathinfo($file,PATHINFO_EXTENSION);

                if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg' && $imageType != 'gif') {
                    echo "<script>alert('Image must be png,jpg,jpeg,gif')</script>";
                } else {
                    
                    $image = $_FILES['createImg']['name'];
                    move_uploaded_file($_FILES['createImg']['tmp_name'],$file);

                    $stmt = $pdo->prepare("INSERT INTO posts(postprivacy,content,img,author_id) 
                                        VALUES (:postprivacy,:content,:img,:author_id)");
                    $result = $stmt->execute(
                        array(
                            ':postprivacy' => $postprivacy,
                            ':content'=>$content,
                            ':author_id'=>$_SESSION['user_id'],
                            ':img'=>$image
                        )
                    );
                    if ($result) {
                        echo "<script>alert('Successfully added');window.location.href='index.php';</script>";
                    }
                }
            } else {
                $stmt = $pdo->prepare("INSERT INTO posts(postprivacy,content,author_id) 
                                    VALUES (:postprivacy,:content,:author_id)");
                $result = $stmt->execute(
                    array(
                        ':postprivacy' => $postprivacy,
                        ':content'=>$content,
                        ':author_id'=>$_SESSION['user_id'],
                    )
                );
                if ($result) {
                    echo "<script>alert('Successfully added');window.location.href='index.php';</script>";
                }
            }
        } elseif ($_POST['commentSubmit']) {
            $post_id = $_POST['post_id'];
            $comment = $_POST['comment'];
            if (empty($comment)) {
                echo '<script>alert("Comment need");window.location.href="index.php";</script>';
            } else {
                $pdo_comment = $pdo->prepare("INSERT INTO comments(content,post_id,user_id)
                                VALUES(:content,:post_id,:user_id)");
                $result = $pdo_comment->execute(array(
                    ':content' => $comment,
                    ':post_id' => $post_id,
                    ':user_id' => $_SESSION['user_id']
                ));
                if ($result) {
                    echo '<script>alert("Comment success");window.location.href="index.php";</script>';
                }
            }
        } else {
            echo '<script>alert("This is none submit")</script>';
        }
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<style>

    #postCommentMenuButton:hover {
        background-color: #ddd;
        border-radius: 50px;
    }

    button.commentSubmit {
        border: none;
        outline: none;
    }

</style>

<?php
    require 'app/top.php';
    require 'app/appbar.php';
    require 'app/chat.php';
?>

    <!-- ================= Main ================= -->
    <div class="container-fluid">

      <div class="row justify-content-evenly">
      
        <!-- ================= Left Sidebar ================= -->
        <?php require 'app/leftsidebar.php'; ?>

        <!-- ================= Timeline ================= -->
        <div class="col-12 col-lg-6 pb-5">
            <div
            class="d-flex flex-column justify-content-center w-100 mx-auto"
            style="padding-top: 56px; max-width: 680px"
            >

                <!-- ================= Stories ================= -->
                <?php require 'app/stories.php'; ?>

                <!-- ================= Create Post ================= -->
                <?php require 'createpost.php'; ?>
                
                <!-- ================= Create Room ================= -->
                <?php require 'app/createroom.php'; ?>
                
                <!-- posts -->
                <!-- p 1 -->
                <?php 
                    foreach ($belongsToUserPosts as  $value) {
                ?>

                <div class="bg-white px-2 pt-2 rounded shadow mt-3">
                    <!-- author -->
                    <div class="d-flex justify-content-between">
                    <!-- avatar -->
                    <div class="d-flex">
                        <img
                        src="https://source.unsplash.com/collection/happy-people"
                        alt="avatar"
                        class="rounded-circle me-2"
                        style="width: 38px; height: 38px; object-fit: cover"
                        />
                        <div>
                            <p class="m-0 fw-bold"><?php echo escape($thisUser['name']); ?></p>
                            <span class="text-muted fs-7"> 
                                <?php
                                    echo escape($value['created_at']);
                                    foreach ($postprivacyicon as $key => $privacyicon) {
                                        if ($value['postprivacy'] == $key) {
                                ?>
                                    <i style="font-size:1rem;font-weight:bolder" class="<?php echo escape($privacyicon);?> ml-3"></i>
                                <?php
                                        }
                                    } 
                                ?>
                            </span>
                        </div>
                    </div>
                    <!-- edit -->
                    <i
                        class="fas fa-ellipsis-h"
                        type="button"
                        id="post1Menu"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    ></i>
                    <!-- edit menu -->
                    <ul
                        class="dropdown-menu border-0 shadow"
                        aria-labelledby="post1Menu"
                    >
                        <li class="d-flex align-items-center">
                        <a
                            class="
                            dropdown-item
                            d-flex
                            fs-7
                            "
                            href="editpost.php?id=<?php echo escape($value['postId']) ?>"
                        >
                            Edit Post</a
                        >
                        </li>
                        <li class="d-flex align-items-center">
                        <a
                            class="
                            dropdown-item
                            d-flex
                            fs-7
                            "
                            href="deletepost.php?id=<?php echo escape($value['postId']) ?>"
                            onclick="return confirm('Are you sure you want to delete this post?');"
                        >
                            Delete Post</a
                        >
                        </li>
                    </ul>
                    </div>
                    <!-- post content -->
                    <div class="mt-3">
                    <!-- content -->
                    <div>
                        <p>
                        <?php echo escape($value['content']); ?>
                        </p>
                        <?php 
                            if ($value['img'] != null) {
                        ?>
                        <img
                        src="images/<?php echo escape($value['img']); ?>"
                        alt="post image"
                        class="img-fluid rounded"
                        />   
                        <?php
                            }
                        ?>
                    </div>
                    <!-- likes & comments -->
                    <div class="post__comment position-relative">
                        <!-- likes -->
                        <div
                        class="
                            d-flex
                            align-items-center
                            top-0
                            start-0
                            position-absolute
                        "
                        style="height: 50px; z-index: 5"
                        >
                        <div class="me-2">
                            <i class="text-primary fas fa-thumbs-up"></i>
                            <i class="text-danger fab fa-gratipay"></i>
                            <i class="text-warning fas fa-grin-squint"></i>
                        </div>
                        <p class="m-0 text-muted fs-7">Phu, Tuan, and 3 others</p>
                        </div>
                        <!-- comments start-->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item border-0">
                                <!-- comment collapse -->
                                <h2 class="accordion-header" id="headingTwo">
                                <div
                                    class="
                                    accordion-button
                                    collapsed
                                    pointer
                                    d-flex
                                    justify-content-end
                                    "
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapsePost<?php echo escape($value['postId']) ?>"
                                    aria-expanded="false"
                                    aria-controls="collapsePost1"
                                >
                                    <p class="m-0">
                                        <?php 
                                            foreach ($all_comments as $key => $comment) {
                                                if ($value['postId'] == $comment['post_id']) {
                                                    echo count($comment);
                                                }
                                            }
                                        ?>
                                        
                                    </p> <!-- Counting Comments -->
                                </div>
                                </h2>
                                <hr class="m-0"/>
                                <!-- comment & like bar -->
                                <div class="d-flex my-1 justify-content-around">
                                <div
                                    class="
                                    dropdown-item
                                    rounded
                                    d-flex
                                    justify-content-center
                                    align-items-center
                                    pointer
                                    text-muted
                                    "
                                >
                                    <i class="fas fa-thumbs-up me-3"></i>
                                    <p class="m-0">Like</p>
                                </div>
                                <div
                                    class="
                                    dropdown-item
                                    rounded
                                    d-flex
                                    justify-content-center
                                    align-items-center
                                    pointer
                                    text-muted
                                    "
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapsePost<?php echo escape($value['postId']) ?>"
                                    aria-expanded="false"
                                    aria-controls="collapsePost1"
                                >
                                    <i class="fas fa-comment-alt me-3"></i>
                                    <p class="m-0">Comment</p>
                                </div>
                                </div>
                                <!-- comment expand -->
                                <div
                                id="collapsePost<?php echo escape($value['postId']) ?>"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                                >
                                <hr class="my-1" />
                                <div class="accordion-body p-0 mt-2">
                                    
                                    <?php 
                                        foreach ($all_comments as $key => $comment) {
                                            if ($value['postId'] == $comment['post_id']) {

                                    ?>
                                        <!-- comment 1 -->
                                        <div class="d-flex align-items-center mx-2 mb-3">
                                            <!-- avatar -->
                                            <img
                                                src="https://source.unsplash.com/collection/happy-people"
                                                alt="avatar"
                                                class="rounded-circle me-2"
                                                style="
                                                width: 38px;
                                                height: 38px;
                                                object-fit: cover;
                                                "
                                            />
                                            <!-- comment text -->
                                            <div class="rounded comment__input d-flex align-items-center gap-3">
                                                <p class="fw-bold m-0"><?php echo escape($thisUser['name']); ?></p>
                                                <p class="m-0 fs-7 bg-gray p-2 rounded">
                                                <?php echo escape($comment['content']) ?>
                                                </p>

                                                <!-- comment menu of author -->
                                                <?php
                                                    if ( $comment['user_id'] == $thisUser['id'] ) {
                                                ?>
                                                    <div>
                                                    <!-- icon -->
                                                    <i
                                                        class="fas fa-ellipsis-h text-blue pointer p-2"
                                                        id="postCommentMenuButton"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false"
                                                    ></i>
                                                        <!-- menu -->
                                                        <ul
                                                            class="dropdown-menu border-0 shadow"
                                                            aria-labelledby="post1CommentMenuButton"
                                                        >
                                                            <li class="d-flex align-items-center">
                                                            <a
                                                                class="
                                                                dropdown-item
                                                                d-flex
                                                                flex-start
                                                                fs-7
                                                                "
                                                                href="#"
                                                            >
                                                                Edit Comment</a
                                                            >
                                                            </li>
                                                            <li class="d-flex align-items-center">
                                                            <a
                                                                class="
                                                                dropdown-item
                                                                d-flex
                                                                flex-start
                                                                fs-7
                                                                "
                                                                href="#"
                                                            >
                                                                Delete Comment</a
                                                            >
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php
                                                    }   
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                            }
                                        }
                                    ?>
                                    
                                    <!-- create comment -->
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="d-flex my-3 mt-3" method="POST">
                                    <!-- avatar -->
                                    <input name="_token" type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- csrf_token --> 
                                    <div>
                                        <img
                                        src="https://source.unsplash.com/collection/happy-people"
                                        alt="avatar"
                                        class="rounded-circle me-2"
                                        style="
                                            width: 38px;
                                            height: 38px;
                                            object-fit: cover;
                                        "
                                        />
                                    </div>
                                    <!-- input -->
                                    <input type="hidden" name="post_id" value="<?php echo $value['postId'] ?>">
                                    <input
                                        type="text"
                                        name="comment"
                                        class="form-control border-0 rounded-pill bg-gray"
                                        placeholder="Write a comment..."
                                    />
                                    <input type="submit" name="commentSubmit" value=">">
                                    </form>
                                    <!-- end -->
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                    </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
        </div>
        
        <!-- ================= Right Sidebar ================= -->
        <?php require 'app/rightsidebar.php'; ?>

      </div>

    </div>

    <!-- ================= Chat Icon ================= -->
    <div
      class="fixed-bottom right-100 p-3"
      style="z-index: 6; left: initial"
      type="button"
      data-bs-toggle="modal"
      data-bs-target="#newChat"
    >
      <i class="fas fa-edit bg-white rounded-circle p-3 shadow"></i>
    </div>

<?php require 'app/base.php'; ?>
<?php
    session_start();
    date_default_timezone_set("Asia/Rangoon");
    require '../config/database.php';
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
    
    $content = $img = $needErr = "";

    if ($_POST) {
        $file = 'images/'.basename($_FILES['createImg']['name']);
        $imageType = pathinfo($file,PATHINFO_EXTENSION);

        if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg' && $imageType != 'gif') {
            echo "<script>alert('Image must be png,jpg,jpeg,gif')</script>";
        } else {
            $postprivacy = $_POST['postprivacy'];
            $content = $_POST['content'];
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
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<?php
    require 'top.php';
    require 'appbar.php';
    require 'chat.php';
?>

    <!-- ================= Main ================= -->
    <div class="container-fluid">

      <div class="row justify-content-evenly">
      
        <!-- ================= Left Sidebar ================= -->
        <?php require 'leftsidebar.php'; ?>

        <!-- ================= Timeline ================= -->
        <div class="col-12 col-lg-6 pb-5">
            <div
            class="d-flex flex-column justify-content-center w-100 mx-auto"
            style="padding-top: 56px; max-width: 680px"
            >

                <!-- ================= Stories ================= -->
                <?php require 'stories.php'; ?>

                <!-- ================= Create Post ================= -->
                <?php require 'createpost.php'; ?>
                
                <!-- ================= Create Room ================= -->
                <?php require 'createroom.php'; ?>
                
                <!-- posts -->
                <!-- p 1 -->
                <?php 
                    foreach ($belongsToUserPosts as  $value) {
                ?>

                <div class="bg-white p-2 rounded shadow mt-3">
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
                            <p class="m-0 fw-bold"><?php echo $thisUser['name']; ?></p>
                            <span class="text-muted fs-7"> 
                                <?php
                                    echo $value['created_at'];
                                    foreach ($postprivacyicon as $key => $privacyicon) {
                                        if ($value['postprivacy'] == $key) {
                                ?>
                                    <i style="font-size:1rem;font-weight:bolder" class="<?php echo $privacyicon;?> ml-3"></i>
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
                            justify-content-around
                            align-items-center
                            fs-7
                            "
                            href="editpost.php?id=<?php echo $value['postId'] ?>"
                        >
                            Edit Post</a
                        >
                        </li>
                        <li class="d-flex align-items-center">
                        <a
                            class="
                            dropdown-item
                            d-flex
                            justify-content-around
                            align-items-center
                            fs-7
                            "
                            href="#"
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
                        <?php echo $value['content']; ?>
                        </p>
                        <img
                        src="images/<?php echo $value['img']; ?>"
                        alt="post image"
                        class="img-fluid rounded"
                        />
                    </div>
                    <!-- likes & comments -->
                    <div class="post__comment mt-3 position-relative">
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
                                    data-bs-target="#collapsePost1"
                                    aria-expanded="false"
                                    aria-controls="collapsePost1"
                                >
                                    <p class="m-0">2 Comments</p>
                                </div>
                                </h2>
                                <hr class="my-2"/>
                                <!-- comment & like bar -->
                                <div class="d-flex justify-content-around">
                                <div
                                    class="
                                    dropdown-item
                                    rounded
                                    d-flex
                                    justify-content-center
                                    align-items-center
                                    pointer
                                    text-muted
                                    p-1
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
                                    p-1
                                    "
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapsePost1"
                                    aria-expanded="false"
                                    aria-controls="collapsePost1"
                                >
                                    <i class="fas fa-comment-alt me-3"></i>
                                    <p class="m-0">Comment</p>
                                </div>
                                </div>
                                <!-- comment expand -->
                                <div
                                id="collapsePost1"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                                >
                                <hr />
                                <div class="accordion-body">
                                    <!-- comment 1 -->
                                    <div class="d-flex align-items-center my-1">
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
                                    <div class="p-3 rounded comment__input w-100">
                                        <!-- comment menu of author -->
                                        <div class="d-flex justify-content-end">
                                        <!-- icon -->
                                        <i
                                            class="fas fa-ellipsis-h text-blue pointer"
                                            id="post1CommentMenuButton"
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
                                                justify-content-around
                                                align-items-center
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
                                                justify-content-around
                                                align-items-center
                                                fs-7
                                                "
                                                href="#"
                                            >
                                                Delete Comment</a
                                            >
                                            </li>
                                        </ul>
                                        </div>
                                        <p class="fw-bold m-0">John</p>
                                        <p class="m-0 fs-7 bg-gray p-2 rounded">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit.
                                        </p>
                                    </div>
                                    </div>
                                    <!-- comment 2 -->
                                    <div class="d-flex align-items-center my-1">
                                    <!-- avatar -->
                                    <img
                                        src="https://source.unsplash.com/random/2"
                                        alt="avatar"
                                        class="rounded-circle me-2"
                                        style="
                                        width: 38px;
                                        height: 38px;
                                        object-fit: cover;
                                        "
                                    />
                                    <!-- comment text -->
                                    <div class="p-3 rounded comment__input w-100">
                                        <p class="fw-bold m-0">Jerry</p>
                                        <p class="m-0 fs-7 bg-gray p-2 rounded">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit.
                                        </p>
                                    </div>
                                    </div>
                                    <!-- create comment -->
                                    <form class="d-flex my-1">
                                    <!-- avatar -->
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
                                    <input
                                        type="text"
                                        class="form-control border-0 rounded-pill bg-gray"
                                        placeholder="Write a comment"
                                    />
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
        <?php require 'rightsidebar.php'; ?>

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

<?php require 'base.php'; ?>
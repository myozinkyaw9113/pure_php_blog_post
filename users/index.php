<?php
    session_start();
    require '../config/config.php';

    if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    }

    # Select this user with SESSION['user_id']
    $pdo_this_user = $pdo->prepare("SELECT * FROM users WHERE id=".$_SESSION['user_id']); 
    $pdo_this_user->execute();
    $thisUser = $pdo_this_user->fetch(PDO::FETCH_ASSOC);

    # Select Posts for this user belongs to
    $pdo_posts = $pdo->prepare("SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id
    WHERE posts.user_id=".$_SESSION['user_id']." ORDER BY posts.id DESC"); 
    $pdo_posts->execute();
    $belongsToUserPosts = $pdo_posts->fetchAll();
    // if ($belongsToUserPosts) {
    //     return print("<pre>". print_r($belongsToUserPosts, true) . "</pre>");
    // } else {
    //     echo '<script>alert("No posts for logged in user")</script>';
    // }

    $content = $img = $needErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["content"]) || empty($_POST['img'])) {
            $needErr = "This post appears to be blank. Please write something or attach a link or photo to post.";
        } else {
            $content = test_input($_POST["content"]);
            $img = test_input($_POST["img"]);
            echo '<script>alert($content, $img)</script>';
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
/* ----------- Scroll Style ----------- */
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

</style>

<?php
    require 'top.php'; 
    require 'header.php';
    require 'aside.php';
?>

    <div class="sectionCenter">

        <?php 
            require 'story.php';
            require 'createPost.php';
        ?>

        <?php
            for ($i=0; $i < count($belongsToUserPosts); $i++) { 
        ?>
        <div class="mainPosts">
            <div class="title">
                <div class="profile">
                    <div class="globalRoundProfile" style="background-image: url(./img/2.jpg);">
                        <span></span>
                    </div>

                    <div class="name">
                        <a href="#"><?php echo $belongsToUserPosts[$i]['name']; ?></a>
                        <span>1h <i class="fas fa-globe-americas"></i></span>
                    </div>
                </div>
                <i class="fas fa-ellipsis-h"></i>
            </div>

            <div class="description">
                <?php echo $belongsToUserPosts[$i]['content']; ?>
            </div>

            <div class="post" style="background-image: url(./img/post-2.jpg);"></div>

            <div class="reaction">
                <div class="icons">
                    <div class="svg">
                        <img src="./svg/like.svg" alt="">
                    </div>
                    <div class="svg">
                        <img src="./svg/heart.svg" alt="">
                    </div>
                    <div class="svg">
                        <img src="./svg/care.svg" alt="">
                    </div>
                    <a href="#">32k</a>
                </div>
            </div>

            <div class="likeShare">
                <span>
                    <div class="svg">
                        <img src="./svg/like_light.svg" alt="">
                    </div>
                    <h3>Like</h3>
                </span>
                <span>
                    <div class="svg">
                        <img src="./svg/comment.svg" alt="">
                    </div>
                    <h3>Comment</h3>
                </span>
                <span>
                    <div class="svg">
                        <img src="./svg/share.svg" alt="">
                    </div>
                    <h3>Share</h3>
                </span>
            </div>
        </div>

        <?php
            }
        ?>

    </div>

    <div class="modal fade" id="photoVideoModel" tabindex="-1" aria-labelledby="photoVideoModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Create Post</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex gap-2 mb-3">
                        <div>
                            <img style="border-radius: 50%;width:50px;height:auto;" src="https://scontent-kut2-1.xx.fbcdn.net/v/t39.30808-6/279779554_1079523809575847_5263109778331876648_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=bawUCcFIVwYAX9KYmCY&tn=f5ax0JGFAsvgBKu6&_nc_ht=scontent-kut2-1.xx&oh=00_AT-m_9hhG9WO4gYKS4LJK8N7ufsMF20Hpzg2-wWdFMJHWQ&oe=62931F8F">
                        </div>
                        <div>
                            <h5 style="font-size: 1.1rem;" class="m-0 mb-1"><?php echo $thisUser['name']; ?></h5>
                            <p class="m-0 btn btn-sm btn-outline-secondary p-1"><i class='bx bx-globe'></i> Public</p>
                        </div>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <textarea class="createContentnodalClass w-100 p-1" name="content" rows="5" placeholder="What'is on your mind, <?php echo $thisUser['name'].'?'; ?>"></textarea>
                        <div class="ceateImageModalClass w-100 p-3 mb-3 d-flex justify-content-between">
                            <div>
                                <b>Add to your post</b>
                            </div>
                            <div>
                                <input type="file" name="img">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary w-100" value="Post">
                    </form>
                    
                    <?php 
                        if ($needErr) {
                    ?>
                        <div class="text-danger"><?php echo $needErr; ?></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<style>
.createContentnodalClass {
    border: none;
    outline: none;
    resize: none;
    font-size: 1.5rem;
}
.ceateImageModalClass {
    border-radius: 5px;
    border: 1px solid #000;
}
</style>

<?php require 'base.php'; ?>


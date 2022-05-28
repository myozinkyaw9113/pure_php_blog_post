<?php
    session_start();
    date_default_timezone_set("Asia/Rangoon");
    require '../config/database.php';
    $postprivacyconfig = require '../config/postprivacy.php';
    $postprivacyicon = require '../config/postprivacyicon.php';

    
    
    // echo $checkExitImg;
    // exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $checkExitImg = 'images/'. $oldPost[0]['img'];
        if (file_exists($checkExitImg)) {
            echo $checkExitImg;
            exit();
        } else {
            echo 'No photo';
            exit();
        }
    } else {
        $pdo_prepare = $pdo->prepare("SELECT * FROM posts WHERE postId=".$_GET['id']);
        $pdo_prepare->execute();
        $oldPost = $pdo_prepare->fetchAll();
    }
?>

<?php
    require 'top.php';
    require 'appbar.php';
?>

<style>
    .editpoststyle {
        border: 1px solid #ccc;
        border-radius: 10px;
        top: 6rem;
    }
</style>

<!-- ================= Main ================= -->
<div class="container-fluid d-flex justify-content-center position-absolute">

    <div class="row justify-content-evenly w-50 editpoststyle position-relative">
        <!-- head -->
        <div class="modal-header align-items-center">
                <h5
                class="text-dark text-center w-100 m-0"
                >
                Edit Post
                </h5>
                <a
                href="index.php"
                class="btn-close"
                ></a>
            </div>
            <!-- body -->
            <div class="modal-body">
                <div class="my-1 p-1">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    <?php 
                        foreach ($oldPost as $oldPostValue) {
                            # code...
                    ?>
                        <div class="d-flex flex-column">
                            <!-- name -->
                            <div class="d-flex align-items-center">
                            <div class="p-2">
                                <img
                                src="https://source.unsplash.com/collection/happy-people"
                                alt="from fb"
                                class="rounded-circle"
                                style="
                                    width: 38px;
                                    height: 38px;
                                    object-fit: cover;
                                "
                                />
                            </div>
                            <div>
                                <p class="m-0 fw-bold"><?php  ?></p>
                                <select
                                class="form-select border-0 bg-gray w-75 fs-7"
                                aria-label="Default select example"
                                name="postprivacy"
                                >
                                    <?php 
                                        foreach($postprivacyconfig as $key => $value) {
                                    ?>
                                        <option value="<?php echo $key ?>" <?php if($key == $oldPostValue['postprivacy']) { echo 'selected'; } ?>>
                                            <?php echo $value; ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                            <!-- text -->
                            <div>
                                <input type="hidden" name="id" value="<?php echo $oldPostValue['postId'] ?>">
                                <textarea
                                    name="content"
                                    cols="30"
                                    rows="5"
                                    class="form-control border-0"
                                    style="border:none;outline:none;resize:none;font-size: 1.3rem;"
                                    placeholder=""
                                ><?php echo $oldPostValue['content'] ?></textarea>

                                <!-- emoji  -->
                                <div
                                class="
                                    d-flex
                                    justify-content-between
                                    align-items-center
                                    mt-3
                                "
                                >
                                <img
                                    src="https://www.facebook.com/images/composer/SATP_Aa_square-2x.png"
                                    class="pointer"
                                    alt="fb text"
                                    style="
                                    width: 30px;
                                    height: 30px;
                                    object-fit: cover;
                                    "
                                />
                                <i
                                    class="far fa-laugh-wink fs-5 text-muted pointer"
                                ></i>
                                </div>
                            <!-- options -->
                                <div
                                class="
                                    d-flex
                                    justify-content-between
                                    border border-1 border-light
                                    rounded
                                    p-3
                                "
                                >
                                <p class="m-0">Add to your post</p>
                                    <div>
                                        <i
                                        class="
                                            fas
                                            fa-images
                                            fs-5
                                            text-success
                                            pointer
                                            mx-1
                                        "
                                        ></i>
                                        <i
                                        class="
                                            fas
                                            fa-user-check
                                            fs-5
                                            text-primary
                                            pointer
                                            mx-1
                                        "
                                        ></i>
                                        <i
                                        class="
                                            far
                                            fa-smile
                                            fs-5
                                            text-warning
                                            pointer
                                            mx-1
                                        "
                                        ></i>
                                        <i
                                        class="
                                            fas
                                            fa-map-marker-alt
                                            fs-5
                                            text-info
                                            pointer
                                            mx-1
                                        "
                                        ></i>
                                        <i
                                        class="
                                            fas
                                            fa-microphone
                                            fs-5
                                            text-danger
                                            pointer
                                            mx-1
                                        "
                                        ></i>
                                        <i
                                        class="
                                            fas
                                            fa-ellipsis-h
                                            fs-5
                                            text-muted
                                            pointer
                                            mx-1
                                        "
                                        ></i>
                                    </div>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <input type="file" name="createImg" />
                                    <img src="images/<?php echo $oldPostValue['img'] ?>" style="width:auto;height:100px;" alt="">
                                </div>
                                <input type="submit" name="submit" value="Save" class="btn btn-primary w-100">
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </form>
                </div>

                <!-- end -->
            </div>
    </div>

</div>

    <!-- create modal 918119602 7222 -->

<?php require 'base.php'; ?>
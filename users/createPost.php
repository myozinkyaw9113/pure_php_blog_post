<?php    
    
?>
    <!-- create post -->
    <div class="bg-white p-3 mt-3 rounded border shadow">
        <!-- avatar -->
        <div class="d-flex" type="button">
        <div class="p-1">
            <img
            src="https://source.unsplash.com/collection/happy-people"
            alt="avatar"
            class="rounded-circle me-2"
            style="width: 38px; height: 38px; object-fit: cover"
            />
        </div>
        <input
            type="text"
            class="form-control rounded-pill border-0 bg-gray pointer"
            disabled
            placeholder="What's on your mind, <?php echo $thisUser['name']; ?>?"
            data-bs-toggle="modal"
            data-bs-target="#createModal"
        />
        </div>
        <!-- create modal -->
        <div
        class="modal fade"
        id="createModal"
        tabindex="-1"
        aria-labelledby="createModalLabel"
        aria-hidden="true"
        data-bs-backdrop="false"
        >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <!-- head -->
            <div class="modal-header align-items-center">
                <h5
                class="text-dark text-center w-100 m-0"
                id="exampleModalLabel"
                >
                Create Post
                </h5>
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <!-- body -->
            <div class="modal-body">
                <div class="my-1 p-1">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="postForm" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- csrf_token --> 
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
                                <p class="m-0 fw-bold"><?php echo $thisUser['name'] ?></p>
                                <select
                                class="form-select border-0 bg-gray w-75 fs-7"
                                aria-label="Default select example"
                                name="postprivacy"
                                >
                                    <?php 
                                        foreach($postprivacyconfig as $key => $value) {
                                    ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                            <!-- text -->
                            <div>
                                <textarea
                                    name="content"
                                    cols="30"
                                    rows="5"
                                    class="form-control border-0"
                                    style="border:none;outline:none;resize:none;font-size: 1.3rem;"
                                ></textarea>
                                <!-- emoji  -->
                                <div
                                class="
                                    d-flex
                                    justify-content-between
                                    align-items-center
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
                                    mt-3
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
                                <input type="file" name="createImg" />
                                <input type="submit" name="postSubmit" value="Post" class="btn btn-primary w-100">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- end -->
            </div>
            </div>
        </div>
        </div>
        <hr />
        <!-- actions -->
        <div class="d-flex flex-column flex-lg-row mt-3">
        <!-- a 1 -->
        <div
            class="
            dropdown-item
            rounded
            d-flex
            align-items-center
            justify-content-center
            "
            type="button"
        >
            <i class="fas fa-video me-2 text-danger"></i>
            <p class="m-0 text-muted">Live Video</p>
        </div>
        <!-- a 2 -->
        <div
            class="
            dropdown-item
            rounded
            d-flex
            align-items-center
            justify-content-center
            "
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#createModal"
        >
            <i class="fas fa-photo-video me-2 text-success"></i>
            <p class="m-0 text-muted">Photo/Video</p>
        </div>
        <!-- a 3 -->
        <div
            class="
            dropdown-item
            rounded
            d-flex
            align-items-center
            justify-content-center
            "
            type="button"
        >
            <i class="fas fa-smile me-2 text-warning"></i>
            <p class="m-0 text-muted">Feeling/Activity</p>
        </div>
        </div>
    </div>
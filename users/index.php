<?php
    session_start();
    require '../config/config.php';

    if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php require 'top.php'; ?>
</head>
<body class="bg-dark">

  <div class="container-fluid">

    <div class="d-flex justify-content-between p-1 bg-navy">

      <div>
        <a href="#" class="h1"><b style="color:#3F65B0;">TINY</b>media</a>
      </div>
      <div>
        <a href="../logout/logout.php" class="btn bnt-sm btn-info text-white">Logout</a>
      </div>

    </div>

    <div class="container p-3">

      <div class="row">

        <!-- One Post -->
        <div class="col-md-7 mx-auto">

          <div class="card card-widget">

            <div class="card-header p-2">

              <div class="user-block">

                <img class="img-circle" src="../dist/img/user2-160x160.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>

              </div>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                  <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>

            </div>

            <div class="card-body p-0 mb-2">
              <p class="p-2 mb-0">I took this photo this morning. What do you guys think?</p>
              <img class="img-fluid pad mb-2" src="https://adminlte.io/themes/v3/dist/img/photo2.png" alt="Photo">
              <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
              <span class="float-right text-muted px-3">127 likes - 3 comments</span>
            </div>

            <div class="card-footer card-comments">

              <div class="card-comment">
                <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                  Maria Gonzales
                  <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>

              <div class="card-comment">

                <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                  <div class="comment-text">
                  <span class="username">
                  Luna Stark
                  <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>

              </div>

            </div>

            <div class="card-footer">
              <form action="#" method="post">
              <img class="img-fluid img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="Alt Text">

              <div class="img-push">
                <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
              </div>
              </form>
            </div>

          </div>

        </div><!-- End Post -->

        <!-- One Post -->
        <div class="col-md-7 mx-auto">

          <div class="card card-widget">

            <div class="card-header p-2">

              <div class="user-block">

                <img class="img-circle" src="../dist/img/user2-160x160.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>

              </div>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                  <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>

            </div>

            <div class="card-body p-0 mb-2">
              <p class="p-2 mb-0">I took this photo this morning. What do you guys think?</p>
              <img class="img-fluid pad mb-2" src="https://adminlte.io/themes/v3/dist/img/photo2.png" alt="Photo">
              <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
              <span class="float-right text-muted px-3">127 likes - 3 comments</span>
            </div>

            <div class="card-footer card-comments">

              <div class="card-comment">
                <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                  Maria Gonzales
                  <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>

              <div class="card-comment">

                <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                  <div class="comment-text">
                  <span class="username">
                  Luna Stark
                  <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>

              </div>

            </div>

            <div class="card-footer">
              <form action="#" method="post">
              <img class="img-fluid img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="Alt Text">

              <div class="img-push">
                <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
              </div>
              </form>
            </div>

          </div>

        </div><!-- End Post -->

        <!-- One Post -->
        <div class="col-md-7 mx-auto">

          <div class="card card-widget">

            <div class="card-header p-2">

              <div class="user-block">

                <img class="img-circle" src="../dist/img/user2-160x160.jpg" alt="User Image">
                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                <span class="description">Shared publicly - 7:30 PM Today</span>

              </div>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Mark as read">
                  <i class="far fa-circle"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>

            </div>

            <div class="card-body p-0 mb-2">
              <p class="p-2 mb-0">I took this photo this morning. What do you guys think?</p>
              <img class="img-fluid pad mb-2" src="https://adminlte.io/themes/v3/dist/img/photo2.png" alt="Photo">
              <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
              <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
              <span class="float-right text-muted px-3">127 likes - 3 comments</span>
            </div>

            <div class="card-footer card-comments">

              <div class="card-comment">
                <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                  Maria Gonzales
                  <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>

              <div class="card-comment">

                <img class="img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="User Image">
                  <div class="comment-text">
                  <span class="username">
                  Luna Stark
                  <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>

              </div>

            </div>

            <div class="card-footer">
              <form action="#" method="post">
              <img class="img-fluid img-circle img-sm" src="../dist/img/user2-160x160.jpg" alt="Alt Text">

              <div class="img-push">
                <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
              </div>
              </form>
            </div>

          </div>

        </div><!-- End Post -->

      </div>

    </div>

  </div>

<?php require 'base.php'; ?>
</body>
</html>
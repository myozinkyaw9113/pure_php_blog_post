<?php
  session_start();
  require '../config/database.php';
  require 'top.php';

  if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('Location: ../login.php');
  }

  if ($_SESSION) {
    if ($_SESSION['user_id'] != 1) {
      header('Location: ../users/index.php');
    }
  }

  $pdo_prepare = $pdo->prepare("SELECT * FROM posts ORDER BY postId DESC");
  $pdo_prepare->execute();
  $result = $pdo_prepare->fetchAll();

?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bordered Table</h3>
            </div>
            
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Content</th>
                    <th>CreatedBy</th>
                    <th style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  if ($result) {
                    $num = 1;
                    for ($i=0; $i < count($result); $i++) { 
                  ?>
                  <tr>
                    <td><?php echo $num++; ?></td>
                    <td><?php echo substr($result[$i]['content'], 0, 70). '...'; ?></td>
                    <td><?php echo $result[$i]['author_id'] ;?></td>
                    <td>
                      <div class="d-flex gap-1">
                        <a href="#" class="btn-sm btn-warning"><i class='bx bx-message-alt-detail'></i></a>
                        <a href="#" class="btn-sm btn-danger"><i class='bx bx-block'></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>

                  <?php
                  } else {
                  ?>
                    <tr>No record yet!</tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
  <!-- /.content -->

<?php require 'base.php'; ?>
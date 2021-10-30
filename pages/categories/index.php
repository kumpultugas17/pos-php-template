    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?= isset($pesan) ? $pesan : ''; ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="category">Name</label>
                      <input type="text" name="category" class="form-control" id="category" placeholder="Category">
                    </div>
                    <button type="submit" name="btn_category" class="btn btn-primary btn-sm">Save</button>
                  </form>
                </div>
              </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Category Name</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $categories = query("SELECT * FROM categories ORDER BY created_at DESC");
                            $no = 1;
                            foreach ($categories as $category) :
                            ?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $category['name']; ?></td>
                                <td>
                                  <a href="#" type="button" data-toggle="modal" data-target="#modal-edit<?= $category['id']; ?>">
                                    <i class="fas fa-edit text-warning text-center"></i>
                                  </a>
                                  <a href="" class=""><i class="fas fa-trash text-danger"></i></a>
                                </td>
                              </tr>
                              <!-- modal dialog edit-->
                              <div class="modal fade" id="modal-edit<?= $category['id']; ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit Category</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post">
                                      <?php
                                      $id = $category['id'];
                                      $edit_category = $conn->query("SELECT * FROM categories WHERE id='$id'");
                                      while ($row = mysqli_fetch_array($edit_category)) :
                                      ?>
                                        <input type="hidden" name="id_category" value="<?= $id; ?>">
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <label for="update_category">Name</label>
                                            <input type="text" name="update_category" class="form-control" id="update_category" value="<?= $row['name']; ?>">
                                          </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                        </div>
                                      <?php endwhile ?>
                                    </form>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
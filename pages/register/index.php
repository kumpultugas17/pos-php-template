    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Register</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Register</li>
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
            <div class="col-lg-4">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter E-Mail">
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name User">
                    </div>
                    <div class="form-group">
                      <label for="role">Role</label>
                      <select name="role" class="form-control" id="role">
                        <option selected disabled>Select Role</option>
                        <option value="0">Super Admin</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control <?php echo isset($_GET['confirm']) ? 'is-invalid' : '' ?>" id="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <label for="confirm">Confirm Password</label>
                      <input type="password" name="confirm" class="form-control <?= isset($_GET['confirm']) ? 'is-invalid' : '' ?>" id="confirm" placeholder="Enter Confirm Password">
                    </div>
                    <div class="form-group">
                      <label for="avatar">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="avatar" id="avatar">
                          <label class="custom-file-label" for="avatar">Choose File</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="btn_register" class="btn btn-primary btn-sm">Save</button>
                  </form>
                </div>
              </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-8">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div id="register_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="table_register" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="register_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="register" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No</th>
                              <th class="sorting" tabindex="0" aria-controls="register" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">E-Mail</th>
                              <th class="sorting" tabindex="0" aria-controls="register" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>
                              <th class="sorting" tabindex="0" aria-controls="register" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Role</th>
                              <th class="sorting" tabindex="0" aria-controls="register" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $users = query("SELECT * FROM users ORDER BY created_at DESC");
                            $no = 1;
                            foreach ($users as $user) :
                            ?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td>
                                  <?php
                                  if ($user['role_code'] == 0) {
                                    echo "Super Admin";
                                  } elseif ($user['role_code'] == 1) {
                                    echo "Admin";
                                  } else {
                                    echo "User";
                                  };
                                  ?>
                                </td>
                                <td>
                                  <a href="#" type="button" data-toggle="modal" data-target="#modal-edit<?= $user['id']; ?>">
                                    <i class="fas fa-edit text-warning text-center"></i>
                                  </a>
                                  <a href="index.php?page=register&id=<?= $user['id']; ?>" onclick="return confirm('Data ini akan dihapus?')"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                              </tr>
                              <!-- modal dialog edit-->
                              <div class="modal fade" id="modal-edit<?= $user['id']; ?>">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Edit User</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                      <?php
                                      $id = $user['id'];
                                      $edit_user = $conn->query("SELECT * FROM users WHERE id='$id'");
                                      while ($row = mysqli_fetch_array($edit_user)) :
                                      ?>
                                        <div class="modal-body">
                                          <input type="hidden" name="id" value="$id">
                                          <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="<?= $row['email'] ?>">
                                          </div>
                                          <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="<?= $row['name'] ?>">
                                          </div>
                                          <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role" class="form-control" id="role">
                                              <option value="0" <?= $row['role_code'] == 0 ? 'selected' : '' ?>>Super Admin</option>
                                              <option value="1" <?= $row['role_code'] == 1 ? 'selected' : '' ?>>Admin</option>
                                              <option value="2" <?= $row['role_code'] == 2 ? 'selected' : '' ?>>User</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <Label>Avatar Old</Label>
                                            <div class="text-left">
                                              <input type="hidden" name="avatar_old" value="<?= $row['avatar'] ?>">
                                              <img class="profile-user-img img-fluid " src="assets/avatar/<?= $row['avatar'] != '' ? $row['avatar'] : 'default.png' ?>" alt="User profile picture">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="avatar">File input</label>
                                            <div class="input-group">
                                              <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                                <label class="custom-file-label" for="avatar">Choose File</label>
                                              </div>
                                              <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                          <button type="submit" name="btn_update_user" class="btn btn-warning btn-sm">Update</button>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
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
            <!-- <div class="col-lg-6">
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
            <!-- </div> -->
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <button class="btn btn-sm btn-primary card-tools" style="margin-right: 1.5px;" data-toggle="modal" data-target="#modal-add-product">Add New Products</button>
                </div>
                <div class="card-body">
                  <div id="products_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="table_products" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No</th>
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Product Name</th>
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Category</th>
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Merk</th>
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Price</th>
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Stock</th>
                              <th class="sorting" tabindex="0" aria-controls="table_products" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $products = query("SELECT * FROM products INNER JOIN categories ON products.id_category = categories.id");
                            $no = 1;
                            foreach ($products as $product) :
                            ?>
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $product['product_name']; ?></td>
                                <td><?= $product['name']; ?></td>
                                <td><?= $product['merk']; ?></td>
                                <td><?= $product['price']; ?></td>
                                <td><?= $product['stock']; ?></td>
                                <td>
                                  <a href="#" type="button" data-toggle="modal" data-target="#modal-edit<?= $category['id']; ?>">
                                    <i class="fas fa-edit text-warning text-center"></i>
                                  </a>
                                  <a href="index.php?page=category&id=<?= $category['id']; ?>" onclick="return confirm('Data ini akan dihapus?')"><i class="fas fa-trash text-danger"></i></a>
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
                                          <button type="submit" name="btn_update_category" class="btn btn-warning btn-sm">Update</button>
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

    <div class="modal fade" id="modal-add-product">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Product</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter Product Name">
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                  <option selected disabled>Select Category</option>
                  <?php $categories = query("SELECT * FROM categories"); ?>
                  <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>">
                      <?= $category['name'] ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label for="merk">Merk</label>
                <input type="text" name="merk" class="form-control" id="merk" placeholder="Enter Merk">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price">
              </div>
              <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Enter Stock">
              </div>
              <!-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" name="btn_product" class="btn btn-primary btn-sm">Save</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
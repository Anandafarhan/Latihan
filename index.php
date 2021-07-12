<?php
include('./model/connect.php');
include('./model/Product.php');
$product = new Product();
include('template-Header.php');
?>

<div class="container mt-5">
  <table id="dataTable" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">SKU</th>
        <th scope="col">Stock Count</th>
        <th scope="col">Category</th>
        <th scope="col">Supplier</th>
        <th scope="col">Cost Price</th>
        <th scope="col">Sale Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $x = 0;
      if ($product->getAllProduct()->num_rows > 0) {
        foreach ($product->getAllProduct() as $row) {
      ?>
          <tr>
            <th><?php echo $x += 1 ?></th>
            <td><?php echo $row['ProductName']; ?></td>
            <td><?php echo $row['SKU']; ?></td>
            <td><?php echo $row['Stock']; ?></td>
            <td><?php echo $row['CategoryName']; ?></td>
            <td><?php echo $row['CompanyName']; ?></td>
            <td><?php echo $row['CostPrice']; ?></td>
            <td><?php echo $row['SalePrice']; ?></td>
            <td>
              <div class="btn-group me-2 d-flex justify-content-center" role="group">
                <button type="button" class="btn btn-sm btn-primary"><i class="bi-eye-fill"></i></button>
                <button type="button" class="btn btn-sm btn-warning edit" data-id="<?= $row['SKU']; ?>" data-product="<?= $row['ProductName']; ?>" data-cost="<?= $row['CostPrice']; ?>" data-sale="<?= $row['SalePrice']; ?>"><i class="bi-pencil-square"></i></button>
                <button type="button" class="btn btn-sm btn-danger del" data-id="<?= $row['SKU']; ?>" data-product="<?= $row['ProductName']; ?>"><i class="bi-trash-fill"></i></button>
              </div>
            </td>
          </tr>
      <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Edit Product Modal Start -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="./model/Product.php?func=editproduct">
        <div class="modal-body">
          <div class="mb-3">
            <label for="cost" class="form-label">Cost Price</label>
            <input type="number" step="50000" class="form-control" id="cost" name="cost" required>
          </div>
          <div class="mb-3">
            <label for="sale" class="form-label">Sale Price</label>
            <input type="number" step="50000" class="form-control" id="sale" name="sale" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="edid" name="editproduct">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Product Modal End -->

<!-- Delete Product Modal Start -->
<div class="modal fade" id="modalDelete" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="./model/Product.php?func=destroyproduct">
        <div class="modal-body">
          <p>Are you sure want to delete <strong id="product"></strong> ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger" id="delid" name="deleteproduct">Delete!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Product Modal End -->

<?php include('template-Footer.php'); ?>
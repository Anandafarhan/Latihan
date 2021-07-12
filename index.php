<?php
include('./model/Product.php');
include('./model/Category.php');
include('./model/Supplier.php');
$product = new Product();
$category = new Category();
$supplier = new Supplier();
include('template-Header.php');
?>

<div class="container mt-4">
  <div class="mb-2">
    <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate"><i class="bi-plus"></i> Add Product</button>
  </div>
  <table id="dataTable" class="table table-bordered table-hover">
    <thead class="bg-light">
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
                <button type="button" class="btn btn-sm btn-light"><i class="bi-eye-fill"></i></button>
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

<!-- Create Product Modal Start -->
<div class="modal fade" id="modalCreate" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="./model/Product.php?func=createproduct">
        <div class="modal-body">
          <div class="mb-3">
            <label for="ProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="productname" required>
          </div>
          <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" class="form-control" name="sku" required>
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" required>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Category" name="category">
              <?php
              if ($category->getAllCategory()->num_rows > 0) {
                foreach ($category->getAllCategory() as $row) {
              ?>
                  <option value="<?= $row['CategoryId']; ?>"><?= $row['CategoryName']; ?></option>
              <?php
                }
              }
              ?>
            </select>
            <div id="emailHelp" class="form-text">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#categoryModal" data-bs-dismiss="modal">
                Add Category
              </button>
            </div>
          </div>
          <div class="mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <select class="form-select" aria-label="Supplier" name="supplier">
              <?php
              if ($supplier->getAllSupplier()->num_rows > 0) {
                foreach ($supplier->getAllSupplier() as $row) {
              ?>
                  <option value="<?= $row['SupplierId']; ?>"><?= $row['CompanyName']; ?></option>
              <?php
                }
              }
              ?>
            </select>
            <div id="emailHelp" class="form-text">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#supplierModal" data-bs-dismiss="modal">
                Add Supplier
              </button>
            </div>
          </div>
          <div class="mb-3">
            <label for="cost" class="form-label">Cost Price</label>
            <input type="number" class="form-control" name="cost" required>
          </div>
          <div class="mb-3">
            <label for="sale" class="form-label">Sale Price</label>
            <input type="number" class="form-control" name="sale" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" name="addproduct">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Create Product Modal End -->

<!-- Edit Product Modal Start -->
<div class="modal fade" id="modalEdit" data-bs-backdrop="static" tabindex="-1">
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

<!-- Destroy Product Modal Start -->
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
<!-- Destroy Product Modal End -->

<!-- Category Modal Start -->
<div class="modal fade" id="categoryModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="./model/Category.php?func=createcategory">
        <div class="modal-body">
          <div class="mb-3">
            <label for="addCategory" class="col-form-label">Category:</label>
            <input type="text" class="form-control" id="addCategory" name="newcat" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addcategory">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Category Modal End -->

<!-- Supplier Modal Start -->
<div class="modal fade" id="supplierModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Supplier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="./model/Supplier.php?func=createsupplier">
        <div class="modal-body">
          <div class="mb-3">
            <label for="compName" class="col-form-label">Company Name:</label>
            <input type="text" class="form-control" id="compName" name="newcomp" required>
          </div>
          <div class="mb-3">
            <label for="conName" class="col-form-label">Contact Name:</label>
            <input type="text" class="form-control" id="contName" name="newcont" required>
          </div>
          <div class="mb-3">
            <label for="Addr" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="Addr" name="newaddr" required>
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="newmail" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="col-form-label">Phone:</label>
            <input type="number" class="form-control" maxlength="14" id="phone" name="newphone" required>
          </div>
          <div class="mb-3">
            <label for="webs" class="col-form-label">Website:</label>
            <input type="text" class="form-control" id="webs" name="newsite" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addsupplier">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Supplier Modal End -->

<?php include('template-Footer.php'); ?>
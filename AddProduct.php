<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "latihandb";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
include('database.php');
$db = new database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <title>Do do do</title>
</head>

<body>
  <!-- Nav Start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Daftar Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/AddProduct.php">Tambah Produk</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li>
            <form class="d-flex">
              <button class="btn btn-outline-success btn-sm" type="button">Login</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav End -->
  <div class="container mt-3">
    <h2>Tambah Produk</h2>
    <div class="container mt-4 px-5">
      <form method="post" action="function.php?func=addproduct">
        <div class="mb-3">
          <label for="ProductName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="ProductName" name="productname" required>
        </div>
        <div class="mb-3">
          <label for="sku" class="form-label">SKU</label>
          <input type="text" class="form-control" id="sku" name="sku" required>
        </div>
        <div class="mb-3">
          <label for="stock" class="form-label">Stock</label>
          <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" id="category" aria-label="Category" name="category">
            <?php
            if ($db->getAllCategory()->num_rows > 0) {
              foreach ($db->getAllCategory() as $row) {
            ?>
                <option value="<?= $row['CategoryId']; ?>"><?= $row['CategoryName']; ?></option>
            <?php
              }
            }
            ?>
          </select>
          <div id="emailHelp" class="form-text">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#categoryModal">
              Add Category
            </button>
          </div>
        </div>
        <div class="mb-3">
          <label for="supplier" class="form-label">Supplier</label>
          <select class="form-select" id="supplier" aria-label="Supplier" name="supplier">
            <?php
            if ($db->getAllSupplier()->num_rows > 0) {
              foreach ($db->getAllSupplier() as $row) {
            ?>
                <option value="<?= $row['SupplierId']; ?>"><?= $row['CompanyName']; ?></option>
            <?php
              }
            }
            ?>
          </select>
          <div id="emailHelp" class="form-text">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#supplierModal">
              Add Supplier
            </button>
          </div>
        </div>
        <div class="mb-3">
          <label for="cost" class="form-label">Cost Price</label>
          <input type="number" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="mb-3">
          <label for="sale" class="form-label">Sale Price</label>
          <input type="number" class="form-control" id="sale" name="sale" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addproduct">Submit</button>
      </form>
    </div>
  </div>

  <!-- Category Modal Start -->
  <div class="modal fade" id="categoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="function.php?func=addcategory">
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
        <form method="post" action="function.php?func=addsupplier">
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
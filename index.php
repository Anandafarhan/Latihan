<?php
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" >
  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <title>Do do do</title>
</head>

<body>
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
        if ($db->getallproduct()->num_rows > 0) {
          foreach($db->getallproduct() as $row){
            ?>
      <tr>
        <th><?php echo $x+=1 ?></th>
        <td><?php echo $row['ProductName']; ?></td>
        <td><?php echo $row['SKU']; ?></td>
        <td><?php echo $row['Stock']; ?></td>
        <td><?php echo $row['CategoryName']; ?></td>
        <td><?php echo $row['CompanyName']; ?></td>
        <td><?php echo $row['CostPrice']; ?></td>
        <td><?php echo $row['SalePrice']; ?></td>
        <td><div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic mixed styles example">
              <button type="button" class="btn btn-primary"><i class="bi-eye-fill"></i></button>
              <button type="button" class="btn btn-warning"><i class="bi-pencil-square"></i></button>
              <button type="button" class="btn btn-danger" id="delete-btn" onclick="modal()"><i class="bi-trash-fill"></i></button>
            </div></td>
          </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Delete Modal Start -->
  <div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="AddData.php">
          <div class="modal-body">
            <div class="mb-3">
              <p>Are you sure want to delete <?='<script>document.write(data_id);</script>'?> ?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger" name="deleteproduct">Delete!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Delete Modal End -->

  <script>
    function modal(){
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
      });
      myModal.show();
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
</body>

</html>
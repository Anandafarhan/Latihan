<?php
include('database.php');
$conn = new database();
$hasil = $conn->getdata();
var_dump($hasil);
die;
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
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
          <th scope="col">Nama Produk</th>
          <th scope="col">SKU</th>
          <th scope="col">Jumlah Stock</th>
          <th scope="col">Kategori</th>
          <th scope="col">Supplier</th>
          <th scope="col">Harga Modal</th>
          <th scope="col">Harga Jual</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->getdata();
        $x = 0;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            [
              'ProductName' => $productname,
              'SKU' => $sku,
              'Stock' => $stock,
              'CategoryName' => $categoryname,
              'CompanyName' => $companyname,
              'CostPrice' => $cost,
              'SalePrice' => $sale
            ] = $row;

            $x += 1;
            echo '
      <tr>
        <th>' . $x . '</th>
        <td>' . $productname . '</td>
        <td>' . $sku . '</td>
        <td>' . $stock . '</td>
        <td>' . $categoryname . '</td>
        <td>' . $companyname . '</td>
        <td>' . $cost . '</td>
        <td>' . $sale . '</td>
      </tr>
      ';
          }
        } else {
          echo '';
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
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
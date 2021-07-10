<?php
include('database.php');
$db = new database();

  if (isset($_POST['addcategory'])) 
  {
    $newcat = $_POST['newcat'];

    $db->addCategory($newcat);

  } elseif (isset($_POST['addsupplier'])) 
  {
    $newcomp = $_POST['newcomp'];
    $newcont = $_POST['newcont'];
    $newaddr = $_POST['newaddr'];
    $newmail = $_POST['newmail'];
    $newphone = $_POST['newphone'];
    $newsite = $_POST['newsite'];
    
    $db->addSupplier($newcomp, $newcont, $newaddr, $newmail, $newphone, $newsite);

  } elseif (isset($_POST['addproduct']))
  {
     $productname = $_POST['productname'];
     $sku = $_POST['sku'];
     $stock = $_POST['stock'];
     $category = $_POST['category'];
     $supplier = $_POST['supplier'];
     $cost = $_POST['cost'];
     $sale = $_POST['sale'];

     $db->addProduct($productname, $sku, $stock, $category, $supplier, $cost, $sale);
  }
  ?>
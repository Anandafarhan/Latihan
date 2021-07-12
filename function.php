<?php
include('database.php');
$db = new database();

switch (htmlspecialchars($_GET['func'])) {

  case 'addcategory':
    if (isset($_POST['addcategory'])) {
      $newcat = $_POST['newcat'];

      $db->addCategory($newcat);
    }
    break;

  case 'addsupplier':

    if (isset($_POST['addsupplier'])) {
      $newcomp = $_POST['newcomp'];
      $newcont = $_POST['newcont'];
      $newaddr = $_POST['newaddr'];
      $newmail = $_POST['newmail'];
      $newphone = $_POST['newphone'];
      $newsite = $_POST['newsite'];

      $db->addSupplier($newcomp, $newcont, $newaddr, $newmail, $newphone, $newsite);
    }
    break;

  case 'addproduct':

    if (isset($_POST['addproduct'])) {
      $productname = $_POST['productname'];
      $sku = $_POST['sku'];
      $stock = $_POST['stock'];
      $category = $_POST['category'];
      $supplier = $_POST['supplier'];
      $cost = $_POST['cost'];
      $sale = $_POST['sale'];

      $db->addProduct($productname, $sku, $stock, $category, $supplier, $cost, $sale);
    }
    break;

  case 'deleteproduct':

    if (isset($_POST['deleteproduct'])) {
      $id = $_POST['deleteproduct'];

      $db->deleteProduct($id);
    }
    break;

  case 'editproduct':

    if (isset($_POST['editproduct'])) {
      $id = $_POST['editproduct'];
      $cost = $_POST['cost'];
      $sale = $_POST['sale'];

      $db->editProduct($id, $cost, $sale);
    }
}

<?php
if (!class_exists('Database')) {
    include('connect.php');
}

class Product extends Database
{
    function getAllProduct()
    {
        $sql = "SELECT productlist.*, productcategory.CategoryName, supplierlist.CompanyName 
        FROM productlist 
        INNER JOIN productcategory ON productlist.CategoryId = productcategory.CategoryId 
        INNER JOIN supplierlist ON productlist.SupplierId = supplierlist.SupplierId;";

        return $this->con->query($sql);
    }

    function getProductById($id)
    {
        $sql = "SELECT * FROM productlist WHERE SKU = $id;";

        return $this->con->query($sql);
    }
    function storeProduct($productname, $sku, $stock, $category, $supplier, $cost, $sale)
    {
        $sql = "INSERT INTO productlist (ProductName, SKU, Stock, CategoryId, SupplierId, CostPrice, SalePrice) 
        VALUE ('$productname', '$sku', '$stock', '$category', '$supplier', '$cost', '$sale');";

        $this->con->query($sql);
        header('Location: /');
    }
    function editProduct($id, $cost, $sale)
    {
        $sql = "UPDATE productlist SET CostPrice = '$cost', SalePrice = '$sale' WHERE SKU = '$id'";

        $this->con->query($sql);
        header('Location: /');
    }
    function destroyProduct($id)
    {
        $sql = "DELETE FROM productlist WHERE SKU = '$id'";

        $this->con->query($sql);
        header('Location: /');
    }
}

$Product = new Product();

if (isset($_GET['func'])) {
    switch (htmlspecialchars($_GET['func'])) {
        case 'createproduct':
            if (isset($_POST['addproduct'])) {
                $productname = $_POST['productname'];
                $sku = $_POST['sku'];
                $stock = $_POST['stock'];
                $category = $_POST['category'];
                $supplier = $_POST['supplier'];
                $cost = $_POST['cost'];
                $sale = $_POST['sale'];

                $Product->storeProduct($productname, $sku, $stock, $category, $supplier, $cost, $sale);
            }
            break;
        case 'editproduct':

            if (isset($_POST['editproduct'])) {
                $id = $_POST['editproduct'];
                $cost = $_POST['cost'];
                $sale = $_POST['sale'];

                $Product->editProduct($id, $cost, $sale);
            }
            break;
        case 'destroyproduct':

            if (isset($_POST['deleteproduct'])) {
                $id = $_POST['deleteproduct'];

                $Product->destroyProduct($id);
            }
            break;
    }
}

<?php

class database
{

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = 'root';
    protected $dbnm = 'latihandb';

    public $con;

    function __construct()
    {
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->dbnm);
    }
    //##################################### GET FUNCTION #####################################//
    function getallproduct()
    {
        $sql = "SELECT productlist.*, productcategory.CategoryName, supplierlist.CompanyName 
        FROM productlist 
        INNER JOIN productcategory ON productlist.CategoryId = productcategory.CategoryId 
        INNER JOIN supplierlist ON productlist.SupplierId = supplierlist.SupplierId;";

        return $this->con->query($sql);
    }

    function getproduct($id)
    {
        $sql = "SELECT * FROM productlist WHERE SKU = $id;";

        return $this->con->query($sql);
    }

    function getAllCategory()
    {
        $sql = "SELECT * FROM productcategory;";

        return $this->con->query($sql);
    }

    function getAllSupplier()
    {
        $sql = "SELECT * FROM supplierlist;";

        return $this->con->query($sql);
        header('Location: AddProduct.php');
    }
    //##################################### ADD FUNCTION #####################################//
    function addCategory($newCat)
    {
        $sql = "INSERT INTO productcategory (CategoryName) VALUE ('$newCat');";

        $this->con->query($sql);
        header('Location: AddProduct.php');
    }

    function addSupplier($newcomp, $newcont, $newaddr, $newmail, $newphone, $newsite)
    {
        $sql = "INSERT INTO supplierlist (CompanyName, ContactName, Address, Email, Phone, Website) 
        VALUE ('$newcomp', '$newcont', '$newaddr', '$newmail', '$newphone', '$newsite');";

        $this->con->query($sql);
        header('Location: AddProduct.php');
    }

    function addProduct($productname, $sku, $stock, $category, $supplier, $cost, $sale)
    {
        $sql = "INSERT INTO productlist (ProductName, SKU, Stock, CategoryId, SupplierId, CostPrice, SalePrice) 
        VALUE ('$productname', '$sku', '$stock', '$category', '$supplier', '$cost', '$sale');";

        $this->con->query($sql);
        header('Location: /');
    }
    //##################################### EDIT FUNCTION #####################################//
    function editProduct($id, $cost, $sale)
    {
        $sql = "UPDATE productlist SET CostPrice = '$cost', SalePrice = '$sale' WHERE SKU = '$id'";

        $this->con->query($sql);
        header('Location: /');
    }
    //##################################### DELETE FUNCTION #####################################//
    function deleteProduct($id)
    {
        $sql = "DELETE FROM productlist WHERE SKU = '$id'";

        $this->con->query($sql);
        header('Location: /');
    }
}

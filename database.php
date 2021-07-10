<?php

class database{

    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = 'root';
    protected $dbnm = 'latihandb';

    public $con;

    function __construct(){
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->dbnm);
    }

    function getdata(){
        $sql = "SELECT productlist.*, productcategory.CategoryName, supplierlist.CompanyName 
        FROM productlist 
        INNER JOIN productcategory ON productlist.CategoryId = productcategory.CategoryId 
        INNER JOIN supplierlist ON productlist.SupplierId = supplierlist.SupplierId;";
        $data = $this->con->query($sql);

        return $data;
    }
}
?>